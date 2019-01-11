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
 * A linked list node storing AsyncCondition and pointer to the next node.
 */
/**
 * @template T
 *
 * @template-extends AsyncCondition<T>
 */
final class AsyncConditionNode extends AsyncCondition
{
    /**
     * @var AsyncConditionNode<\T>|null
     */
    private $next = null;
    /**
     * @return AsyncConditionNode<T>
     */
    public function addNext()
    {
        invariant($this->next === null, 'The next node already exists');
        return $this->next = new AsyncConditionNode();
    }
    /**
     * @return AsyncConditionNode<T>|null
     */
    public function getNext()
    {
        return $this->next;
    }
}

