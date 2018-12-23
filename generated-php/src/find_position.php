<?php
namespace Facebook\HHAST;

use HH\Lib\{C as C, Str as Str};
/**
 * @return array{0:int, 1:int}
 */
function find_position(EditableNode $root, EditableNode $node)
{
    $offset = find_offset_after_leading($root, $node);
    $lines = \explode('
', Str\slice($root->getCode(), 0, $offset));
    return array(\count($lines), \strlen(C\lastx($lines)));
}

