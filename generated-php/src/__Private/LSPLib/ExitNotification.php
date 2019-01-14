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
abstract class ExitNotification extends ClientNotification
{
    /**
     * @var string
     */
    const METHOD = 'exit';
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
     * @return \Amp\Promise<void>
     */
    protected abstract function exitImplAsync(int $code, string $message);
    /**
     * @param mixed $_0
     *
     * @return \Amp\Promise<void>
     */
    public final function executeAsync($_0)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($_0) : \Generator {
                $old_status = $this->state->getStatus();
                $this->state->setStatus(ServerStatus::EXITING);
                if ($old_status === ServerStatus::SHUTTING_DOWN) {
                    (yield $this->exitImplAsync(0, "Requested by client"));
                    return;
                }
                (yield $this->exitImplAsync(1, "Exit requested by client when not already shutting down"));
            }
        );
    }
}

