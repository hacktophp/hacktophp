<?php
/*
 *  Copyright (c) 2015-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\Asio;

final class AsyncPoll implements AsyncIterator
{
    /**
     * @return static
     */
    public static function create()
    {
        return new self();
    }
    /**
     * @param iterable<mixed, \Sabre\Event\Promise<Tv>> $awaitables
     *
     * @return static
     */
    public static function from(iterable $awaitables)
    {
        $poll = new self();
        $poll->addMulti($awaitables);
        return $poll;
    }
    /**
     * @var AsyncConditionNode<array{0:mixed, 1:Tv}>|null
     */
    private $lastAdded;
    /**
     * @var AsyncConditionNode<array{0:mixed, 1:Tv}>|null
     */
    private $lastNotified;
    /**
     * @var AsyncConditionNode<array{0:mixed, 1:Tv}>|null
     */
    private $lastAwaited;
    /**
     * @var \Sabre\Event\Promise<void>
     */
    private $notifiers;
    private function __construct()
    {
        $head = new AsyncConditionNode();
        $this->lastAdded = $head;
        $this->lastNotified = $head;
        $this->lastAwaited = $head;
        $this->notifiers = (function () {
        })();
    }
    /**
     * @param \Sabre\Event\Promise<Tv> $awaitable
     *
     * @return void
     */
    public function add(\Sabre\Event\Promise $awaitable)
    {
        invariant($this->lastAdded !== null, 'Unable to add item, iteration already finished');
        $this->lastAdded = $this->lastAdded->addNext();
        $awaitable = $this->waitForThenNotifyAsync($awaitable);
        $this->notifiers = AwaitAllWaitHandle::fromVec(array($awaitable, $this->notifiers));
    }
    /**
     * @param iterable<mixed, \Sabre\Event\Promise<Tv>> $awaitables
     *
     * @return void
     */
    public function addMulti(iterable $awaitables)
    {
        invariant($this->lastAdded !== null, 'Unable to add item, iteration already finished');
        $last_added = $this->lastAdded;
        $notifiers = array($this->notifiers);
        foreach ($awaitables as $awaitable) {
            $last_added = $last_added->addNext();
            $notifiers[] = $this->waitForThenNotifyAsync($awaitable);
        }
        $this->lastAdded = $last_added;
        $this->notifiers = AwaitAllWaitHandle::fromVec($notifiers);
    }
    /**
     * @param \Sabre\Event\Promise<Tv> $awaitable
     *
     * @return \Sabre\Event\Promise<void>
     */
    private function waitForThenNotifyAsync(\Sabre\Event\Promise $awaitable)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($awaitable) : \Generator {
                try {
                    $result = (yield $awaitable);
                    invariant($this->lastNotified !== null, 'unexpected null');
                    $this->lastNotified = $this->lastNotified->getNext();
                    invariant($this->lastNotified !== null, 'unexpected null');
                    $this->lastNotified->succeed(array(null, $result));
                } catch (\Exception $exception) {
                    invariant($this->lastNotified !== null, 'unexpected null');
                    $this->lastNotified = $this->lastNotified->getNext();
                    invariant($this->lastNotified !== null, 'unexpected null');
                    $this->lastNotified->fail($exception);
                }
            }
        );
    }
    /* HHAST_IGNORE_ERROR[AsyncFunctionAndMethod] required by builtin interface */
    /**
     * @return \Sabre\Event\Promise<array{0:mixed, 1:Tv}|null>
     */
    public function next()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, array{0:mixed, 1:Tv}|null> */
            function () : \Generator {
                invariant($this->lastAwaited !== null, 'Unable to iterate, iteration already finished');
                $this->lastAwaited = $this->lastAwaited->getNext();
                if ($this->lastAwaited === null) {
                    $this->lastAdded = null;
                    $this->lastNotified = null;
                    return null;
                }
                return (yield $this->lastAwaited->waitAsync($this->notifiers));
            }
        );
    }
}

