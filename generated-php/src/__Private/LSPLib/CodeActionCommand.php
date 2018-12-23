<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class CodeActionCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'textDocument/codeAction';
}

