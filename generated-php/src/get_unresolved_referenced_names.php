<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

use HH\Lib\C;
/** Given a tree, provide a list of names that are referenced by the code.
 *
 * These are not resolved to fully-qualified names; for example, `use`
 * and `namespace` statements to not affect the return value.
 */
/**
 * @return array{namespaces:array<string, string>, types:array<string, string>, functions:array<string, string>}
 */
function get_unresolved_referenced_names(Node $root) : array
{
    $ret = ['namespaces' => [], 'types' => [], 'functions' => []];
    foreach ($root->traverse() as $node) {
        if ($node instanceof QualifiedName) {
            $name = C\firstx($node->getParts()->getItems());
            if ($name instanceof NameToken) {
                $ret['namespaces'][] = $name->getText();
            }
            continue;
        }
        if ($node instanceof SimpleTypeSpecifier) {
            $name = $node->getSpecifierx();
            if ($name instanceof NameToken) {
                $ret['types'][] = $name->getText();
            }
            continue;
        }
        if ($node instanceof GenericTypeSpecifier) {
            $name = $node->getClassType();
            if ($name instanceof NameToken) {
                $ret['types'][] = $name->getText();
            }
        }
        if ($node instanceof ScopeResolutionExpression) {
            $name = $node->getQualifier();
            if ($name instanceof NameToken) {
                $ret['types'][] = $name->getText();
            }
            continue;
        }
        if ($node instanceof InstanceofExpression) {
            $name = $node->getRightOperand();
            if ($name instanceof NameToken) {
                $ret['types'][] = $name->getText();
            }
            continue;
        }
        if ($node instanceof FunctionCallExpression) {
            $name = $node->getReceiver();
            if ($name instanceof NameToken) {
                $ret['functions'][] = $name->getText();
            }
            continue;
        }
        // `new Foo()` gets us a SimpleTypeSpecifier, but
        // <<Foo>> gets us a NameToken directly
        if ($node instanceof ConstructorCall) {
            $name = ($__tmp1__ = $node->getType()) instanceof NameToken ? $__tmp1__ : null;
            if ($name !== null) {
                $ret['types'][] = $name->getText();
            }
        }
    }
    return $ret;
}

