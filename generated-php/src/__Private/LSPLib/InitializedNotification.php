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

/**
 * @template TState as ServerState
 */
class InitializedNotification extends ClientNotification
{
    /**
     * @var string
     */
    const METHOD = 'initialized';
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
     * @param mixed $_in
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function executeAsync($_in)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($_in) : \Generator {
                $this->state->setStatus(ServerStatus::INITIALIZED);
            }
        );
    }
}

