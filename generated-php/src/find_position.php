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

use HH\Lib\{C as C, Str as Str};
/**
 * @return array{0:int, 1:int}
 */
function find_position(EditableNode $root, EditableNode $node)
{
    $offset = find_offset_after_leading($root, $node);
    $lines = \explode('
', Str\slice($root->getCode(), 0, $offset));
    return array(\count($lines), \strlen(C\lastx($lines)));
}

