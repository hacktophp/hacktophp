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

use Facebook\HHAST\__Private\{LSP, LSPLib};
use Facebook\CLILib\ITerminal;
use HH\Lib\Str;
final class Client extends LSPLib\Client
{
    /**
     * @var \Amp\Promise<void>|null
     */
    private $pendingStdout;
    /**
     * @var ITerminal
     */
    private $terminal;
    public function __construct(ITerminal $terminal)
    {
        $this->terminal = $terminal;
    }
    /**
     * @return \Amp\Promise<void>
     */
    protected function sendMessageAsync(LSP\Message $message)
    {
        $json = \json_encode($message, \JSON_UNESCAPED_SLASHES);
        $tail = $this->pendingStdout;
        $next = (function () use($tail, $json, $this) {
            (yield $tail);
            (yield $this->terminal->getStdout()->writeAsync(Str\format("Content-Length: %d\r\n\r\n%s", \strlen($json), $json)));
        })();
        $this->pendingStdout = $next;
        return $next;
    }
}

