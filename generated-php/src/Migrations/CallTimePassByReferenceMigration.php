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

use Facebook\HHAST\{AmpersandToken, NodeList, Node};
use HH\Lib\{C, Vec};
final class CallTimePassByReferenceMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @var int
     */
    const ERROR_CODE = 4168;
    /**
     * @param array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>} $error
     *
     * @return bool
     */
    protected static function filterTypecheckerError(array $error)
    {
        return C\firstx($error['message'])['code'] === self::ERROR_CODE;
    }
    /**
     * @return Node
     */
    public function migrateFile(string $path, Node $root)
    {
        $nodes = \array_map(function ($error) use($root) {
            return find_node_at_position($root, $error['line'], $error['start']);
        }, \array_map(function ($err) {
            return C\firstx($err['message']);
        }, $this->getTypecheckerErrorsForFile($path)));
        foreach ($nodes as $node) {
            $node = $node->getFirstTokenx();
            $root = $root->replace($node, NodeList::createNonEmptyListOrMissing([new AmpersandToken($node->getLeading(), Missing()), $node->withLeading(Missing())]));
        }
        return $root;
    }
}

