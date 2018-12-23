<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSP as LSP;
use HH\Lib\Math as Math;
/**
 * @param array{0:int, 1:int} $hhast_pos
 *
 * @return LSP\Position
 */
function position_to_lsp($hhast_pos)
{
    return array('line' => Math\maxva($hhast_pos[0] - 1, 0), 'character' => $hhast_pos[1]);
}

