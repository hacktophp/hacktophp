<?php
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
     * @return Error<TSuccessFacebook\HHAST\__Private\LSPLib\TErrorCodeFacebook\HHAST\__Private\LSPLib\TErrorData>
     */
    public abstract function getError();
}

