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

use function Facebook\HHAST\{find_node_at_position as find_node_at_position, Missing as Missing};
use Facebook\HHAST\__Private\TTypecheckerError as TTypecheckerError;
use Facebook\HHAST\{BackslashToken as BackslashToken, EditableList as EditableList, EditableNode as EditableNode};
use function Facebook\HHAST\__Private\execute_async as execute_async;
use Facebook\TypeAssert as TypeAssert;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
final class NamespaceFallbackMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @var array<int, int>
     */
    const ERROR_CODES = array(2049 => 2049, 4107 => 4107);
    /**
     * @return bool
     */
    protected static function filterTypecheckerError(TTypecheckerError $error)
    {
        return C\contains(self::ERROR_CODES, C\firstx($error['message'])['code']);
    }
    /**
     * @return EditableNode
     */
    public function migrateFile(string $path, EditableNode $root)
    {
        $nodes = \array_map(function ($error) use($root) {
            return find_node_at_position($root, $error['line'], $error['start']);
        }, Vec\unique_by(\array_map(function ($error) {
            return C\firstx($error['message']);
        }, $this->getTypecheckerErrorsForFile($path)), function ($error) {
            return $error['line'] . ':' . $error['start'];
        }));
        foreach ($nodes as $node) {
            $node = $node->getFirstTokenx();
            $name = $node->getText();
            if (!(\function_exists($name) || \defined($name) || self::isTypecheckerAware($name, $path))) {
                continue;
            }
            $root = $root->replace($node, EditableList::createNonEmptyListOrMissing(array(new BackslashToken($node->getLeading(), Missing()), $node->withLeading(Missing()))));
        }
        return $root;
    }
    /**
     * @return bool
     */
    private static function isTypecheckerAware(string $name, string $path)
    {
        $lines = execute_async('hh_client', '--search', '\\' . $name, '--json', $path)->wait();
        $json = \implode('
', $lines);
        $results = TypeAssert\matches_type_structure(type_structure(self::class, 'TSearchResult'), \json_decode($json, true, 512));
        return C\any($results, function ($result) use($name) {
            return $result['name'] === $name && ($result['desc'] === 'function' || $result['desc'] === 'constant');
        });
    }
}

