<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LintRunLSPPublishDiagnosticsEventHandler as LintRunLSPPublishDiagnosticsEventHandler;
use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
use HH\Lib\{C as C, Str as Str, Vec as Vec};
final class DidChangeWatchedFilesNotification extends LSPLib\DidChangeWatchedFilesNotification
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
                $changes_to_file_uris = function (array $events) {
                    return Vec\filter(\array_map(function ($e) {
                        return $e['uri'];
                    }, $events), function ($uri) {
                        return Str\starts_with($uri, 'file://');
                    });
                };
                $to_purge = $changes_to_file_uris(Vec\filter($p['changes'], function ($change) {
                    return $change['type'] === LSP\FileChangeType::DELETED;
                }));
                (yield Vec\map_async($to_purge, function ($uri) {
                    return (yield $this->client->sendNotificationMessageAsync((new LSPLib\PublishDiagnosticsNotification(array('uri' => $uri, 'diagnostics' => array())))->asMessage()));
                }));
                $to_relint = $changes_to_file_uris(Vec\filter($p['changes'], function ($change) {
                    return $change['type'] !== LSP\FileChangeType::DELETED;
                }));
                if ($this->state->lintMode === LintMode::OPEN_FILES) {
                    $to_relint = Vec\filter($to_relint, function ($uri) {
                        return C\contains($this->state->openFiles, $uri);
                    });
                }
                (yield relint_uris_async(new LintRunLSPPublishDiagnosticsEventHandler($this->client, $this->state), $this->state->config, $to_relint));
            }
        );
    }
}

