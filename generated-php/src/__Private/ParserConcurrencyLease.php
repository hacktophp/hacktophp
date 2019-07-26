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

use HH\Lib\Tuple;
final class ParserConcurrencyLease
{
    /**
     * @var int
     */
    const LIMIT = 16;
    /**
     * @var int
     */
    private static $active = 0;
    private function __construct()
    {
        self::$active++;
    }
    /**
     * @return \Amp\Promise<ParserConcurrencyLease>
     */
    public static function getAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, ParserConcurrencyLease> */
            function () : \Generator {
                while (self::$active >= self::LIMIT) {
                    /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                    (yield Tuple\from_async(\HH\Asio\usleep(100000), \HH\Asio\later()));
                }
                return new self();
            }
        );
    }
    /**
     * @return void
     */
    public function __dispose()
    {
        self::$active--;
    }
}

