<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LintRunLSPPublishDiagnosticsEventHandler;
use Facebook\HHAST\__Private\{LSP, LSPLib};
use HH\Lib\{C, Str, Vec};
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
    public function __construct(LSPLib\Client $client, ServerState $state)
    {
    }
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
                    return \array_filter(\array_map(function ($e) {
                        return $e['uri'];
                    }, $events), function ($uri) {
                        return Str\starts_with($uri, 'file://');
                    });
                };
                $to_purge = $changes_to_file_uris(\array_filter($p['changes'], function ($change) {
                    return $change['type'] === LSP\FileChangeType::DELETED;
                }));
                (yield Vec\map_async($to_purge, function ($uri) {
                    return (yield $this->client->sendNotificationMessageAsync((new LSPLib\PublishDiagnosticsNotification(['uri' => $uri, 'diagnostics' => []]))->asMessage()));
                }));
                $to_relint = $changes_to_file_uris(\array_filter($p['changes'], function ($change) {
                    return $change['type'] !== LSP\FileChangeType::DELETED;
                }));
                if ($this->state->lintMode === LintMode::OPEN_FILES) {
                    $to_relint = \array_filter($to_relint, function ($uri) {
                        return C\contains($this->state->openFiles, $uri);
                    });
                }
                (yield relint_uris_async(new LintRunLSPPublishDiagnosticsEventHandler($this->client, $this->state), $this->state->config, $to_relint));
            }
        );
    }
}

