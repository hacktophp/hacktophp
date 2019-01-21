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

function find_node_at_offset(EditableNode $root, int $offset) : EditableNode
{
    invariant($offset < $root->getWidth(), "Offset is out of bounds");
    if ($offset === 0) {
        return $root;
    }
    if ($offset === (($__tmp2__ = ($__tmp1__ = $root->getFirstToken()) !== null ? $__tmp1__->getLeading() : null) !== null ? $__tmp2__->getWidth() : null)) {
        return $root;
    }
    foreach ($root->getChildren() as $child) {
        if ($child->getWidth() > $offset) {
            return find_node_at_offset($child, $offset);
        }
        $offset -= $child->getWidth();
    }
    return $root;
}

