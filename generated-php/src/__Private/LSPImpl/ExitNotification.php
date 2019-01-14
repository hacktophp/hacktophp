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

use Facebook\CLILib\ExitException;
use Facebook\HHAST\__Private\LSPLib;
/**
 * @template-extends LSPLib\ExitNotification<LSPLib\ServerState>
 */
final class ExitNotification extends LSPLib\ExitNotification
{
    /**
     * @return \Amp\Promise<void>
     */
    protected function exitImplAsync(int $code, string $message)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($code, $message) : \Generator {
                throw new ExitException($code, $message);
            }
        );
    }
}

