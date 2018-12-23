<?php
namespace Facebook\HHAST\__Private\LSPLib;

abstract class ClientNotification
{
    /**
     * @param mixed $in
     *
     * @return \Sabre\Event\Promise<void>
     */
    public abstract function executeAsync($in);
}

