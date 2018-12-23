<?php
namespace Facebook\HHAST;

use Facebook\HHAST\EditableNode as EditableNode;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
use Facebook\HHAST\__Private\Resolution as Resolution;
/**
 * @param array<int, EditableNode> $parents
 *
 * @return null|string
 */
function resolve_type(string $type, EditableNode $node, array $parents)
{
    if (Str\starts_with($type, '\\')) {
        return Str\strip_prefix($type, '\\');
    }
    invariant(!Str\contains($type, '<'), 'Call on the class name without generics');
    $ns = Resolution\get_current_namespace($node, $parents);
    $uses = Resolution\get_current_uses($node, $parents);
    if (Str\contains($type, '\\')) {
        $maybe_aliased = C\firstx(\explode('\\', $type));
        if (C\contains_key($uses['namespaces'], $maybe_aliased)) {
            return $uses['namespaces'][$maybe_aliased] . '\\' . \implode('\\', Vec\drop(\explode('\\', $type), 1));
        }
        if ($ns !== null) {
            return $ns . '\\' . $type;
        }
        return $type;
    }
    if (C\contains_key($uses['types'], $type)) {
        return $uses['types'][$type];
    }
    if ($ns !== null) {
        return $ns . '\\' . $type;
    }
    return $type;
}

