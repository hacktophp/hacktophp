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

interface ILoopStatement extends IControlFlowStatement
{
    /**
     * @return IStatement
     */
    public function getBody();
    /**
     * @return static
     */
    public function withBody(IStatement $body);
}

