<?php
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST\EditableNode as EditableNode;
abstract class StepBasedMigration extends BaseMigration
{
    /**
     * @return Traversable<IMigrationStep>
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

