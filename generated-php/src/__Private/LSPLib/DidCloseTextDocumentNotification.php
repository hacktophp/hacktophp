<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class DidCloseTextDocumentNotification extends ClientNotification
{
    /**
     * @var string
     */
    const METHOD = 'textDocument/didClose';
}

