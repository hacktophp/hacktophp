<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\Resolution;

use Facebook\HHAST\{EditableNode, NamespaceDeclaration, NamespaceEmptyBody, Script};
use Facebook\TypeAssert;
use HH\Lib\{C, Str, Vec};
/**
 * @param array<int, EditableNode> $parents
 *
 * @return null|string
 */
function get_current_namespace(EditableNode $_node, array $parents)
{
    $parents = (array) $parents;
    $namespaces = \array_filter($parents, function ($parent) {
        return $parent instanceof NamespaceDeclaration;
    });
    invariant(\count($namespaces) <= 1, "Can't nest namespace blocks");
    // No blocks, just a declaration;
    if (C\is_empty($namespaces)) {
        $root = TypeAssert\instance_of(Script::class, C\firstx($parents));
        $ns = C\first($root->getDeclarations()->getChildrenOfType(NamespaceDeclaration::class));
        if ($ns === null) {
            return null;
        }
        $body = $ns->getBody();
        invariant($body->isMissing() || $body instanceof NamespaceEmptyBody, "if using namespace blocks, all code must be in a NS block - got %s", \get_class($body));
        return $ns->getQualifiedNameAsString();
    }
    return Str\strip_prefix(Str\trim((TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName() ? TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName()->getCode() : null) ?? ''), '\\') === '' ? null : Str\strip_prefix(Str\trim((TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName() ? TypeAssert\instance_of(NamespaceDeclaration::class, C\firstx($namespaces))->getName()->getCode() : null) ?? ''), '\\');
}

