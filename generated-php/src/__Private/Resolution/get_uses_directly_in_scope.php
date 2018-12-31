<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\Resolution;

use Facebook\HHAST\{EditableNode, NamespaceGroupUseDeclaration, NamespaceToken, NamespaceUseClause, NamespaceUseDeclaration, TypeToken};
use HH\Lib\{C, Str};
/**
 * @return array{namespaces:array<string, string>, types:array<string, string>}
 */
function get_uses_directly_in_scope(EditableNode $scope)
{
    $uses = [];
    // use [kind] Foo, [kind] Bar;
    $statements = $scope->getChildrenOfType(NamespaceUseDeclaration::class);
    foreach ($statements as $statement) {
        $kind = $statement->getKind();
        $clauses = $statement->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
        foreach ($clauses as $clause) {
            $uses[] = [$clause->hasClauseKind() ? $clause->getClauseKind() : $kind, Str\trim($clause->getNameUNTYPED()->getCode()), $clause->getAlias()];
        }
    }
    // use [kind] Foo\{Bar, [kind] Baz}
    $statements = $scope->getChildrenOfType(NamespaceGroupUseDeclaration::class);
    foreach ($statements as $statement) {
        $kind = $statement->getKind();
        $prefix = Str\strip_prefix(Str\trim($statement->getPrefix()->getCode()), '\\');
        $clauses = $statement->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
        foreach ($clauses as $clause) {
            $uses[] = [$clause->hasClauseKind() ? $clause->getClauseKind() : $kind, $prefix . Str\trim($clause->getNameUNTYPED()->getCode()), $clause->getAlias()];
        }
    }
    $namespaces = [];
    $types = [];
    foreach ($uses as $use) {
        list($kind, $name, $alias) = $use;
        $alias = Str\strip_prefix(Str\trim($alias === null ? C\lastx(\explode('\\', $name)) : $alias->getCode()), '\\');
        if ($kind === null) {
            $namespaces[$alias] = $name;
            $types[$alias] = $name;
        } else {
            if ($kind instanceof NamespaceToken) {
                $namespaces[$alias] = $name;
            } else {
                if ($kind instanceof TypeToken) {
                    $types[$alias] = $name;
                }
            }
        }
    }
    return ['namespaces' => $namespaces, 'types' => $types];
}

