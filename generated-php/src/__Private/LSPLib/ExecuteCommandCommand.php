<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class ExecuteCommandCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'workspace/executeCommand';
}

