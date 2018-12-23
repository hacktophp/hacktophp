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
abstract class StepBasedMigration extends BaseMigration
{
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public abstract function getSteps();
    /**
     * @return EditableNode
     */
    public final function migrateFile(string $_path, EditableNode $ast)
    {
        foreach ($this->getSteps() as $step) {
            $ast = $ast->rewrite(function ($node, $_) use($step) {
                return $step->rewrite($node);
            });
        }
        return $ast;
    }
}

