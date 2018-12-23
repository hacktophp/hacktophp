<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{ClassishDeclaration as ClassishDeclaration, EditableNode as EditableNode, FinalToken as FinalToken, AbstractToken as AbstractToken, ClassToken as ClassToken};
use Facebook\HHAST\Linters\{ASTLinter as ASTLinter, ASTLintError as ASTLintError};
final class FinalOrAbstractClassLinter extends ASTLinter
{
    /**
     * @return ClassishDeclaration::class
     */
    protected static function getTargetType()
    {
        return ClassishDeclaration::class;
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<ClassishDeclaration>|null
     */
    public function getLintErrorForNode(ClassishDeclaration $node, array $_parents)
    {
        if (!$node->getKeyword() instanceof ClassToken) {
            return null;
        }
        $modifiers = $node->getModifiers();
        $found = false;
        if ($modifiers !== null) {
            foreach ($modifiers->traverse() as $mod) {
                if ($mod instanceof FinalToken || $mod instanceof AbstractToken) {
                    return null;
                }
            }
        }
        return new ASTLintError($this, 'Class should always be declared abstract or final', $node);
    }
}

