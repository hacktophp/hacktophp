<?php
namespace Facebook\HHAST;

use HH\Lib\{Str as Str, Vec as Vec};
/**
 * @return int
 */
function offset_from_position(EditableNode $root, int $line, int $column)
{
    if ($line === 1) {
        return $column - 1;
    }
    $lines = \explode('
', $root->getCode());
    $to_skip = $line - 1;
    return \strlen(\implode('
', Vec\take($lines, $to_skip))) + $column;
}

