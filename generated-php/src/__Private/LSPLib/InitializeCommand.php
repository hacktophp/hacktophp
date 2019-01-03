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
/**
 * @template TState as ServerState
 */
class InitializeCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'initialize';
    /**
     * @var LSP\ServerCapabilities
     */
    const SERVER_CAPABILITIES = [];
    /**
     * @var TState
     */
    protected $state;
    /**
     * @param TState $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }
    /**
     * @param mixed $p
     *
     * @return \Sabre\Event\Promise<mixed>
     */
    public function executeAsync($p)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, mixed> */
            function () use($p) : \Generator {
                $this->state->setStatus(ServerStatus::INITIALIZING)->setClientCapabilities($p['capabilities']);
                return static::success(['capabilities' => static::SERVER_CAPABILITIES]);
            }
        );
    }
}

