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

class AsyncQueue
{
    /**
     * @var \Sabre\Event\Promise<mixed>|null
     */
    private $queue;
    /**
     * @psalm-template T
     *
     * @param \Closure():\Sabre\Event\Promise<T> $item
     *
     * @return \Sabre\Event\Promise<T>
     */
    public function enqueueAndWaitForAsync(\Closure $item)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, T> */
            function () use($item) : \Generator {
                $prev = $this->queue;
                $next = (function () use($prev, $item) {
                    (yield $prev);
                    return (yield $item());
                })();
                $this->queue = $next;
                return (yield $next);
            }
        );
    }
}

