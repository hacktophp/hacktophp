<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPLib;

final class Success extends SuccessOrError
{
    /**
     * @var TResult
     */
    private $result;
    /**
     * @var TResult
     */
    public function __construct(TResult $result)
    {
    }
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }
    /**
     * @return TResult
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * @return Error<TResult, TErrorCode, TErrorData>
     */
    public function getError()
    {
        invariant_violation('%s should not be called on %s', __METHOD__, __CLASS__);
    }
}

