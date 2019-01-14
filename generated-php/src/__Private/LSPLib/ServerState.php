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
use HH\Lib\C;
class ServerState
{
    /**
     * @var ServerStatus::PRE_INIT|ServerStatus::INITIALIZING|ServerStatus::INITIALIZED|ServerStatus::SHUTTING_DOWN|ServerStatus::EXITING
     */
    private $status = ServerStatus::PRE_INIT;
    /**
     * @var null|LSP\ClientCapabilities
     */
    private $clientCapabilities = null;
    /**
     * @return ServerStatus::PRE_INIT|ServerStatus::INITIALIZING|ServerStatus::INITIALIZED|ServerStatus::SHUTTING_DOWN|ServerStatus::EXITING
     */
    public final function getStatus()
    {
        return $this->status;
    }
    /**
     * @param ServerStatus::PRE_INIT|ServerStatus::INITIALIZING|ServerStatus::INITIALIZED|ServerStatus::SHUTTING_DOWN|ServerStatus::EXITING $new
     *
     * @return static
     */
    public final function setStatus($new)
    {
        $this->status = $new;
        return $this;
    }
    /**
     * @return static
     */
    public final function setClientCapabilities(LSP\ClientCapabilities $caps)
    {
        invariant($this->clientCapabilities === null, "Shouldn't set client capabilities more than once");
        $this->clientCapabilities = $caps;
        return $this;
    }
    /**
     * @return null|LSP\ClientCapabilities
     */
    public final function getClientCapabilities()
    {
        return $this->clientCapabilities;
    }
    /**
     * @return \Amp\Promise<void>
     */
    public final function waitForInitAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () : \Generator {
                $pre_init = [ServerStatus::PRE_INIT => ServerStatus::PRE_INIT, ServerStatus::INITIALIZING => ServerStatus::INITIALIZING];
                while (C\contains_key($pre_init, $this->getStatus())) {
                    /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                    (yield \HH\Asio\usleep(100 * 1000));
                }
            }
        );
    }
}

