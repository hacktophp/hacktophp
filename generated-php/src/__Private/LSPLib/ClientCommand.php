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

use Facebook\HHAST\__Private\LSP;
abstract class ClientCommand
{
    /**
     * @var array-key
     */
    private $id;
    /**
     * @var mixed
     */
    private $params;
    /**
     * @param array-key $id
     * @param mixed $params
     */
    public function __construct($id, $params)
    {
        $this->id = $id;
        $this->params = $params;
    }
    /**
     * @return LSP\RequestMessage
     */
    public final function asMessage()
    {
        $message = ['jsonrpc' => '2.0', 'id' => $this->id, 'method' => static::METHOD];
        $params = $this->params;
        if ($params !== null) {
            $message['params'] = $params;
        }
        return $message;
    }
}

