<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class DidChangeWatchedFilesNotification extends ClientNotification
{
    /**
     * @var string
     */
    const METHOD = 'workspace/didChangeWatchedFiles';
}

