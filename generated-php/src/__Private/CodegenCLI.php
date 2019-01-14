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

use Facebook\TypeAssert;
use Facebook\CLILib\CLIBase;
use Facebook\CLILib\CLIOptions;
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
        return [CLIOptions\with_required_string(function ($path) {
            $this->hhvmPath = $path;
        }, 'Path to HHVM source tree', '--hhvm-path'), CLIOptions\flag(function () {
            $this->rebuildRelationships = true;
        }, 'Update inferred relationships based on the HHVM and Hack tests; requires --hhvm-path', '--rebuild-relationships')];
    }
    /**
     * @return \Amp\Promise<int>
     */
    public function mainAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                $generators = [CodegenEditableNodeFromJSON::class => CodegenEditableNodeFromJSON::class, CodegenEditableTokenFromData::class => CodegenEditableTokenFromData::class, CodegenEditableTriviaFromJSON::class => CodegenEditableTriviaFromJSON::class, CodegenTokens::class => CodegenTokens::class, CodegenTrivia::class => CodegenTrivia::class, CodegenSyntax::class => CodegenSyntax::class, CodegenVersion::class => CodegenVersion::class];
                $schema = $this->getSchema();
                $rebuild_relationships = $this->rebuildRelationships;
                if ($rebuild_relationships) {
                    $hhvm = $this->hhvmPath;
                    if ($hhvm === null) {
                        (yield $this->getStderr()->writeAsync("--hhvm-path is required when rebuilding relationships.\n"));
                        return 1;
                    }
                    $relationships = [];
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

