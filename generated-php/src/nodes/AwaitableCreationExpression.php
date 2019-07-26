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

final class AwaitableCreationExpression extends AwaitableCreationExpressionGeneratedBase
{
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->hasCompoundStatement();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->getCompoundStatementUNTYPED();
    }
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getCompoundStatementx();
    }
    /**
     * @return null|CompoundStatement
     */
    public function getBody()
    {
        return $this->getCompoundStatement();
    }
}

