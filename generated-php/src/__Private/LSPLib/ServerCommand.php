<?php
namespace Facebook\HHAST\__Private\LSPLib;

abstract class ServerCommand
{
    /**
     * @param mixed $in
     *
     * @return \Sabre\Event\Promise<mixed>
     */
    public abstract function executeAsync($in);
    /**
     * @param mixed $in
     *
     * @return mixed
     */
    protected static final function success($in)
    {
        return new Success($in);
    }
    /**
     * @param mixed $code
     * @param mixed $data
     *
     * @return mixed
     */
    protected static final function error($code, string $message, $data)
    {
        return new Error($code, $message, $data);
    }
}

