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

use Facebook\HHAST\{EditableList as EditableList, EditableNode as EditableNode, EndOfLine as EndOfLine, MarkupSuffix as MarkupSuffix, SingleLineComment as SingleLineComment, WhiteSpace as WhiteSpace};
class StrictModeOnlyLinter extends AutoFixingASTLinter
{
    /**
     * @return MarkupSuffix::class
     */
    protected static function getTargetType()
    {
        return MarkupSuffix::class;
    }
    /**
     * @param array<int, EditableNode> $_
     *
     * @return ASTLintError<MarkupSuffix>|null
     */
    public function getLintErrorForNode(MarkupSuffix $node, array $_)
    {
        $name = $node->getName();
        if ($name === null) {
            return null;
        }
        if ($name->getText() !== 'hh') {
            return null;
        }
        if ($name->getTrailing()->getCode() === ' // strict
') {
            return null;
        }
        return new ASTLintError($this, 'Use `<?hh // strict`', $node);
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_)
    {
        return 'Use `<?hh // strict`';
    }
    /**
     * @return MarkupSuffix
     */
    public function getFixedNode(MarkupSuffix $node)
    {
        $name = $node->getName();
        invariant($name !== null, 'Shouldn\'t be asked to fix a `<?hh`\'');
        return $node->withName($name->withTrailing(EditableList::createNonEmptyListOrMissing(array(new WhiteSpace(' '), new SingleLineComment('// strict'), new EndOfLine('
')))));
    }
}

