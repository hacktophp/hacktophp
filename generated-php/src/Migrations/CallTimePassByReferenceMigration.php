<?php
namespace Facebook\HHAST\Migrations;

use function Facebook\HHAST\{find_node_at_position as find_node_at_position, Missing as Missing};
use Facebook\HHAST\__Private\TTypecheckerError as TTypecheckerError;
use Facebook\HHAST\{AmpersandToken as AmpersandToken, EditableList as EditableList, EditableNode as EditableNode};
use HH\Lib\{C as C, Vec as Vec};
final class CallTimePassByReferenceMigration extends BaseMigration
{
    use TypeErrorMigrationTrait;
    /**
     * @var int
     */
    const ERROR_CODE = 4168;
    /**
     * @return bool
     */
    protected static function filterTypecheckerError(TTypecheckerError $error)
    {
        return C\firstx($error['message'])['code'] === self::ERROR_CODE;
    }
    /**
     * @return EditableNode
     */
    public function migrateFile(string $path, EditableNode $root)
    {
        $nodes = \array_map(function ($error) use($root) {
            return find_node_at_position($root, $error['line'], $error['start']);
        }, \array_map(function ($err) {
            return C\firstx($err['message']);
        }, $this->getTypecheckerErrorsForFile($path)));
        foreach ($nodes as $node) {
            $node = $node->getFirstTokenx();
            $root = $root->replace($node, EditableList::createNonEmptyListOrMissing(array(new AmpersandToken($node->getLeading(), Missing()), $node->withLeading(Missing()))));
        }
        return $root;
    }
}

