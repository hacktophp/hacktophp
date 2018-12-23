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
use HH\Lib\{C as C, Str as Str, Vec as Vec};
final class IsRefinementMigration extends BaseMigration
{
    /**
     * @return HHAST\EditableNode
     */
    public function migrateFile(string $_path, HHAST\EditableNode $ast)
    {
        $m = HHAST\Missing();
        $map = array('is_string' => function () use($m) {
            return new HHAST\StringToken($m, $m);
        }, 'is_int' => function () use($m) {
            return new HHAST\IntToken($m, $m);
        }, 'is_float' => function () use($m) {
            return new HHAST\FloatToken($m, $m);
        }, 'is_bool' => function () use($m) {
            return new HHAST\BoolToken($m, $m);
        }, 'is_resource' => function () use($m) {
            return new HHAST\ResourceToken($m, $m);
        }, 'is_vec' => function () use($m) {
            return new HHAST\VectorTypeSpecifier(new HHAST\VecToken($m, $m), new HHAST\LessThanToken($m, $m), new HHAST\NameToken($m, $m, '_'), $m, new HHAST\GreaterThanToken($m, $m));
        }, 'is_keyset' => function () use($m) {
            return new HHAST\KeysetTypeSpecifier(new HHAST\KeysetToken($m, $m), new HHAST\LessThanToken($m, $m), new HHAST\NameToken($m, $m, '_'), $m, new HHAST\GreaterThanToken($m, $m));
        }, 'is_dict' => function () use($m) {
            return new HHAST\DictionaryTypeSpecifier(new HHAST\DictToken($m, $m), new HHAST\LessThanToken($m, $m), HHAST\EditableList::createMaybeEmptyList(array(new HHAST\ListItem(new HHAST\NameToken($m, $m, '_'), new HHAST\CommaToken($m, new HHAST\WhiteSpace(' '))), new HHAST\ListItem(new HHAST\NameToken($m, $m, '_'), $m))), new HHAST\GreaterThanToken($m, $m));
        });
        return $ast->rewrite(function ($node, $parents) use($name, $key, $make_replacement, $map, $replacement, $parent, $first, $last, $m) {
            if (!$node instanceof HHAST\FunctionCallExpression) {
                return $node;
            }
            $name = $node->getReceiver();
            if ($name instanceof HHAST\NameToken) {
                $key = $name->getText();
            } else {
                if ($name instanceof HHAST\QualifiedName) {
                    $key = Str\strip_prefix(\implode('\\', \array_map(function ($item) {
                        return ($item ? $item->getText() : null) ?? '';
                    }, $name->getParts()->getItems())), '\\');
                } else {
                    return $node;
                }
            }
            $make_replacement = $map[$key] ?? null;
            if ($make_replacement === null) {
                return $node;
            }
            $replacement = new HHAST\IsExpression($node->getArgumentListx()->getItems()[0], new HHAST\IsToken(new HHAST\WhiteSpace(' '), new HHAST\WhiteSpace(' ')), $make_replacement());
            $parent = C\lastx($parents);
            if ($parent instanceof HHAST\ListItem || $parent instanceof HHAST\IfStatement || $parent instanceof HHAST\ParenthesizedExpression) {
                $first = $replacement->getFirstTokenx();
                $last = $replacement->getLastTokenx();
                return $replacement->replace($first, $first->withLeading($node->getFirstTokenx()->getLeading()))->replace($last, $last->withTrailing($node->getLastTokenx()->getTrailing()));
            }
            return new HHAST\ParenthesizedExpression(new HHAST\LeftParenToken($node->getFirstTokenx()->getLeading(), $m), $replacement, new HHAST\RightParenToken($m, $node->getLastTokenx()->getTrailing()));
            return $node;
        });
    }
}

