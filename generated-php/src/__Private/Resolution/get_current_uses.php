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

use Facebook\HHAST\{Node, NamespaceBody, Script};
use Facebook\TypeAssert;
use HH\Lib\{C, Dict, Vec};
/**
 * @param array<int, Node> $parents
 *
 * @return array{namespaces:array<string, string>, types:array<string, string>}
 */
function get_current_uses(Node $_node, array $parents) : array
{
    $root = $parents[0];
    invariant($root instanceof Script, 'Expected first parent to be a Script, got %s', \get_class($root));
    $uses = get_uses_directly_in_scope($root->getDeclarations());
    $namespace = C\first(\array_filter($parents, function ($parent) {
        return $parent instanceof NamespaceBody;
    }));
    if ($namespace) {
        $namespace = TypeAssert\instance_of(NamespaceBody::class, $namespace);
        $inner_uses = get_uses_directly_in_scope($namespace->getDeclarationsx());
        $uses['namespaces'] = Dict\merge($uses['namespaces'], $inner_uses['namespaces']);
        $uses['types'] = Dict\merge($uses['types'], $inner_uses['types']);
    }
    return $uses;
}

