<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{BackslashToken as BackslashToken, EditableNode as EditableNode, INamespaceUseDeclaration as INamespaceUseDeclaration, NamespaceGroupUseDeclaration as NamespaceGroupUseDeclaration, NamespaceUseDeclaration as NamespaceUseDeclaration, NamespaceUseClause as NamespaceUseClause};
final class UseStatementWithLeadingBackslashLinter extends AutoFixingASTLinter
{
    /**
     * @return INamespaceUseDeclaration::class
     */
    protected static function getTargetType()
    {
        return INamespaceUseDeclaration::class;
    }
    /**
     * @param array<int, EditableNode> $_context
     *
     * @return ASTLintError<INamespaceUseDeclaration>|null
     */
    public function getLintErrorForNode(INamespaceUseDeclaration $node, array $_context)
    {
        $matched = false;
        if ($node instanceof NamespaceGroupUseDeclaration) {
            $prefix = $node->getPrefix()->getFirstToken();
            if (!$prefix instanceof BackslashToken) {
                return null;
            }
            $matched = true;
        } else {
            foreach ($node->getClausesx()->getItems() as $clause) {
                $name = $clause->getName()->getFirstToken();
                if ($name instanceof BackslashToken) {
                    $matched = true;
                    break;
                }
            }
        }
        if (!$matched) {
            return null;
        }
        return new ASTLintError($this, 'Leading backslashes on `use` statements do nothing', $node);
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_)
    {
        return 'Remove leading backslash';
    }
    /**
     * @return INamespaceUseDeclaration
     */
    public function getFixedNode(INamespaceUseDeclaration $node)
    {
        if ($node instanceof NamespaceUseDeclaration) {
            return $node->rewriteDescendants(function ($n, $_p) use($first) {
                if (!$n instanceof NamespaceUseClause) {
                    return $n;
                }
                $first = $n->getName()->getFirstToken();
                if (!$first instanceof BackslashToken) {
                    return $n;
                }
                return $n->without($first);
            });
        }
        invariant($node instanceof NamespaceGroupUseDeclaration, 'Got an unexpected INamespaceUseDeclaration subclass');
        $first = $node->getPrefix()->getFirstToken();
        if ($first === null || !$first instanceof BackslashToken) {
            return $node;
        }
        $new = $node->without($first);
        invariant($new instanceof NamespaceGroupUseDeclaration, 'unexpected type change');
        return $new;
    }
}

