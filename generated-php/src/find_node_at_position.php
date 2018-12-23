<?php
namespace Facebook\HHAST;

/**
 * @return EditableNode
 */
function find_node_at_position(EditableNode $root, int $line, int $char)
{
    return find_node_at_offset($root, offset_from_position($root, $line, $char));
}

