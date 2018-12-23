<?php
namespace Facebook\HHAST;

/**
 * @return int
 */
function find_offset_after_leading(EditableNode $root, EditableNode $node)
{
    if ($root === $node) {
        return 0;
    }
    $leading_offset = find_offset_of_leading($root, $node);
    $first_token = $node->getFirstToken();
    if ($first_token === null) {
        return $leading_offset;
    }
    return $leading_offset + $first_token->getLeading()->getWidth();
}

