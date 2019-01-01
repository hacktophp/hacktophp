<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSP;
use HH\Lib\Math;
/**
 * @param array{0:int, 1:int} $hhast_pos
 */
function position_to_lsp($hhast_pos) : LSP\Position
{
    return ['line' => Math\maxva($hhast_pos[0] - 1, 0), 'character' => $hhast_pos[1]];
}

