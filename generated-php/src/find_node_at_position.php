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
function find_node_at_position(EditableNode $root, int $line, int $char)
{
    return find_node_at_offset($root, offset_from_position($root, $line, $char));
}
