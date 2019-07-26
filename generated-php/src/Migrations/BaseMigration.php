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

use Facebook\HHAST\Node;
abstract class BaseMigration
{
    /**
     * @var string
     */
    private $root;
    public function __construct(string $root)
    {
        $this->root = $root;
    }
    /**
     * @return string
     */
    protected final function getRoot()
    {
        return $this->root;
    }
    /**
     * @return Node
     */
    public abstract function migrateFile(string $path, Node $ast);
}

