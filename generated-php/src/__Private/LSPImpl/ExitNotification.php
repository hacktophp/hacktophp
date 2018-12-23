<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\CLILib\ExitException as ExitException;
use Facebook\HHAST\__Private\LSPLib as LSPLib;
final class ExitNotification extends LSPLib\ExitNotification
{
    /**
     * @return \Sabre\Event\Promise<void>
     */
    protected function exitImplAsync(int $code, string $message)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($code, $message) : \Generator {
                throw new ExitException($code, $message);
            }
        );
    }
}

