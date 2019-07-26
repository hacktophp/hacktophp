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

use function Facebook\HHAST\{find_node_at_position, Missing};

use Facebook\HHAST\{BackslashToken, NodeList, EditableNode};
use function Facebook\HHAST\__Private\execute_async;
use Facebook\TypeAssert;
use HH\Lib\{C, Str, Vec};
final class NamespaceFallbackMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @var array<int, int>
     */
    const ERROR_CODES = [2049 => 2049, 4107 => 4107];
    /**
     * @param array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>} $error
     *
     * @return bool
     */
    protected static function filterTypecheckerError(array $error)
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
            $root = $root->replace($node, NodeList::createNonEmptyListOrMissing([new BackslashToken($node->getLeading(), Missing()), $node->withLeading(Missing())]));
        }
        return $root;
    }
    /**
     * @return bool
     */
    private static function isTypecheckerAware(string $name, string $path)
    {
        $lines = \Amp\Promise\wait(execute_async('hh_client', '--search', "\\" . $name, '--json', $path));
        $json = \implode("\n", $lines);
        $results = TypeAssert\matches_type_structure(type_structure(self::class, 'TSearchResult'), \json_decode(
            $json,
            /* assoc = */
            true,
            /* depth = */
            512
        ));
        return C\any($results, function ($result) use($name) {
            return $result['name'] === $name && ($result['desc'] === 'function' || $result['desc'] === 'constant');
        });
    }
}

