<?php
namespace Facebook\HHAST\__Private\Resolution;

use Facebook\HHAST\{EditableNode as EditableNode, NamespaceDeclaration as NamespaceDeclaration, NamespaceEmptyBody as NamespaceEmptyBody, Script as Script};
use Facebook\TypeAssert as TypeAssert;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
/**
 * @param array<int, EditableNode> $parents
 *
 * @return null|string
 */
function get_current_namespace(EditableNode $_node, array $parents)
{
    $parents = (array) $parents;
    $namespaces = Vec\filter($parents, function ($parent) {
        return $parent instanceof NamespaceDeclaration;
    });
    invariant(\count($namespaces) <= 1, 'Can\'t nest namespace blocks');
    if (C\is_empty($namespaces)) {
        $root = TypeAssert\instance_of(Script::class, C\firstx($parents));
        $ns = C\first($root->getDeclarations()->getChildrenOfType(NamespaceDeclaration::class));
        if ($ns === null) {
            return null;
        }
        $body = $ns->getBody();
        invariant($body->isMissing() || $body instanceof NamespaceEmptyBody, 'if using namespace blocks, all code must be in a NS block - got %s', \get_class($body));
        return $ns->getQualifiedNameAsString();
    }
    return Str\strip_prefix(Str\trim((TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName() ? TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName()->getCode() : null) ?? ''), '\\') === '' ? null : Str\strip_prefix(Str\trim((TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName() ? TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName()->getCode() : null) ?? ''), '\\');
}

