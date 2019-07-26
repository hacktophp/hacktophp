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

final class AlternateLoopStatement extends AlternateLoopStatementGeneratedBase
{
    /**
     * @return Node
     */
    public function getBody()
    {
        return $this->getStatements();
    }
    /**
     * @return static
     */
    public function withBody(Node $body)
    {
        return $this->withStatements($body);
    }
}

