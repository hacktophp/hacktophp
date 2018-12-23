<?php
namespace Facebook\HHAST\Migrations;

interface IMigrationWithFileList
{
    /**
     * @return array<string, string>
     */
    public function getFilePathsToMigrate();
}

