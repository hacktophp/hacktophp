<?php
namespace Facebook\HHAST\Migrations;

use function Facebook\HHAST\find_node_at_position as find_node_at_position;
use Facebook\HHAST\__Private\TTypecheckerError as TTypecheckerError;
use Facebook\HHAST\{EditableList as EditableList, EditableNode as EditableNode, FixMe as FixMe, Missing as Missing, WhiteSpace as WhiteSpace};
use HH\Lib\{C as C, Dict as Dict, Keyset as Keyset, Str as Str, Vec as Vec};
final class AddFixMesMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @return bool
     */
    protected static function filterTypecheckerError(TTypecheckerError $_)
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
                return array(new FixMe(Str\format('/* HH_FIXME[%d] */', $code)), new WhiteSpace(' '));
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
                    $new_leading = EditableList::createNonEmptyListOrMissing(Vec\concat($leading->getChildren(), $fixmes));
                } else {
                    $new_leading = EditableList::createNonEmptyListOrMissing(Vec\concat(array($leading), $fixmes));
                }
            }
            $column_offset += \strlen($new_leading->getCode()) - \strlen($leading->getCode());
            $root = $root->replace($node, $node->withLeading($new_leading));
        }
        return $root;
    }
}

