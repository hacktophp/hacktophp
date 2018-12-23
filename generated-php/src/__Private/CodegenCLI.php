<?php
namespace Facebook\HHAST\__Private;

use Facebook\TypeAssert as TypeAssert;
use Facebook\CLILib\CLIBase as CLIBase;
use Facebook\CLILib\CLIOptions as CLIOptions;
final class CodegenCLI extends CLIBase
{
    /**
     * @var null|string
     */
    private $hhvmPath = null;
    /**
     * @var bool
     */
    private $rebuildRelationships = false;
    /**
     * @return array<int, CLIOptions\CLIOption>
     */
    protected function getSupportedOptions()
    {
        return array(CLIOptions\with_required_string(function ($path) {
            return $this->hhvmPath = $path;
        }, 'Path to HHVM source tree', '--hhvm-path'), CLIOptions\flag(function () {
            return $this->rebuildRelationships = true;
        }, 'Update inferred relationships based on the HHVM and Hack tests; requires --hhvm-path', '--rebuild-relationships'));
    }
    /**
     * @return \Sabre\Event\Promise<int>
     */
    public function mainAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                $generators = array(CodegenEditableNodeFromJSON::class => CodegenEditableNodeFromJSON::class, CodegenEditableTokenFromData::class => CodegenEditableTokenFromData::class, CodegenEditableTriviaFromJSON::class => CodegenEditableTriviaFromJSON::class, CodegenTokens::class => CodegenTokens::class, CodegenTrivia::class => CodegenTrivia::class, CodegenSyntax::class => CodegenSyntax::class, CodegenVersion::class => CodegenVersion::class);
                $schema = $this->getSchema();
                $rebuild_relationships = $this->rebuildRelationships;
                if ($rebuild_relationships) {
                    $hhvm = $this->hhvmPath;
                    if ($hhvm === null) {
                        (yield $this->getStderr()->writeAsync('--hhvm-path is required when rebuilding relationships.
'));
                        return 1;
                    }
                    $relationships = array();
                    foreach ($generators as $generator) {
                        (new $generator($schema, $relationships))->generate();
                    }
                    (new CodegenRelations($hhvm, $schema))->generate();
                }
                $relationships = INFERRED_RELATIONSHIPS;
                foreach ($generators as $generator) {
                    (new $generator($schema, $relationships))->generate();
                }
                return 0;
            }
        );
    }
    /**
     * @return mixed
     */
    private function getSchema()
    {
        $json = \file_get_contents(\Facebook\AutoloadMap\Generated\root() . '/codegen/schema.json');
        $array = \json_decode($json, true);
        return TypeAssert\matches_type_structure(type_structure(self::class, 'TSchema'), $array);
    }
}

