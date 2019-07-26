<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

/**
 * @template T
 */
final class Ref
{
    /**
     * @var T
     */
    public $v;
    /**
     * @param T $v
     */
    public function __construct($v)
    {
        $this->v = $v;
    }
    /**
     * @return T
     */
    public function get()
    {
        return $this->v;
    }
    /**
     * @param T $v
     *
     * @return void
     */
    public function set($v)
    {
        $this->v = $v;
    }
}

