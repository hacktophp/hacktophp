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

use HH\Lib\{Str, Vec};
/**
 * @return int
 */
function offset_from_position(EditableNode $root, int $line, int $column) : int
{
    if ($line === 1) {
        return $column - 1;
    }
    $lines = \explode("\n", $root->getCode());
    $to_skip = $line - 1;
    return \strlen(\implode("\n", Vec\take($lines, $to_skip))) + $column;
}

