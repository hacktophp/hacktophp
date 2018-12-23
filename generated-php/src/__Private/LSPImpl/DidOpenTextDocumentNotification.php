<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LintRunLSPPublishDiagnosticsEventHandler as LintRunLSPPublishDiagnosticsEventHandler;
use Facebook\HHAST\__Private\LSPLib as LSPLib;
use HH\Lib\Str as Str;
final class DidOpenTextDocumentNotification extends LSPLib\DidOpenTextDocumentNotification
{
    /**
     * @var LSPLib\Client
     */
    private $client;
    /**
     * @var ServerState
     */
    private $state;
    /**
     * @var ServerState
     */
    public function __construct(LSPLib\Client $client, ServerState $state);
    /**
     * @param mixed $p
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function executeAsync($p)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($p) : \Generator {
                $uri = $p['textDocument']['uri'];
                if (!Str\starts_with($uri, 'file://')) {
                    return;
                }
                if (!($this->state->ignoreFilenameExtensions || Str\ends_with($uri, '.php') || Str\ends_with($uri, '.hh'))) {
                    return;
                }
                $this->state->openFiles[] = $uri;
                (yield relint_uri_async(new LintRunLSPPublishDiagnosticsEventHandler($this->client, $this->state), $this->state->config, $uri));
            }
        );
    }
}

