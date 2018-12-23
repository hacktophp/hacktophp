<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST\EditableNode as EditableNode;
final class TypedMigrationStep implements IMigrationStep
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Tin::class
     */
    private $tin;
    /**
     * @var \Closure(Tin):Tout
     */
    private $rewriter;
    /**
     * @var \Closure(Tin):Tout
     */
    public function __construct(string $name, string $tin, string $_tout, \Closure $rewriter);
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return EditableNode
     */
    public function rewrite(EditableNode $node)
    {
        if (!$node instanceof $this->tin) {
            return $node;
        }
        $rewriter = $this->rewriter;
        return $rewriter($node);
    }
}

