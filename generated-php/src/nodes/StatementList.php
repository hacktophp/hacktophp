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

final class StatementList extends WrapperNode implements IStatement
{
    /**
     * @return mixed
     */
    public function getWrappedNode()
    {
        return $this->wrapped;
    }
}

