<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
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

