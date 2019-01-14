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
use HH\Lib\{C, Str, Vec, Math, Keyset};
use Facebook\HHAST\{EditableNode, FunctionCallExpression, NameToken, EditableList, BinaryExpression, LiteralExpression, BooleanLiteralToken, NullLiteralToken, NamespaceGroupUseDeclaration, NamespaceUseDeclaration, QualifiedName, Script, INamespaceUseDeclaration, NamespaceUseClause, NamespaceToken, ListItem, PrefixUnaryExpression, MinusToken, DecimalLiteralToken, LiteralExpression, ExpressionStatement, OctalLiteralToken, CommaToken, WhiteSpace, BackslashToken, MarkupSection, NamespaceDeclaration, NamespaceEmptyBody, NamespaceBody};
use function Facebook\HHAST\__Private\find_type_for_node_async;
/**
 * Generated enum class, do not extend
 */
abstract class HslNamespace
{
    const C = 'C';
    const DICT = 'Dict';
    const KEYSET = 'Keyset';
    const MATH = 'Math';
    const STR = 'Str';
    const VEC = 'Vec';
}

final class HSLMigration extends BaseMigration
{
    /**
     * @var array<string, array{ns:HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, name:string, argument_order:array<int, int>, has_overrides:bool, replace_false_with_null:bool}>
     */
    const PHP_HSL_REPLACEMENTS = ['ucwords' => ['ns' => HslNamespace::STR, 'name' => 'capitalize_words'], 'ucfirst' => ['ns' => HslNamespace::STR, 'name' => 'capitalize'], 'strtolower' => ['ns' => HslNamespace::STR, 'name' => 'lowercase'], 'strtoupper' => ['ns' => HslNamespace::STR, 'name' => 'uppercase'], 'str_replace' => ['ns' => HslNamespace::STR, 'name' => 'replace', 'argument_order' => [2, 0, 1]], 'str_ireplace' => ['ns' => HslNamespace::STR, 'name' => 'replace_ci', 'argument_order' => [2, 0, 1]], 'strpos' => ['ns' => HslNamespace::STR, 'name' => 'search', 'replace_false_with_null' => true], 'stripos' => ['ns' => HslNamespace::STR, 'name' => 'search_ci', 'replace_false_with_null' => true], 'strrpos' => ['ns' => HslNamespace::STR, 'name' => 'search_last', 'replace_false_with_null' => true], 'implode' => ['ns' => HslNamespace::STR, 'name' => 'join', 'argument_order' => [1, 0]], 'join' => ['ns' => HslNamespace::STR, 'name' => 'join', 'argument_order' => [1, 0]], 'substr_replace' => ['ns' => HslNamespace::STR, 'name' => 'splice', 'has_overrides' => true], 'substr' => ['ns' => HslNamespace::STR, 'name' => 'slice', 'has_overrides' => true], 'str_repeat' => ['ns' => HslNamespace::STR, 'name' => 'repeat'], 'trim' => ['ns' => HslNamespace::STR, 'name' => 'trim'], 'ltrim' => ['ns' => HslNamespace::STR, 'name' => 'trim_left'], 'rtrim' => ['ns' => HslNamespace::STR, 'name' => 'trim_right'], 'strlen' => ['ns' => HslNamespace::STR, 'name' => 'length'], 'sprintf' => ['ns' => HslNamespace::STR, 'name' => 'format'], 'str_split' => ['ns' => HslNamespace::STR, 'name' => 'chunk'], 'strcmp' => ['ns' => HslNamespace::STR, 'name' => 'compare'], 'strcasecmp' => ['ns' => HslNamespace::STR, 'name' => 'compare_ci'], 'number_format' => ['ns' => HslNamespace::STR, 'name' => 'format_number'], 'round' => ['ns' => HslNamespace::MATH, 'name' => 'round', 'has_overrides' => true], 'ceil' => ['ns' => HslNamespace::MATH, 'name' => 'ceil'], 'floor' => ['ns' => HslNamespace::MATH, 'name' => 'floor'], 'array_sum' => ['ns' => HslNamespace::MATH, 'name' => 'sum'], 'intdiv' => ['ns' => HslNamespace::MATH, 'name' => 'int_div'], 'exp' => ['ns' => HslNamespace::MATH, 'name' => 'exp'], 'abs' => ['ns' => HslNamespace::MATH, 'name' => 'abs'], 'base_convert' => ['ns' => HslNamespace::MATH, 'name' => 'base_convert'], 'cos' => ['ns' => HslNamespace::MATH, 'name' => 'cos'], 'sin' => ['ns' => HslNamespace::MATH, 'name' => 'sin'], 'tan' => ['ns' => HslNamespace::MATH, 'name' => 'tan'], 'sqrt' => ['ns' => HslNamespace::MATH, 'name' => 'sqrt'], 'log' => ['ns' => HslNamespace::MATH, 'name' => 'log'], 'min' => ['ns' => HslNamespace::MATH, 'name' => 'min', 'has_overrides' => true], 'max' => ['ns' => HslNamespace::MATH, 'name' => 'max', 'has_overrides' => true], 'count' => ['ns' => HslNamespace::C, 'name' => 'count', 'argument_order' => [0]]];
    /**
     * @return EditableNode
     */
    public function migrateFile(string $path, EditableNode $root)
    {
        // find all the function calls
        $nodes = $root->getDescendantsOfType(FunctionCallExpression::class);
        // keep track of any HSL namespaces we may have to add to the top of the file
        $found_namespaces = [];
        // check if any functions are in the replacement list
        foreach ($nodes as $node) {
            // bail if not in the config
            $fn_name = $this->getFunctionName($node);
            if ($fn_name === null || !C\contains_key(self::PHP_HSL_REPLACEMENTS, $fn_name)) {
                continue;
            }
            // found a function to replace!
            $replace_config = self::PHP_HSL_REPLACEMENTS[$fn_name];
            $namespace = $replace_config['ns'];
            $replacement = $replace_config['name'];
            // build the replacement AST node
            $new_node = $this->replaceFunctionName($node, $namespace . '\\' . $replacement);
            // possibly change argument order
            $argument_order = $replace_config['argument_order'] ?? null;
            if ($argument_order !== null || ($replace_config['has_overrides'] ?? false)) {
                list($new_node, $found_namespaces) = \Amp\Promise\wait($this->maybeMutateArgumentsAsync($root, $new_node, $argument_order, $path, $found_namespaces));
            }
            // if we got null back here, it means the function call has unsupported arguments. forget it for now
            if ($new_node === null) {
                continue;
            }
            // we know we're rewriting the node, so now we know we need the namespace
            $found_namespaces[] = $namespace;
            // replace it in the ast
            $root = $root->replace($node, $new_node);
            // potentially change adjacent expressions to check for null instead of false
            if ($replace_config['replace_false_with_null'] ?? false) {
                $root = $this->maybeChangeFalseToNull($root, $new_node);
            }
        }
        if (\count($found_namespaces) === 0) {
            return $root;
        }
        // add "use namespace" declarations at the top if they aren't already present
        $declarations = (array) $root->getDescendantsOfType(INamespaceUseDeclaration::class);
        list($hsl_declarations, $suffixes) = $this->findUseDeclarations($declarations);
        $count_before = \count($suffixes);
        // add new suffixes to the current list of suffixes
        $suffixes = Keyset\union($suffixes, $found_namespaces);
        // added any new suffixes?
        if (\count($suffixes) === $count_before) {
            return $root;
        }
        // remove any current use statements for HH\Lib\* namespaces, we'll group them together
        $root = $root->removeWhere(function ($node, $parents) use($hsl_declarations) {
            return C\contains($hsl_declarations, $node);
        });
        // build a possibly grouped namespace use declaration
        $new_namespace_use_declaration = $this->buildUseDeclaration($suffixes);
        // insert the new node: skip the <?hh sigil and namespace declaration if present,
        // then insert before the first declaration that remains
        foreach ($root->getChildren()['declarations']->getChildren() as $child) {
            if ($child instanceof MarkupSection) {
                continue;
            }
            if ($child instanceof NamespaceDeclaration) {
                $body = $child->getBody();
                // namespace Foo; style declaration, skip over it
                if ($body instanceof NamespaceEmptyBody) {
                    continue;
                }
                // namespace Foo { style declaration
                // insert the use statement inside the braces, before the first child
                invariant($body instanceof NamespaceBody, 'expected NamespaceBody');
                $child = C\firstx($body->getDeclarationsx()->getChildren());
            }
            if ($child instanceof INamespaceUseDeclaration) {
                // next statement is another use declaration, remove the trailing newline
                $last_token = $new_namespace_use_declaration->getLastTokenx();
                $new_namespace_use_declaration = $new_namespace_use_declaration->replace($last_token, $last_token->withTrailing(HHAST\Missing()));
            }
            return $root->insertBefore($child, $new_namespace_use_declaration);
        }
        invariant_violation('should not fail to insert new node');
    }
    /**
     * @return null|int
     */
    protected function resolveIntegerArgument(EditableNode $node)
    {
        if ($node instanceof LiteralExpression) {
            $expr = $node->getExpression();
            if ($expr instanceof DecimalLiteralToken) {
                return (int) $expr->getText();
            }
            // a literal 0 shows as octal
            if ($expr instanceof OctalLiteralToken) {
                return (int) $expr->getText();
            }
            return null;
        }
        if ($node instanceof PrefixUnaryExpression && $node->getOperator() instanceof MinusToken) {
            $val = $this->resolveIntegerArgument($node->getOperand());
            return $val !== null ? -1 * $val : null;
        }
        return null;
    }
    // change argument order or structure between PHP function and HSL function if necessary
    /**
     * @param array<int, int>|null $argument_order
     * @param array<HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC> $found_namespaces
     *
     * @return \Amp\Promise<array{0:null|FunctionCallExpression, 1:array<HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC>}>
     */
    protected function maybeMutateArgumentsAsync(EditableNode $root, FunctionCallExpression $node, ?array $argument_order, string $path, array $found_namespaces)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, array{0:null|FunctionCallExpression, 1:array<HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC>}> */
            function () use($root, $node, $argument_order, $path, $found_namespaces) : \Generator {
                $argument_list = $node->getArgumentList();
                invariant($argument_list !== null, 'Function must have arguments');
                $arguments = $argument_list->getChildren();
                $new_argument_list = $argument_list;
                $items = \array_map(function ($argument) {
                    invariant($argument instanceof ListItem, 'expected ListItem');
                    return $argument->getItemx();
                }, $arguments);
                // can't handle these ones with wrong number of args yet
                // return null, signaling to caller to skip rewriting this invocation
                if ($argument_order !== null && \count($items) !== \count($argument_order)) {
                    return [null, $found_namespaces];
                }
                // implode argument order is ambiguous
                // when converting to join, check to make sure the second element is a string
                // if the arguments are in the wrong order, reverse them
                // if neither arg is a string, hh_client should complain so we just leave it as is
                $fn_name = $this->getFunctionName($node);
                if ($fn_name === 'Str\\join') {
                    $type = (yield find_type_for_node_async($root, $items[1], $path));
                    if ($type === 'string') {
                        $argument_order = Vec\reverse($argument_order ?? []);
                    }
                } else {
                    if ($fn_name === 'Str\\replace' || $fn_name === 'Str\\replace_ci') {
                        // str_replace and str_ireplace have two modes:
                        // string for search/replace args means replacing a single pattern
                        // arrays mean replacing a set of patterns, which we should rewrite as Str\replace_every
                        $type = (yield find_type_for_node_async($root, $items[0], $path));
                        if ($type !== 'string') {
                            if ($fn_name === 'Str\\replace_ci') {
                                // (note there is no Str\replace_every_ci at the moment, so this case is unhandled)
                                // bail to skip rewriting this call
                                return [null, $found_namespaces];
                            }
                            // add Dict to set of required namespaces so we can call Dict\associate()
                            $found_namespaces[] = HslNamespace::DICT;
                            $node = $this->replaceFunctionName($node, 'Str\\replace_every');
                            $search_arg = $items[0]->getCode();
                            $replace_arg = $items[1]->getCode();
                            // replacement dictionary uses keys from first arg, values from second arg
                            $expr = 'Dict\\associate(' . $search_arg . ', ' . $replace_arg . ')';
                            $replacement_patterns = $this->nodeFromCode($expr, ExpressionStatement::class);
                            $new_argument_list = EditableList::createNonEmptyListOrMissing([new ListItem($items[2], new CommaToken(HHAST\Missing(), EditableList::createNonEmptyListOrMissing([new WhiteSpace(' ')]))), new ListItem($replacement_patterns, HHAST\Missing())]);
                            return [$node->replace($argument_list, $new_argument_list), $found_namespaces];
                        }
                    } else {
                        if ($fn_name === 'Str\\slice' && \count($items) === 3) {
                            // check for negative length arguments to Str\slice, which will throw a runtime exception
                            $length = $this->resolveIntegerArgument($items[2]);
                            if ($length !== null && $length < 0) {
                                $offset = $this->resolveIntegerArgument($items[1]);
                                if ($offset === null) {
                                    // skip this one if we don't have a sensible offset
                                    return [null, $found_namespaces];
                                }
                                // if the offset is negative too, it's pretty simple
                                // we can compute the correct length as abs(offset) + length and rewrite teh node
                                if ($offset < 0) {
                                    $rewrite_length_value = Math\abs($offset) + $length;
                                    $unary = C\onlyx($items[2]->getDescendantsOfType(PrefixUnaryExpression::class));
                                    $new_length = new ListItem(new LiteralExpression(new DecimalLiteralToken(HHAST\Missing(), HHAST\Missing(), (string) $rewrite_length_value)), HHAST\Missing());
                                } else {
                                    // with a positive offset this is harder
                                    // we need to replace this arg with a more complex expression
                                    // based on the length of the string
                                    $haystack = $items[0]->getCode();
                                    $new_length = $this->nodeFromCode('Str\\length(' . $haystack . ') - ' . ($offset + Math\abs($length)), ExpressionStatement::class);
                                }
                                // rewrite args list
                                $new_argument_list = $argument_list->replace($items[2], $new_length);
                            }
                        } else {
                            if ($fn_name === 'Str\\splice' && \count($items) === 4) {
                                // check for negative length arguments to Str\splice, which will throw a runtime exception
                                // this is currently unhandled, so we just bail by returning null if we find it
                                $length = $this->resolveIntegerArgument($items[3]);
                                if ($length !== null && $length < 0) {
                                    return [null, $found_namespaces];
                                }
                            } else {
                                if (($fn_name === 'Math\\max' || $fn_name === 'Math\\min') && \count($items) !== 1) {
                                    // PHP max() and min() either take a list of variadic args, or an array of args
                                    // in HSL, max and min want a single Traversable arg, while maxva and minva are variadic
                                    return [$this->replaceFunctionName($node, $fn_name . 'va'), $found_namespaces];
                                } else {
                                    if ($fn_name === 'Math\\round' && \count($items) > 2) {
                                        // can't handle the optional third argument of round()
                                        return [null, $found_namespaces];
                                    }
                                }
                            }
                        }
                    }
                }
                if ($argument_order !== null) {
                    $new_items = [];
                    foreach ($argument_order as $index) {
                        $new_items[] = $items[$index];
                    }
                    $new_argument_list = [];
                    foreach ($arguments as $i => $argument) {
                        invariant($argument instanceof ListItem, 'expected ListItem');
                        $new_argument_list[] = $argument->replace($argument->getItemx(), $new_items[(int) $i]);
                    }
                    $new_argument_list = EditableList::createNonEmptyListOrMissing($new_argument_list);
                }
                return [$node->replace($argument_list, $new_argument_list), $found_namespaces];
            }
        );
    }
    // many PHP functions can return false, and their HSL counterparts return null instead
    // this will replace false with null in binary expressions like === false and !=== false
    /**
     * @return EditableNode
     */
    protected function maybeChangeFalseToNull(EditableNode $root, FunctionCallExpression $node)
    {
        $parents = null;
        $found = false;
        $stack = $root->findWithParents(function ($it) use($node) {
            return $it === $node;
        });
        invariant(!C\is_empty($stack), 'did not find node in root');
        invariant(C\lastx($stack) === $node, 'expected node at top of stack');
        $stack_count = \count($stack);
        $parent = $stack[$stack_count - 2];
        if (!$parent instanceof BinaryExpression) {
            return $root;
        }
        if ($parent->getLeftOperand() === $node) {
            $check = $parent->getRightOperand();
        } else {
            $check = $parent->getLeftOperand();
        }
        if ($check instanceof LiteralExpression) {
            $expression = $check->getExpression();
            if ($expression instanceof BooleanLiteralToken) {
                if (Str\lowercase($expression->getText()) === 'false') {
                    $new = new NullLiteralToken($expression->getLeading(), $expression->getTrailing());
                    $root = $root->replace($expression, $new);
                }
            }
        }
        return $root;
    }
    // find all HH\Lib\* namespace use declarations
    // returns a tuple containing the declaration nodes, the HSL namespace suffixes used
    /**
     * @param array<int, INamespaceUseDeclaration> $declarations
     *
     * @return array{0:array<int, INamespaceUseDeclaration>, 1:array<int, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC>}
     */
    protected function findUseDeclarations(array $declarations)
    {
        $search = ["HH", "Lib"];
        $nodes = [];
        $suffixes = [];
        foreach ($declarations as $decl) {
            // we only care about "use namespace" directives
            if (!$decl->getKind() instanceof NamespaceToken) {
                continue;
            }
            if ($decl instanceof NamespaceGroupUseDeclaration) {
                // group declarations: does prefix match?
                $parts = $decl->getPrefix()->getParts()->getItemsOfType(NameToken::class);
                if (\count($parts) !== 2) {
                    continue;
                }
                $found_prefix = true;
                foreach ($parts as $i => $token) {
                    if ($token->getText() === $search[$i]) {
                        continue;
                    }
                    $found_prefix = false;
                    break;
                }
                // prefix didn't match? skip this declaration
                if (!$found_prefix) {
                    continue;
                }
                // prefix matches: add node to list of nodes
                $nodes[] = $decl;
                $clauses = (array) $decl->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
                $suffixes = \array_merge(Vec\filter_nulls(\array_map(function ($c) use($n) {
                    $n = $c->getName();
                    return $n instanceof NameToken ? HslNamespace::coerce($n->getText()) : null;
                }, $clauses)), $suffixes);
            } else {
                invariant($decl instanceof NamespaceUseDeclaration, 'Unhandled declaration type');
                $clauses = $decl->getClauses()->getItems();
                foreach ($clauses as $clause) {
                    $name = $clause->getName();
                    if ($name instanceof QualifiedName) {
                        $parts = $name->getParts()->getItemsOfType(NameToken::class);
                        if (\count($parts) !== 3) {
                            continue;
                        }
                        foreach ($parts as $i => $token) {
                            if ($i < 2 && $token->getText() !== $search[$i]) {
                                break;
                            }
                            if ($i === 2) {
                                // we found an HH\Lib\* use statement, add the node and suffix
                                $nodes[] = $decl;
                                $ns = HslNamespace::coerce($token->getText());
                                if ($ns !== null) {
                                    $suffixes[] = $ns;
                                }
                            }
                        }
                    }
                }
            }
        }
        return [$nodes, $suffixes];
    }
    // get a node for a use namespace declaration
    /**
     * @param array<HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC> $suffixes
     *
     * @return INamespaceUseDeclaration
     */
    protected function buildUseDeclaration(array $suffixes)
    {
        if (\count($suffixes) > 1) {
            // make a grouped use declaration
            $ns = "{" . \implode(', ', $suffixes) . "}";
        } else {
            // single namespace use declaration
            $ns = C\firstx($suffixes);
        }
        return $this->nodeFromCode("\nuse namespace HH\\Lib\\" . $ns . ";\n", INamespaceUseDeclaration::class);
    }
    // extract the function name from an expression
    /**
     * @return null|string
     */
    protected function getFunctionName(FunctionCallExpression $node)
    {
        $receiver = $node->getReceiver();
        if ($receiver instanceof NameToken) {
            return $receiver->getText();
        } else {
            if ($receiver instanceof QualifiedName) {
                foreach ($receiver->getParts()->getChildren() as $child) {
                    invariant($child instanceof ListItem, 'expected ListItem');
                    $item = $child->getItem();
                    if ($item === null && $child->getSeparator() instanceof BackslashToken) {
                        continue;
                    } else {
                        if ($item instanceof NameToken) {
                            return $item->getText();
                        }
                    }
                    return null;
                }
            }
        }
        return null;
    }
    /**
     * @return FunctionCallExpression
     */
    protected function replaceFunctionName(FunctionCallExpression $node, string $new_name)
    {
        // build the replacement AST node
        $receiver = $node->getReceiver();
        if ($receiver instanceof NameToken) {
            $new_receiver = new NameToken($receiver->getLeading(), $receiver->getTrailing(), $new_name);
        } else {
            invariant($receiver instanceof QualifiedName, 'expected QualifiedName');
            $first_item = C\firstx($receiver->getParts()->getChildren());
            invariant($first_item instanceof ListItem, 'expected ListItem');
            $new_receiver = new NameToken($first_item->getSeparatorx()->getLeading(), HHAST\Missing(), $new_name);
        }
        return $node->replace($receiver, $new_receiver);
    }
    /**
     * @template T as EditableNode
     *
     * @param T::class $expected
     *
     * @return T
     */
    protected function nodeFromCode(string $code, string $expected)
    {
        $node = HHAST\from_code($code);
        invariant($node instanceof Script, 'always gets back a script tag');
        $children = (array) $node->getDeclarations()->getChildrenOfType($expected);
        $node = C\onlyx($children);
        return $node;
    }
}

