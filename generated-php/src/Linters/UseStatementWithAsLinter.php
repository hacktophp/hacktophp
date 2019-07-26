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

use Facebook\HHAST\{Node, NamespaceUseClause};
/**
 * @template-extends ASTLinter<NamespaceUseClause>
 */
class UseStatementWithAsLinter extends ASTLinter
{
    /**
     * @return class-string<NamespaceUseClause>
     */
    protected static function getTargetType()
    {
        return NamespaceUseClause::class;
    }
    /**
     * @param array<int, Node> $_parents
     *
     * @return ASTLintError<NamespaceUseClause>|null
     */
    public function getLintErrorForNode(NamespaceUseClause $node, array $_parents)
    {
        if (!$node->hasAlias()) {
            return null;
        }
        return new ASTLintError($this, "Don't use `as` in `use` statements: it makes code less readable and " . "less greppable.", $node);
    }
}

