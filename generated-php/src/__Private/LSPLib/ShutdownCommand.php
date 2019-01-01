<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP;
class ShutdownCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'shutdown';
    /**
     * @var LSP\ServerCapabilities
     */
    const SERVER_CAPABILITIES = [];
    /**
     * @var TState
     */
    protected $state;
    /**
     * @var TState
     */
    public function __construct(TState $state)
    {
    }
    /**
     * @param mixed $_0
     *
     * @return \Sabre\Event\Promise<mixed>
     */
    public function executeAsync($_0)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, mixed> */
            function () use($_0) : \Generator {
                $this->state->setStatus(ServerStatus::SHUTTING_DOWN);
                return static::success(null);
            }
        );
    }
}

