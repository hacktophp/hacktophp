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

final class MethodishDeclaration extends MethodishDeclarationGeneratedBase
{
    use AttributeAsAttributeSpecTrait;
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->hasFunctionBody();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->getFunctionBodyUNTYPED();
    }
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getFunctionBodyx();
    }
    /**
     * @return null|CompoundStatement
     */
    public function getBody()
    {
        return $this->getFunctionBody();
    }
}

