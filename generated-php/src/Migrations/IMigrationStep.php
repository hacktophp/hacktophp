<?php
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST\EditableNode as EditableNode;
interface IMigrationStep
{
    /**
     * @return string
     */
    public function getName();
    /**
     * @return EditableNode
     */
    public function rewrite(EditableNode $in);
}

