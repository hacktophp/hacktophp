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
/**
 * @return array{0:int, 1:int}
 */
function position_from_lsp(LSP\Position $pos) : array
{
    return [$pos['line'] + 1, $pos['character']];
}

