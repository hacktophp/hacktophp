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

abstract class SuccessOrError
{
    /**
     * @return bool
     */
    public abstract function isSuccess();
    /**
     * @return bool
     */
    public final function isError()
    {
        return !$this->isSuccess();
    }
    /**
     * @return TSuccess
     */
    public abstract function getResult();
    /**
     * @return Error<TSuccess, TErrorCode, TErrorData>
     */
    public abstract function getError();
}

