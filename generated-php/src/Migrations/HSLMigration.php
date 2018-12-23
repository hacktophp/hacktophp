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

use Facebook\HHAST as HHAST;
use HH\Lib\{C as C, Str as Str, Vec as Vec, Math as Math, Keyset as Keyset};
use Facebook\HHAST\{EditableNode as EditableNode, FunctionCallExpression as FunctionCallExpression, NameToken as NameToken, EditableList as EditableList, BinaryExpression as BinaryExpression, LiteralExpression as LiteralExpression, BooleanLiteralToken as BooleanLiteralToken, NullLiteralToken as NullLiteralToken, NamespaceGroupUseDeclaration as NamespaceGroupUseDeclaration, NamespaceUseDeclaration as NamespaceUseDeclaration, QualifiedName as QualifiedName, Script as Script, INamespaceUseDeclaration as INamespaceUseDeclaration, NamespaceUseClause as NamespaceUseClause, NamespaceToken as NamespaceToken, ListItem as ListItem, PrefixUnaryExpression as PrefixUnaryExpression, MinusToken as MinusToken, DecimalLiteralToken as DecimalLiteralToken, LiteralExpression as LiteralExpression, ExpressionStatement as ExpressionStatement, OctalLiteralToken as OctalLiteralToken, CommaToken as CommaToken, WhiteSpace as WhiteSpace, BackslashToken as BackslashToken, MarkupSection as MarkupSection, NamespaceDeclaration as NamespaceDeclaration, NamespaceEmptyBody as NamespaceEmptyBody, NamespaceBody as NamespaceBody};
use function Facebook\HHAST\__Private\find_type_for_node_async as find_type_for_node_async;
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
    const PHP_HSL_REPLACEMENTS = array('ucwords' => array('ns' => HslNamespace::STR, 'name' => 'capitalize_words'), 'ucfirst' => array('ns' => HslNamespace::STR, 'name' => 'capitalize'), 'strtolower' => array('ns' => HslNamespace::STR, 'name' => 'lowercase'), 'strtoupper' => array('ns' => HslNamespace::STR, 'name' => 'uppercase'), 'str_replace' => array('ns' => HslNamespace::STR, 'name' => 'replace', 'argument_order' => array(2, 0, 1)), 'str_ireplace' => array('ns' => HslNamespace::STR, 'name' => 'replace_ci', 'argument_order' => array(2, 0, 1)), 'strpos' => array('ns' => HslNamespace::STR, 'name' => 'search', 'replace_false_with_null' => true), 'stripos' => array('ns' => HslNamespace::STR, 'name' => 'search_ci', 'replace_false_with_null' => true), 'strrpos' => array('ns' => HslNamespace::STR, 'name' => 'search_last', 'replace_false_with_null' => true), 'implode' => array('ns' => HslNamespace::STR, 'name' => 'join', 'argument_order' => array(1, 0)), 'join' => array('ns' => HslNamespace::STR, 'name' => 'join', 'argument_order' => array(1, 0)), 'substr_replace' => array('ns' => HslNamespace::STR, 'name' => 'splice', 'has_overrides' => true), 'substr' => array('ns' => HslNamespace::STR, 'name' => 'slice', 'has_overrides' => true), 'str_repeat' => array('ns' => HslNamespace::STR, 'name' => 'repeat'), 'trim' => array('ns' => HslNamespace::STR, 'name' => 'trim'), 'ltrim' => array('ns' => HslNamespace::STR, 'name' => 'trim_left'), 'rtrim' => array('ns' => HslNamespace::STR, 'name' => 'trim_right'), 'strlen' => array('ns' => HslNamespace::STR, 'name' => 'length'), 'sprintf' => array('ns' => HslNamespace::STR, 'name' => 'format'), 'str_split' => array('ns' => HslNamespace::STR, 'name' => 'chunk'), 'strcmp' => array('ns' => HslNamespace::STR, 'name' => 'compare'), 'strcasecmp' => array('ns' => HslNamespace::STR, 'name' => 'compare_ci'), 'number_format' => array('ns' => HslNamespace::STR, 'name' => 'format_number'), 'round' => array('ns' => HslNamespace::MATH, 'name' => 'round', 'has_overrides' => true), 'ceil' => array('ns' => HslNamespace::MATH, 'name' => 'ceil'), 'floor' => array('ns' => HslNamespace::MATH, 'name' => 'floor'), 'array_sum' => array('ns' => HslNamespace::MATH, 'name' => 'sum'), 'intdiv' => array('ns' => HslNamespace::MATH, 'name' => 'int_div'), 'exp' => array('ns' => HslNamespace::MATH, 'name' => 'exp'), 'abs' => array('ns' => HslNamespace::MATH, 'name' => 'abs'), 'base_convert' => array('ns' => HslNamespace::MATH, 'name' => 'base_convert'), 'cos' => array('ns' => HslNamespace::MATH, 'name' => 'cos'), 'sin' => array('ns' => HslNamespace::MATH, 'name' => 'sin'), 'tan' => array('ns' => HslNamespace::MATH, 'name' => 'tan'), 'sqrt' => array('ns' => HslNamespace::MATH, 'name' => 'sqrt'), 'log' => array('ns' => HslNamespace::MATH, 'name' => 'log'), 'min' => array('ns' => HslNamespace::MATH, 'name' => 'min', 'has_overrides' => true), 'max' => array('ns' => HslNamespace::MATH, 'name' => 'max', 'has_overrides' => true), 'count' => array('ns' => HslNamespace::C, 'name' => 'count', 'argument_order' => array(0)));
    /**
     * @return EditableNode
     */
    public function migrateFile(string $path, EditableNode $root)
    {
        $nodes = $root->getDescendantsOfType(FunctionCallExpression::class);
        $found_namespaces = array();
        foreach ($nodes as $node) {
            $fn_name = $this->getFunctionName($node);
            if ($fn_name === null || !C\contains_key(self::PHP_HSL_REPLACEMENTS, $fn_name)) {
                continue;
            }
            $replace_config = self::PHP_HSL_REPLACEMENTS[$fn_name];
            $namespace = $replace_config['ns'];
            $replacement = $replace_config['name'];
            $new_node = $this->replaceFunctionName($node, $namespace . '\\' . $replacement);
            $argument_order = $replace_config['argument_order'] ?? null;
            if ($argument_order !== null || ($replace_config['has_overrides'] ?? false)) {
                list($new_node, $found_namespaces) = $this->maybeMutateArgumentsAsync($root, $new_node, $argument_order, $path, $found_namespaces)->wait();
            }
            if ($new_node === null) {
                continue;
            }
            $found_namespaces[] = $namespace;
            $root = $root->replace($node, $new_node);
            if ($replace_config['replace_false_with_null'] ?? false) {
                $root = $this->maybeChangeFalseToNull($root, $new_node);
            }
        }
        if (\count($found_namespaces) === 0) {
            return $root;
        }
        $declarations = (array) $root->getDescendantsOfType(INamespaceUseDeclaration::class);
        list($hsl_declarations, $suffixes) = $this->findUseDeclarations($declarations);
        $count_before = \count($suffixes);
        $suffixes = Keyset\union($suffixes, $found_namespaces);
        if (\count($suffixes) === $count_before) {
            return $root;
        }
        $root = $root->removeWhere(function ($node, $parents) use($hsl_declarations) {
            return C\contains($hsl_declarations, $node);
        });
        $new_namespace_use_declaration = $this->buildUseDeclaration($suffixes);
        foreach ($root->getChildren()['declarations']->getChildren() as $child) {
            if ($child instanceof MarkupSection) {
                continue;
            }
            if ($child instanceof NamespaceDeclaration) {
                $body = $child->getBody();
                if ($body instanceof NamespaceEmptyBody) {
                    continue;
                }
                invariant($body instanceof NamespaceBody, 'expected NamespaceBody');
                $child = C\firstx($body->getDeclarationsx()->getChildren());
            }
            if ($child instanceof INamespaceUseDeclaration) {
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
     * @return \Sabre\Event\Promise<array{0:null|FunctionCallExpression, 1:array<HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC, HslNamespace::C|HslNamespace::DICT|HslNamespace::KEYSET|HslNamespace::MATH|HslNamespace::STR|HslNamespace::VEC>}>
     */
    protected function maybeMutateArgumentsAsync(EditableNode $root, FunctionCallExpression $node, ?array $argument_order, string $path, array $found_namespaces)
    {
        return \Sabre\Event\coroutine(
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
                if ($argument_order !== null && \count($items) !== \count($argument_order)) {
                    return array(null, $found_namespaces);
                }
                $fn_name = $this->getFunctionName($node);
                if ($fn_name === 'Str\\join') {
                    $type = (yield find_type_for_node_async($root, $items[1], $path));
                    if ($type === 'string') {
                        $argument_order = Vec\reverse($argument_order ?? array());
                    }
                } else {
                    if ($fn_name === 'Str\\replace' || $fn_name === 'Str\\replace_ci') {
                        $type = (yield find_type_for_node_async($root, $items[0], $path));
                        if ($type !== 'string') {
                            if ($fn_name === 'Str\\replace_ci') {
                                return array(null, $found_namespaces);
                            }
                            $found_namespaces[] = HslNamespace::DICT;
                            $node = $this->replaceFunctionName($node, 'Str\\replace_every');
                            $search_arg = $items[0]->getCode();
                            $replace_arg = $items[1]->getCode();
                            $expr = 'Dict\\associate(' . $search_arg . ', ' . $replace_arg . ')';
                            $replacement_patterns = $this->nodeFromCode($expr, ExpressionStatement::class);
                            $new_argument_list = EditableList::createNonEmptyListOrMissing(array(new ListItem($items[2], new CommaToken(HHAST\Missing(), EditableList::createNonEmptyListOrMissing(array(new WhiteSpace(' '))))), new ListItem($replacement_patterns, HHAST\Missing())));
                            return array($node->replace($argument_list, $new_argument_list), $found_namespaces);
                        }
                    } else {
                        if ($fn_name === 'Str\\slice' && \count($items) === 3) {
                            $length = $this->resolveIntegerArgument($items[2]);
                            if ($length !== null && $length < 0) {
                                $offset = $this->resolveIntegerArgument($items[1]);
                                if ($offset === null) {
                                    return array(null, $found_namespaces);
                                }
                                if ($offset < 0) {
                                    $rewrite_length_value = Math\abs($offset) + $length;
                                    $unary = C\onlyx($items[2]->getDescendantsOfType(PrefixUnaryExpression::class));
                                    $new_length = new ListItem(new LiteralExpression(new DecimalLiteralToken(HHAST\Missing(), HHAST\Missing(), (string) $rewrite_length_value)), HHAST\Missing());
                                } else {
                                    $haystack = $items[0]->getCode();
                                    $new_length = $this->nodeFromCode('Str\\length(' . $haystack . ') - ' . ($offset + Math\abs($length)), ExpressionStatement::class);
                                }
                                $new_argument_list = $argument_list->replace($items[2], $new_length);
                            }
                        } else {
                            if ($fn_name === 'Str\\splice' && \count($items) === 4) {
                                $length = $this->resolveIntegerArgument($items[3]);
                                if ($length !== null && $length < 0) {
                                    return array(null, $found_namespaces);
                                }
                            } else {
                                if (($fn_name === 'Math\\max' || $fn_name === 'Math\\min') && \count($items) !== 1) {
                                    return array($this->replaceFunctionName($node, $fn_name . 'va'), $found_namespaces);
                                } else {
                                    if ($fn_name === 'Math\\round' && \count($items) > 2) {
                                        return array(null, $found_namespaces);
                                    }
                                }
                            }
                        }
                    }
                }
                if ($argument_order !== null) {
                    $new_items = array();
                    foreach ($argument_order as $index) {
                        $new_items[] = $items[$index];
                    }
                    $new_argument_list = array();
                    foreach ($arguments as $i => $argument) {
                        invariant($argument instanceof ListItem, 'expected ListItem');
                        $new_argument_list[] = $argument->replace($argument->getItemx(), $new_items[(int) $i]);
                    }
                    $new_argument_list = EditableList::createNonEmptyListOrMissing($new_argument_list);
                }
                return array($node->replace($argument_list, $new_argument_list), $found_namespaces);
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
        $search = array('HH', 'Lib');
        $nodes = array();
        $suffixes = array();
        foreach ($declarations as $decl) {
            if (!$decl->getKind() instanceof NamespaceToken) {
                continue;
            }
            if ($decl instanceof NamespaceGroupUseDeclaration) {
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
                if (!$found_prefix) {
                    continue;
                }
                $nodes[] = $decl;
                $clauses = (array) $decl->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
                $suffixes = Vec\concat($suffixes, Vec\filter_nulls(\array_map(function ($c) use($n) {
                    $n = $c->getName();
                    return $n instanceof NameToken ? HslNamespace::coerce($n->getText()) : null;
                }, $clauses)));
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
        return array($nodes, $suffixes);
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
            $ns = '{' . \implode(', ', $suffixes) . '}';
        } else {
            $ns = C\firstx($suffixes);
        }
        return $this->nodeFromCode('
use namespace HH\\Lib\\' . $ns . ';
', INamespaceUseDeclaration::class);
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
     * @psalm-template T as \Facebook\HHAST\Migrations\EditableNode
     *
     * @param T::class $expected
     *
     * @return \T
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

