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

/**
 * @return EditableNode
 */
function find_node_at_offset(EditableNode $root, int $offset)
{
    invariant($offset < $root->getWidth(), "Offset is out of bounds");
    if ($offset === 0) {
        return $root;
    }
    if ($offset === ($root->getFirstToken() ? $root->getFirstToken()->getLeading() : null ? ($root->getFirstToken() ? $root->getFirstToken()->getLeading() : null)->getWidth() : null)) {
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

