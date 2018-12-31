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

abstract class ClientNotification
{
    /**
     * @param mixed $in
     *
     * @return \Sabre\Event\Promise<void>
     */
    public abstract function executeAsync($in);
}

