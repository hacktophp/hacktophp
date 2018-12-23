<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSPLib as LSPLib;
use HH\Lib\{C as C, Str as Str};
use Facebook\HHAST\__Private\LintRunLSPPublishDiagnosticsEventHandler as LintRunLSPPublishDiagnosticsEventHandler;
final class DidChangeTextDocumentNotification extends LSPLib\DidChangeTextDocumentNotification
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
                if ($this->state->lintAsYouType === false) {
                    return;
                }
                $uri = $p['textDocument']['uri'];
                if (!Str\starts_with($uri, 'file://')) {
                    return;
                }
                $change = C\onlyx($p['contentChanges'], 'whole document sync only');
                invariant(!Shapes::keyExists($change, 'range'), 'whole document sync only');
                try {
                    (yield relint_uri_async(new LintRunLSPPublishDiagnosticsEventHandler($this->client, $this->state), $this->state->config, $uri, $change['text']));
                } catch (\Throwable $_) {
                }
            }
        );
    }
}

