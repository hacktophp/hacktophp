<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

interface IHasTypeHint
{
    /**
     * @return bool
     */
    public function hasType();
    /**
     * @return null|ITypeSpecifier
     */
    public function getType();
    /**
     * @return ITypeSpecifier
     */
    public function getTypex();
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED();
}

