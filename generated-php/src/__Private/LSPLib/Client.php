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
abstract class Client
{
    /**
     * @return \Sabre\Event\Promise<void>
     */
    protected abstract function sendMessageAsync(LSP\Message $message);
    /**
     * @return \Sabre\Event\Promise<void>
     */
    public final function sendRequestMessageAsync(LSP\RequestMessage $message)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($message) : \Generator {
                (yield $this->sendMessageAsync($message));
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    public final function sendResponseMessageAsync(LSP\ResponseMessage $message)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($message) : \Generator {
                (yield $this->sendMessageAsync($message));
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    public final function sendNotificationMessageAsync(LSP\NotificationMessage $message)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($message) : \Generator {
                (yield $this->sendMessageAsync($message));
            }
        );
    }
}

