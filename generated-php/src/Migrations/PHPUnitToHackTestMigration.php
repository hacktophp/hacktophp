<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST;
use HH\Lib\{C, Dict, Str, Vec};
final class PHPUnitToHackTestMigration extends StepBasedMigration
{
    /**
     * @return HHAST\SimpleTypeSpecifier
     */
    private function replaceTypeSpecifier(HHAST\SimpleTypeSpecifier $in)
    {
        $name = \implode('', \array_map(function ($t) {
            return $t->getText();
        }, $in->getDescendantsOfType(HHAST\EditableToken::class)));
        if ($name !== "\\PHPUnit_Framework_TestCase" && $name !== "\\PHPUnit\\Framework\\TestCase" && $name !== "PHPUnit_Framework_TestCase" && $name !== "PHPUnit\\Framework\\TestCase" && $name !== "Facebook\\HackTest\\HackTestCase" && $name !== "\\Facebook\\HackTest\\HackTestCase") {
            return $in;
        }
        $m = HHAST\Missing();
        $parts = \array_merge([new HHAST\NameToken($m, $m, "Facebook"), new HHAST\BackslashToken($m, $m), new HHAST\NameToken($m, $m, "HackTest"), new HHAST\BackslashToken($m, $m), new HHAST\NameToken($m, $m, "HackTest")], $name[0] === "\\" ? [new HHAST\BackslashToken($m, $m)] : []);
        $parts[0] = $parts[0]->withLeading($in->getFirstTokenx()->getLeading());
        $last_idx = \count($parts) - 1;
        $parts[$last_idx] = $parts[$last_idx]->withTrailing($in->getLastTokenx()->getTrailing());
        return $in->withSpecifier(new HHAST\QualifiedName(HHAST\EditableList::createNonEmptyListOrMissing($parts)));
    }
    /**
     * @return HHAST\FunctionCallExpression
     */
    private final function rewriteMarkTestCalls(HHAST\FunctionCallExpression $in)
    {
        $receiver = $in->getReceiver();
        if (!$receiver instanceof HHAST\MemberSelectionExpression) {
            return $in;
        }
        $name = $receiver->getName();
        $name = $name instanceof HHAST\NameToken ? $name : null ? ($name instanceof HHAST\NameToken ? $name : null)->getText() : null;
        if ($name !== 'markTestIncomplete' && $name !== 'markTestSkipped') {
            return $in;
        }
        $obj = $receiver->getObject();
        if (!$obj instanceof HHAST\VariableExpression) {
            return $in;
        }
        $var = $obj->getExpression() instanceof HHAST\VariableToken ? $obj->getExpression() : (function () {
            throw new \TypeError('Failed assertion');
        })();
        if ($var->getText() !== '$this') {
            return $in;
        }
        $m = HHAST\Missing();
        return $in->withReceiver($receiver->withObject(new HHAST\StaticToken($obj->getFirstTokenx()->getLeading(), $m))->withOperator(new HHAST\ColonColonToken($m, $m)));
    }
    /**
     * @template T as HHAST\EditableNode
     *
     * @param T $in
     *
     * @return array{0:HHAST\DelimitedComment, 1:null|string, 2:string}|null
     */
    private function getAndRemoveDocTag($in, string $doc_tag)
    {
        $leading = $in->getFirstTokenx()->getLeading();
        if ($leading->isMissing()) {
            return null;
        }
        if ($leading instanceof HHAST\EditableList) {
            $leading = $leading->getItemsOfType(HHAST\DelimitedComment::class);
        } else {
            if ($leading instanceof HHAST\DelimitedComment) {
                $leading = [$leading];
            } else {
                return null;
            }
        }
        $doc_comments = \array_filter($leading, function ($c) {
            return Str\starts_with($c->getText(), '/**');
        });
        if (\count($doc_comments) !== 1) {
            return null;
        }
        $comment = C\onlyx($doc_comments);
        $comment_text = $comment->getText();
        $matches = [];
        \preg_match('/^[\\/\\s*]*' . \preg_quote($doc_tag, '/') . ' (?<value>[^\\s]+)[ *\\/]*$/mi', $comment_text, $matches);
        $result = $matches['value'] ?? null;
        if ($result === null) {
            return null;
        }
        $comment_text = \implode("\n", \array_filter(\explode("\n", $comment_text), function ($line) use($doc_tag) {
            return !Str\contains_ci($line, $doc_tag);
        }));
        if (\preg_match('/^[\\/*\\s]*$/', $comment_text) === 1) {
            return [$comment, null, $result];
        }
        return [$comment, $comment_text, $result];
    }
    /**
     * @return HHAST\MethodishDeclaration
     */
    private function migrateDataProvider(HHAST\MethodishDeclaration $decl)
    {
        $new = $this->getAndRemoveDocTag($decl, '@dataProvider');
        if ($new === null) {
            return $decl;
        }
        list($comment, $comment_text, $provider) = $new;
        $attr = new HHAST\ConstructorCall(new HHAST\NameToken(HHAST\Missing(), HHAST\Missing(), "DataProvider"), new HHAST\LeftParenToken(HHAST\Missing(), HHAST\Missing()), HHAST\EditableList::createNonEmptyListOrMissing([new HHAST\SingleQuotedStringLiteralToken(HHAST\Missing(), HHAST\Missing(), "'" . $provider . "'")]), new HHAST\RightParenToken(HHAST\Missing(), HHAST\Missing()));
        $attrs = $decl->getAttribute();
        if ($attrs === null) {
            if ($comment_text !== null) {
                $leading = ($decl->getFirstTokenx()->getLeading() instanceof HHAST\EditableList ? $decl->getFirstTokenx()->getLeading() : (function () {
                    throw new \TypeError('Failed assertion');
                })())->replace($comment, $comment->withText($comment_text));
            } else {
                $leading = [];
                foreach (($decl->getFirstTokenx()->getLeading() instanceof HHAST\EditableList ? $decl->getFirstTokenx()->getLeading() : (function () {
                    throw new \TypeError('Failed assertion');
                })())->getItems() as $item) {
                    if ($item === $comment) {
                        break;
                    }
                    $leading[] = $item instanceof HHAST\EditableTrivia ? $item : (function () {
                        throw new \TypeError('Failed assertion');
                    })();
                }
                $leading = HHAST\EditableList::createNonEmptyListOrMissing($this->trimWhitespace($leading));
            }
            $decl = $decl->replace($comment, HHAST\Missing());
            $attrs = new HHAST\AttributeSpecification(new HHAST\LessThanLessThanToken($leading, HHAST\Missing()), HHAST\EditableList::createNonEmptyListOrMissing([$attr]), new HHAST\GreaterThanGreaterThanToken(HHAST\Missing(), HHAST\Missing()));
        } else {
            $decl->replace($comment, $comment_text === null ? HHAST\Missing() : $comment->withText($comment_text));
            $attrs = $attrs->withAttributes(HHAST\EditableList::createNonEmptyListOrMissing(\array_merge([new HHAST\ListItem($attr, new HHAST\CommaToken(HHAST\Missing(), new HHAST\WhiteSpace(' ')))], $attrs->getAttributesx()->getChildren())));
        }
        $decl = $decl->withAttribute($attrs);
        $first = $decl->getFunctionDeclHeader()->getFirstTokenx();
        $leading = \array_map(function ($n) {
            return $n instanceof HHAST\EditableNode ? $n : (function () {
                throw new \TypeError('Failed assertion');
            })();
        }, ($first->getLeading() instanceof HHAST\EditableList ? $first->getLeading() : (function () {
            throw new \TypeError('Failed assertion');
        })())->getItems());
        return $decl->replace($first, $first->withLeading(HHAST\EditableList::createNonEmptyListOrMissing($this->trimWhitespace($leading))));
    }
    /**
     * @param array<int, HHAST\EditableNode> $leading
     *
     * @return array<int, HHAST\EditableNode>
     */
    private function trimWhitespace(array $leading)
    {
        $saved = [];
        $whitespace = [];
        foreach ($leading as $item) {
            if ($item instanceof HHAST\EndOfLine) {
                $whitespace = [];
                if (C\every($saved, function ($s) {
                    return $s instanceof HHAST\WhiteSpace || $s instanceof HHAST\EndOfLine;
                })) {
                    $saved = [$item];
                } else {
                    $saved[] = $item;
                }
                continue;
            } else {
                if ($item instanceof HHAST\WhiteSpace) {
                    $whitespace[] = $item;
                    continue;
                }
            }
            $saved = \array_merge($whitespace, $saved);
            $whitespace = [];
            $saved[] = $item;
        }
        return \array_merge($whitespace, $saved);
    }
    /**
     * @return HHAST\Script
     */
    private final function replaceUsedTypes(HHAST\Script $script)
    {
        $uses = \array_filter(HHAST\__Private\Resolution\get_uses_directly_in_scope($script->getDeclarations())['types'], function ($resolved) {
            return $resolved === 'PHPUnit_Framework_TestCase' || $resolved === 'PHPUnit\\Framework\\TestCase' || $resolved === 'Facebook\\HackTest\\HackTestCase';
        });
        if (C\is_empty($uses)) {
            return $script;
        }
        return $script->rewriteDescendants(function ($node, $_p) use($extends, $uses) {
            if (!$node instanceof HHAST\ClassishDeclaration) {
                return $node;
            }
            $extends = $node->getExtendsList() ? $node->getExtendsList()->getItems() : null;
            if ($extends === null) {
                return $node;
            }
            if (\count($extends) !== 1) {
                // interface
                return $node;
            }
            $extends = C\onlyx($extends);
            if (!$extends instanceof HHAST\SimpleTypeSpecifier) {
                return $node;
            }
            $extends = $extends->getSpecifierx();
            if (!$extends instanceof HHAST\NameToken) {
                return $node;
            }
            if (!C\contains_key($uses, $extends->getText())) {
                return $node;
            }
            return $node->replace($extends, $extends->withText('HackTest'));
        });
    }
    /**
     * @return HHAST\QualifiedName
     */
    private function getQualifiedNameForHackTest()
    {
        $m = HHAST\Missing();
        return new HHAST\QualifiedName(HHAST\EditableList::createNonEmptyListOrMissing([new HHAST\NameToken($m, $m, "Facebook"), new HHAST\BackslashToken($m, $m), new HHAST\NameToken($m, $m, "HackTest"), new HHAST\BackslashToken($m, $m), new HHAST\NameToken($m, $m, "HackTest")]));
    }
    /**
     * @return HHAST\NamespaceUseClause
     */
    private function replaceUseClause(HHAST\NamespaceUseClause $node)
    {
        $what = $node->getName();
        if ($what instanceof HHAST\NameToken) {
            if ($what->getText() !== "PHPUnit_Framework_TestCase") {
                return $node;
            }
            return $node->withName($this->getQualifiedNameForHackTest());
        }
        if (!$what instanceof HHAST\QualifiedName) {
            return $node;
        }
        $text = Str\strip_prefix(\implode('', \array_map(function ($t) {
            return $t->getText();
        }, $what->getDescendantsOfType(HHAST\EditableToken::class))), '\\');
        if ($text !== 'PHPUnit_Framework_TestCase' && $text !== 'PHPUnit\\Framework\\TestCase' && $text !== 'Facebook\\HackTest\\HackTestCase') {
            return $node;
        }
        return $node->withName($this->getQualifiedNameForHackTest());
    }
    /**
     * @return HHAST\FunctionDeclarationHeader
     */
    private function renameSetUpTearDownFunctions(HHAST\FunctionDeclarationHeader $node)
    {
        $name = $node->getNamex() instanceof HHAST\NameToken ? $node->getNamex() : null ? ($node->getNamex() instanceof HHAST\NameToken ? $node->getNamex() : null)->getText() : null;
        if ($name === null) {
            return $node;
        }
        $names = ['setup' => 'beforeEachTestAsync', 'teardown' => 'afterEachTestAsync', 'setupbeforeclass' => 'beforeFirstTestAsync', 'teardownafterclass' => 'afterLastTestAsync'];
        $new_name = $names[Str\lowercase($name)] ?? null;
        if ($new_name === null) {
            return $node;
        }
        $leading = $node->getFirstTokenx()->getLeading();
        $new_modifiers = \array_map(function ($m) {
            if ($m instanceof HHAST\PrivateToken || $m instanceof HHAST\ProtectedToken) {
                return new HHAST\PublicToken(HHAST\Missing(), new HHAST\WhiteSpace(' '));
            }
            return ($m instanceof HHAST\EditableToken ? $m : (function () {
                throw new \TypeError('Failed assertion');
            })())->withLeading(HHAST\Missing())->withTrailing(new HHAST\WhiteSpace(' '));
        }, ($node->getModifiers() ? $node->getModifiers()->getItems() : null) ?? []);
        $new_modifiers[] = new HHAST\AsyncToken(HHAST\Missing(), new HHAST\WhiteSpace(' '));
        $new_modifiers[0] = $new_modifiers[0]->withLeading($leading);
        $type = $node->getType();
        if ($type === null) {
            $node = $node->withRightParen($node->getRightParenx()->withTrailing(HHAST\Missing()))->withColon(new HHAST\ColonToken(HHAST\Missing(), new HHAST\WhiteSpace(' ')))->withType(new HHAST\GenericTypeSpecifier(new HHAST\NameToken(HHAST\Missing(), HHAST\Missing(), 'Awaitable'), new HHAST\TypeArguments(new HHAST\LessThanToken(HHAST\Missing(), HHAST\Missing()), HHAST\EditableList::createNonEmptyListOrMissing([new HHAST\VoidToken(HHAST\Missing(), HHAST\Missing())]), new HHAST\GreaterThanToken(HHAST\Missing(), $node->getRightParenx()->getTrailing()))));
        } else {
            $node = $node->withType(new HHAST\GenericTypeSpecifier(new HHAST\NameToken($type->getFirstTokenx()->getLeading(), HHAST\Missing(), 'Awaitable'), new HHAST\TypeArguments(new HHAST\LessThanToken(HHAST\Missing(), HHAST\Missing()), HHAST\EditableList::createNonEmptyListOrMissing([$type->replace($type->getFirstTokenx(), $type->getFirstTokenx()->withLeading(HHAST\Missing()))->replace($type->getLastTokenx(), $type->getLastTokenx()->withTrailing(HHAST\Missing()))]), new HHAST\GreaterThanToken(HHAST\Missing(), $type->getLastTokenx()->getTrailing()))));
        }
        return $node->withName(new HHAST\NameToken($node->getNamex()->getLeading(), $node->getNamex()->getTrailing(), $new_name))->withModifiers(HHAST\EditableList::createNonEmptyListOrMissing($new_modifiers));
    }
    /**
     * @return HHAST\MethodishDeclaration
     */
    private final function migrateExpectedExceptionAttribute(HHAST\MethodishDeclaration $node)
    {
        $match = $this->getAndRemoveDocTag($node, '@expectedException');
        if ($match === null) {
            return $node;
        }
        list($comment, $comment_text, $exception) = $match;
        $body = $node->getFunctionBody() ? $node->getFunctionBody()->getStatements() : null ? ($node->getFunctionBody() ? $node->getFunctionBody()->getStatements() : null)->getItems() : null;
        if ($body === null) {
            return $node;
        }
        if (C\is_empty($body)) {
            return $node;
        }
        $m = HHAST\Missing();
        $body = \array_merge($body, [new HHAST\ExpressionStatement(new HHAST\FunctionCallExpression(new HHAST\MemberSelectionExpression(new HHAST\VariableExpression(new HHAST\VariableToken(C\firstx($body)->getFirstTokenx()->getLeadingWhitespace(), $m, '$this')), new HHAST\MinusGreaterThanToken($m, $m), new HHAST\NameToken($m, $m, 'expectException')), new HHAST\LeftParenToken($m, $m), HHAST\EditableList::createNonEmptyListOrMissing([new HHAST\NameToken($m, $m, Str\ends_with($exception, '::class') ? $exception : $exception . '::class')]), new HHAST\RightParenToken($m, $m)), new HHAST\SemicolonToken($m, new HHAST\EndOfLine("\n")))]);
        $node = $node->withFunctionBody($node->getFunctionBodyx()->withStatements(HHAST\EditableList::createNonEmptyListOrMissing($body)));
        if ($comment_text !== null) {
            return $node->replace($comment, $comment->withText($comment_text));
        }
        $first = $node->getFirstTokenx();
        $leading = $first->getLeading();
        $items = $leading instanceof HHAST\EditableList ? \array_map(function ($it) {
            return $it instanceof HHAST\EditableNode ? $it : (function () {
                throw new \TypeError('Failed assertion');
            })();
        }, $leading->getItems()) : [$leading];
        $idx = C\find_key($items, function ($it) use($comment) {
            return $it === $comment;
        }) !== null ? C\find_key($items, function ($it) use($comment) {
            return $it === $comment;
        }) : (function () {
            throw new \TypeError('Failed assertion');
        })();
        return $node->replace($first, $first->withLeading(HHAST\EditableList::createNonEmptyListOrMissing(Vec\take($items, $idx))));
    }
    /**
     * @return HHAST\MethodishDeclaration
     */
    private final function migrateExpectException(HHAST\MethodishDeclaration $node)
    {
        $body = $node->getFunctionBody() ? $node->getFunctionBody()->getStatements() : null ? ($node->getFunctionBody() ? $node->getFunctionBody()->getStatements() : null)->getItems() : null;
        if ($body === null) {
            return $node;
        }
        if (C\is_empty($body)) {
            return $node;
        }
        $indent = $node->getFunctionDeclHeader()->getFirstTokenx()->getLeadingWhitespace()->getCode();
        $new = $this->migrateExpectExceptionInStatements($body, $indent);
        if ($new === $body) {
            return $node;
        }
        $ret = $node->withFunctionBody($node->getFunctionBodyx()->withStatements(HHAST\EditableList::createNonEmptyListOrMissing($new)));
        return $ret;
    }
    /**
     * @param array<int, HHAST\EditableNode> $statements
     *
     * @return array<int, HHAST\EditableNode>
     */
    private final function migrateExpectExceptionInStatements(array $statements, string $indent)
    {
        $idx = C\find_key($statements, function ($n) use($r, $var) {
            if (!$n instanceof HHAST\ExpressionStatement) {
                return false;
            }
            $n = $n->getExpression();
            if (!$n instanceof HHAST\FunctionCallExpression) {
                return false;
            }
            $r = $n->getReceiver();
            if (!$r instanceof HHAST\MemberSelectionExpression) {
                return false;
            }
            $var = ($r->getObject() instanceof HHAST\VariableExpression ? $r->getObject() : null ? ($r->getObject() instanceof HHAST\VariableExpression ? $r->getObject() : null)->getExpression() : null) instanceof HHAST\VariableToken ? $r->getObject() instanceof HHAST\VariableExpression ? $r->getObject() : null ? ($r->getObject() instanceof HHAST\VariableExpression ? $r->getObject() : null)->getExpression() : null : null;
            if (($var ? $var->getText() : null) !== '$this') {
                return false;
            }
            $n = $r->getNamex() instanceof HHAST\NameToken ? $r->getNamex() : null;
            if (($n ? $n->getText() : null) !== 'expectException') {
                return false;
            }
            return true;
        });
        if ($idx === null) {
            return $statements;
        }
        $expect_exception = ($statements[$idx] instanceof HHAST\ExpressionStatement ? $statements[$idx] : (function () {
            throw new \TypeError('Failed assertion');
        })())->getExpressionx() instanceof HHAST\FunctionCallExpression ? ($statements[$idx] instanceof HHAST\ExpressionStatement ? $statements[$idx] : (function () {
            throw new \TypeError('Failed assertion');
        })())->getExpressionx() : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $pre = Vec\take($statements, $idx);
        $post = Vec\drop($statements, $idx + 1);
        if (C\is_empty($post)) {
            return $pre;
        }
        $expectation = $this->wrapStatementsInExpectException($post, $expect_exception->getArgumentList() ?? HHAST\Missing(), $indent);
        $new = $pre;
        $new[] = new HHAST\ExpressionStatement($expectation, new HHAST\SemicolonToken(HHAST\Missing(), new HHAST\EndOfLine("\n")));
        // In theory, there should be a 'return' at the end of the statement - but
        // given we've wrapped up the entire remainder of the body into the lambda,
        // it does no difference
        return $new;
    }
    /**
     * @param array<int, HHAST\EditableNode> $statements
     *
     * @return HHAST\FunctionCallExpression
     */
    private function wrapStatementsInExpectException(array $statements, HHAST\EditableNode $exception, string $indent)
    {
        $inner = $this->migrateExpectExceptionInStatements(\array_map(function ($statement) use($t, $indent) {
            $t = $statement->getFirstTokenx();
            return $statement->replace($t, $t->withLeading(new HHAST\WhiteSpace($t->getLeadingWhitespace()->getCode() . $indent)));
        }, $statements), $indent);
        $new_line_leading = HHAST\EditableList::createNonEmptyListOrMissing([(C\first($statements) ? C\first($statements)->getFirstToken() : null ? (C\first($statements) ? C\first($statements)->getFirstToken() : null)->getLeadingWhitespace() : null) ?? new HHAST\WhiteSpace($indent . $indent)]);
        $a = HHAST\EditableList::createNonEmptyListOrMissing($statements);
        $b = HHAST\EditableList::createNonEmptyListOrMissing($inner);
        invariant($a->getCode() !== $b->getCode(), 'idempotency problem');
        $m = HHAST\Missing();
        $expect_call = new HHAST\FunctionCallExpression(new HHAST\NameToken($new_line_leading, $m, 'expect'), new HHAST\LeftParenToken($m, $m), new HHAST\LambdaExpression(
            /* attrs = */
            $m,
            /* async = */
            $m,
            /* coroutine = */
            $m,
            new HHAST\LambdaSignature(
                new HHAST\LeftParenToken($m, $m),
                /* parameters = */
                $m,
                new HHAST\RightParenToken($m, new HHAST\WhiteSpace(' ')),
                /* colon = */
                $m,
                /* type = */
                $m
            ),
            new HHAST\EqualEqualGreaterThanToken($m, new HHAST\WhiteSpace(' ')),
            new HHAST\CompoundStatement(new HHAST\LeftBraceToken($m, new HHAST\EndOfLine("\n")), HHAST\EditableList::createNonEmptyListOrMissing($inner), new HHAST\RightBraceToken($new_line_leading, $m))
        ), new HHAST\RightParenToken($m, $m));
        return new HHAST\FunctionCallExpression(new HHAST\MemberSelectionExpression($expect_call, new HHAST\MinusGreaterThanToken($m, $m), new HHAST\NameToken($m, $m, 'toThrow')), new HHAST\LeftParenToken($m, $m), $exception, new HHAST\RightParenToken($m, $m));
    }
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public final function getSteps()
    {
        return \array_merge($this->getUniqueSteps(), (new HHAST\Migrations\AssertToExpectMigration($this->getRoot()))->getSteps());
    }
    /**
     * @return array<int, IMigrationStep>
     */
    private function getUniqueSteps()
    {
        return [new TypedMigrationStep('replace base class references via use statements', HHAST\Script::class, HHAST\Script::class, function ($node) {
            return $this->replaceUsedTypes($node);
        }), new TypedMigrationStep('replace use clauses', HHAST\NamespaceUseClause::class, HHAST\NamespaceUseClause::class, function ($node) {
            return $this->replaceUseClause($node);
        }), new TypedMigrationStep('replace direct base class references to new name', HHAST\SimpleTypeSpecifier::class, HHAST\SimpleTypeSpecifier::class, function ($node) {
            return $this->replaceTypeSpecifier($node);
        }), new TypedMigrationStep('rename setup/teardown functions', HHAST\FunctionDeclarationHeader::class, HHAST\FunctionDeclarationHeader::class, function ($node) {
            return $this->renameSetUpTearDownFunctions($node);
        }), new TypedMigrationStep('replace `$this->markTestFoo` with static calls', HHAST\FunctionCallExpression::class, HHAST\FunctionCallExpression::class, function ($node) {
            return $this->rewriteMarkTestCalls($node);
        }), new TypedMigrationStep('@dataProvider to attribute', HHAST\MethodishDeclaration::class, HHAST\MethodishDeclaration::class, function ($node) {
            return $this->migrateDataProvider($node);
        }), new TypedMigrationStep('@expectException to $this->expectException()', HHAST\MethodishDeclaration::class, HHAST\MethodishDeclaration::class, function ($node) {
            return $this->migrateExpectedExceptionAttribute($node);
        }), new TypedMigrationStep('$this->expectException() to expect()->toThrow()', HHAST\MethodishDeclaration::class, HHAST\MethodishDeclaration::class, function ($node) {
            return $this->migrateExpectException($node);
        })];
    }
}

