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

use Facebook\HHAST\__Private\LSPLib;
use HH\Lib\Str;
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
                $uri = $p['textDocument']['uri'];
                if (!Str\starts_with($uri, 'file://')) {
                    return;
                }
                unset($this->state->openFiles[$uri]);
                if ($this->state->lintMode !== LintMode::OPEN_FILES) {
                    return;
                }
                (yield $this->client->sendNotificationMessageAsync((new LSPLib\PublishDiagnosticsNotification(['uri' => $uri, 'diagnostics' => []]))->asMessage()));
            }
        );
    }
}

