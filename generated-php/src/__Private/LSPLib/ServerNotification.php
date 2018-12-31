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
abstract class ServerNotification
{
    /**
     * @var mixed
     */
    private $params;
    /**
     * @var mixed
     */
    public function __construct($params)
    {
    }
    /**
     * @return LSP\NotificationMessage
     */
    public function asMessage()
    {
        $message = ['jsonrpc' => '2.0', 'method' => static::METHOD];
        $params = $this->params;
        if ($params !== null) {
            $message['params'] = $params;
        }
        return $message;
    }
}

