<?php
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

