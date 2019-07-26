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

trait AttributeAsAttributeSpecTrait
{
    /**
     * @return bool
     */
    public abstract function hasAttribute();
    /**
     * @return null|OldAttributeSpecification
     */
    public abstract function getAttribute();
    /**
     * @return OldAttributeSpecification
     */
    public abstract function getAttributex();
    /**
     * @return null|Node
     */
    public abstract function getAttributeUNTYPED();
    /**
     * @return bool
     */
    public final function hasAttributeSpec()
    {
        return $this->hasAttribute();
    }
    /**
     * @return null|OldAttributeSpecification
     */
    public final function getAttributeSpec()
    {
        return $this->getAttribute();
    }
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return $this->getAttributex();
    }
    /**
     * @return null|Node
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->getAttributeUNTYPED();
    }
}

