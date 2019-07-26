<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\Wrap;

use Facebook\HHAST\{ITypeSpecifier, Node, SimpleTypeSpecifier, __Private\IWrappableWithSimpleTypeSpecifier};
function wrap_ITypeSpecifier(Node $node) : ITypeSpecifier
{
    if ($node instanceof ITypeSpecifier) {
        return $node;
    }
    if ($node instanceof IWrappableWithSimpleTypeSpecifier) {
        return new SimpleTypeSpecifier($node);
    }
    invariant_violation('ITypeSpecifier expected, got: %s', \get_class($node));
}

