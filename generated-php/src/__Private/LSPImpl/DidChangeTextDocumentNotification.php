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
use HH\Lib\{C, Str};
use Facebook\HHAST\__Private\LintRunLSPPublishDiagnosticsEventHandler;
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
    public function __construct(LSPLib\Client $client, ServerState $state)
    {
        $this->client = $client;
        $this->state = $state;
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

