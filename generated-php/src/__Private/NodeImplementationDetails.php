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

use Facebook\HHAST\Node;
abstract final class NodeImplementationDetails extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'hhast_nonimplementable';
    /**
     * @return array{file:string, source:string, offset:int, width:int}|null
     */
    public static function getSourceRef(Node $node)
    {
        return $node->sourceRef;
    }
}

