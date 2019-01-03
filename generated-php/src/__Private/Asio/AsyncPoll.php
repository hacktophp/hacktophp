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

/**
 * Asynchronous equivalent of mechanisms such as epoll(), poll() and select().
 *
 * Transforms a set of Awaitables to an asynchronous iterator that produces
 * results of these Awaitables as soon as they are ready. The order of results
 * is not guaranteed in any way. New Awaitables can be added to the AsyncPoll
 * while it is being iterated.
 */
/**
 * @template Tv
 */
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
        // Create condition node representing pending event.
        $this->lastAdded = $this->lastAdded->addNext();
        // Make sure the next pending condition is notified upon completion.
        $awaitable = $this->waitForThenNotifyAsync($awaitable);
        // Keep track of all pending events.
        $this->notifiers = AwaitAllWaitHandle::fromVec([$awaitable, $this->notifiers]);
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
        // Initialize new list of notifiers.
        $notifiers = [$this->notifiers];
        foreach ($awaitables as $awaitable) {
            // Create condition node representing pending event.
            $last_added = $last_added->addNext();
            // Make sure the next pending condition is notified upon completion.
            $notifiers[] = $this->waitForThenNotifyAsync($awaitable);
        }
        // Keep track of all pending events.
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
                    $this->lastNotified->succeed([null, $result]);
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
                    // End of iteration, no pending events to await.
                    $this->lastAdded = null;
                    $this->lastNotified = null;
                    return null;
                }
                return (yield $this->lastAwaited->waitAsync($this->notifiers));
            }
        );
    }
}

