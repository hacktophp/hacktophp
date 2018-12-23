<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSP as LSP;
/**
 * @return array{0:int, 1:int}
 */
function position_from_lsp(LSP\Position $pos)
{
    return array($pos['line'] + 1, $pos['character']);
}

