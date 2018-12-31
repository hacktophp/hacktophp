<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

use Facebook\HHAST\EditableNode;
use HH\Lib\{C, Str, Vec};
use Facebook\HHAST\__Private\Resolution;
/**
 * @param array<int, EditableNode> $parents
 *
 * @return null|string
 */
function resolve_type(string $type, EditableNode $node, array $parents)
{
    if (Str\starts_with($type, '\\')) {
        return Str\strip_prefix($type, '\\');
    }
    invariant(!Str\contains($type, '<'), 'Call on the class name without generics');
    $ns = Resolution\get_current_namespace($node, $parents);
    $uses = Resolution\get_current_uses($node, $parents);
    if (Str\contains($type, '\\')) {
        $maybe_aliased = C\firstx(\explode("\\", $type));
        if (C\contains_key($uses['namespaces'], $maybe_aliased)) {
            return $uses['namespaces'][$maybe_aliased] . '\\' . \implode('\\', Vec\drop(\explode('\\', $type), 1));
        }
        if ($ns !== null) {
            return $ns . '\\' . $type;
        }
        return $type;
    }
    if (C\contains_key($uses['types'], $type)) {
        return $uses['types'][$type];
    }
    if ($ns !== null) {
        return $ns . '\\' . $type;
    }
    return $type;
}

