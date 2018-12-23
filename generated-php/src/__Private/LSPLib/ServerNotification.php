<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class ServerNotification
{
    /**
     * @var mixed
     */
    private $params;
    /**
     * @var mixed
     */
    public function __construct($params);
    /**
     * @return LSP\NotificationMessage
     */
    public function asMessage()
    {
        $message = array('jsonrpc' => '2.0', 'method' => static::METHOD);
        $params = $this->params;
        if ($params !== null) {
            $message['params'] = $params;
        }
        return $message;
    }
}

