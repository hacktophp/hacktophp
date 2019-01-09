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

use function Facebook\HHAST\find_node_at_position;

use Facebook\HHAST\{EditableList, EditableNode, FixMe, Missing, WhiteSpace};
use HH\Lib\{C, Dict, Keyset, Str, Vec};
final class AddFixMesMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @param array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>} $_0
     *
     * @return bool
     */
    protected static function filterTypecheckerError(array $_0)
    {
        return true;
    }
    /**
     * @return EditableNode
     */
    public function migrateFile(string $path, EditableNode $root)
    {
        $errors_by_position = Dict\group_by(\array_map(function ($error) {
            return C\firstx($error['message']);
        }, $this->getTypecheckerErrorsForFile($path)), function ($error) {
            return ($error['line'] << 32) + $error['start'];
        });
        $previous_error_line = -1;
        $column_offset = 0;
        foreach ($errors_by_position as $position => $errors) {
            $fixmes = Vec\flatten(\array_map(function ($code) {
                return [new FixMe(Str\format('/* HH_FIXME[%d] */', $code)), new WhiteSpace(' ')];
            }, Keyset\map($errors, function ($error) {
                return $error['code'];
            })));
            $line = $position >> 32;
            $column = $position - ($line << 32);
            if ($line === $previous_error_line) {
                $column += $column_offset;
            } else {
                $previous_error_line = $line;
                $column_offest = 0;
            }
            $node = find_node_at_position($root, $line, $column)->getFirstTokenx();
            $leading = $node->getLeading();
            if ($leading instanceof Missing) {
                $new_leading = EditableList::createNonEmptyListOrMissing($fixmes);
            } else {
                if ($leading instanceof EditableList) {
                    $new_leading = EditableList::createNonEmptyListOrMissing(\array_merge($fixmes, $leading->getChildren()));
                } else {
                    $new_leading = EditableList::createNonEmptyListOrMissing(\array_merge($fixmes, [$leading]));
                }
            }
            $column_offset += \strlen($new_leading->getCode()) - \strlen($leading->getCode());
            $root = $root->replace($node, $node->withLeading($new_leading));
        }
        return $root;
    }
}

