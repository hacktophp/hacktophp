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

/**
 * @template TResult
 * @template TErrorCode as int
 * @template TErrorData
 */
final class Success extends SuccessOrError
{
    /**
     * @var TResult
     */
    private $result;
    /**
     * @param TResult $result
     */
    public function __construct($result)
    {
        $this->result = $result;
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

