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
 * A wrapper around ConditionWaitHandle that allows notification events
 * to occur before the condition is awaited.
 */
class AsyncCondition
{
    /**
     * @var \Sabre\Event\Promise<T>|null
     */
    private $condition = null;
    /**
     * Notify the condition variable of success and set the result.
     */
    /**
     * @return void
     */
    public final function succeed(T $result)
    {
        if ($this->condition === null) {
            $this->condition = (function () use($result) {
                return $result;
            })();
        } else {
            invariant($this->condition instanceof ConditionWaitHandle, 'Unable to notify AsyncCondition twice');
            $this->condition->succeed($result);
        }
    }
    /**
     * Notify the condition variable of failure and set the exception.
     */
    /**
     * @return void
     */
    public final function fail(\Exception $exception)
    {
        if ($this->condition === null) {
            $this->condition = (function () use($exception) {
                throw $exception;
            })();
        } else {
            invariant($this->condition instanceof ConditionWaitHandle, 'Unable to notify AsyncCondition twice');
            $this->condition->fail($exception);
        }
    }
    /**
     * Asynchronously wait for the condition variable to be notified and
     * return the result or throw the exception received via notification.
     *
     * The caller must provide an Awaitable $notifiers that must not finish
     * before the notification is received. This means $notifiers must represent
     * work that is guaranteed to eventually trigger the notification. As long
     * as the notification is issued only once, asynchronous execution unrelated
     * to $notifiers is allowed to trigger the notification.
     */
    /**
     * @param \Sabre\Event\Promise<void> $notifiers
     *
     * @return \Sabre\Event\Promise<T>
     */
    public final function waitAsync(\Sabre\Event\Promise $notifiers)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, T> */
            function () use($notifiers) : \Generator {
                if ($this->condition === null) {
                    $this->condition = ConditionWaitHandle::create($notifiers);
                }
                return (yield $this->condition);
            }
        );
    }
}

