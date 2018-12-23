<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
final class PublishDiagnosticsNotification extends ServerNotification
{
    /**
     * @var string
     */
    const METHOD = 'textDocument/publishDiagnostics';
}

