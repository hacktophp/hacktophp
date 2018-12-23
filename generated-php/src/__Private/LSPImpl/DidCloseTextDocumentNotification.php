<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSPLib as LSPLib;
use HH\Lib\Str as Str;
final class DidCloseTextDocumentNotification extends LSPLib\DidCloseTextDocumentNotification
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
                unset($this->state->openFiles[$uri]);
                if ($this->state->lintMode !== LintMode::OPEN_FILES) {
                    return;
                }
                (yield $this->client->sendNotificationMessageAsync((new LSPLib\PublishDiagnosticsNotification(array('uri' => $uri, 'diagnostics' => array())))->asMessage()));
            }
        );
    }
}

