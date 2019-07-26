<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

interface IHasOperator
{
    /**
     * @return bool
     */
    public function hasOperator();
    /**
     * @return null|Token
     */
    public function getOperator();
    /**
     * @return Token
     */
    public function getOperatorx();
    /**
     * @return null|Node
     */
    public function getOperatorUNTYPED();
}

