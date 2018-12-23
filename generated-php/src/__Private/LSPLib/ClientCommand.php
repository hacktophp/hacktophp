<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
abstract class ClientCommand
{
    /**
     * @var \arraykey
     */
    private $id;
    /**
     * @var mixed
     */
    private $params;
    /**
     * @var mixed
     */
    public function __construct(\arraykey $id, $params);
    /**
     * @return LSP\RequestMessage
     */
    public final function asMessage()
    {
        $message = array('jsonrpc' => '2.0', 'id' => $this->id, 'method' => static::METHOD);
        $params = $this->params;
        if ($params !== null) {
            $message['params'] = $params;
        }
        return $message;
    }
}

