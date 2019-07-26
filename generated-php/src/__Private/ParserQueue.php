<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use HH\Lib\Experimental\Async;
final class ParserQueue
{
    /**
     * @var Async\Semaphore<array<int, string>, array<int, string>>
     */
    private $impl;
    protected function __construct()
    {
        $this->impl = new Async\Semaphore(self::LIMIT, function (array $args) {
            return (yield execute_async('hh_parse', ...$args));
        });
    }
    /**
     * @var int
     */
    const LIMIT = 32;
    /**
     * @return ParserQueue
     */
    public static function get()
    {
        return new ParserQueue();
    }
    /**
     * @param array<int, string> $args
     *
     * @return \Amp\Promise<array<int, string>>
     */
    public function waitForAsync(array $args)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, array<int, string>> */
            function () use($args) : \Generator {
                return (yield $this->impl->waitForAsync($args));
            }
        );
    }
}