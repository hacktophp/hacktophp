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

use Facebook\HHAST\{ConstToken, EditableList, EditableNode, EditableToken, FunctionToken, INamespaceUseDeclaration, NamespaceGroupUseDeclaration, NamespaceUseDeclaration, NamespaceUseClause, NamespaceToken, NameToken, TypeToken, QualifiedName};
use Facebook\HHAST;
use HH\Lib\{C, Str, Vec};
final class UnusedUseClauseLinter extends AutoFixingASTLinter
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
        $clauses = $node->getClauses()->getItems();
        $unused = $this->getUnusedClauses($node->getKind(), $clauses);
        if (C\is_empty($unused)) {
            return null;
        }
        return new ASTLintError($this, \implode(', ', \array_map(function ($p) {
            return '`' . $p[0] . '`';
        }, $unused)) . (\count($unused) === 1 ? ' is' : ' are') . ' not used', $node);
    }
    /**
     * @param array<int, NamespaceUseClause> $clauses
     *
     * @return array<int, array{0:string, 1:NamespaceUseClause}>
     */
    private function getUnusedClauses(?EditableToken $kind, array $clauses)
    {
        $used = $this->getUnresolvedReferencedNames();
        $unused = [];
        foreach ($clauses as $clause) {
            $as = $clause->getAlias();
            if ($as !== null) {
                $as = $as->getText();
            } else {
                $name = $clause->getName();
                if ($name instanceof NameToken) {
                    $as = $name->getText();
                } else {
                    invariant($name instanceof QualifiedName, "Unhandled name type");
                    $as = C\lastx($name->getParts()->getItemsOfType(NameToken::class))->getText();
                }
            }
            if ($kind instanceof NamespaceToken) {
                if (!C\contains($used['namespaces'], $as)) {
                    $unused[] = [$as, $clause];
                }
                continue;
            }
            if ($kind instanceof TypeToken) {
                if (!C\contains($used['types'], $as)) {
                    $unused[] = [$as, $clause];
                }
                continue;
            }
            if ($kind instanceof FunctionToken) {
                if (!C\contains($used['functions'], $as)) {
                    $unused[] = [$as, $clause];
                }
                continue;
            }
            if ($kind instanceof ConstToken) {
                continue;
            }
            invariant($kind === null, 'Unhandled kind: %s', \get_class($kind));
            if (C\contains($used['namespaces'], $as)) {
                continue;
            }
            if (C\contains($used['types'], $as)) {
                continue;
            }
            $unused[] = [$as, $clause];
        }
        return $unused;
    }
    /**
     * @param ASTLintError<INamespaceUseDeclaration> $error
     *
     * @return string
     */
    protected function getTitleForFix(ASTLintError $error)
    {
        $node = $error->getBlameNode();
        $clauses = $node->getClauses()->getItems();
        $unused = $this->getUnusedClauses($node->getKind(), $clauses);
        if (\count($clauses) === \count($unused)) {
            return 'Remove `use` statement';
        }
        return 'Remove ' . \implode(', ', \array_map(function ($p) {
            return '`' . $p[1]->getCode() . '`';
        }, $this->getUnusedClauses($node->getKind(), $clauses)));
    }
    /**
     * @return EditableNode
     */
    public function getFixedNode(INamespaceUseDeclaration $node)
    {
        $clauses = $node->getClauses()->getItems();
        $clause_count = \count($clauses);
        $unused = \array_map(function ($p) {
            return $p[1];
        }, $this->getUnusedClauses($node->getKind(), $clauses));
        $unused_count = \count($unused);
        if ($clause_count === $unused_count) {
            return $node->getFirstTokenx()->getLeading();
        }
        // Don't create a single-element group use statement
        if ($node instanceof NamespaceGroupUseDeclaration && $clause_count === $unused_count + 1) {
            $clause = C\onlyx(\array_filter($clauses, function ($item) use($unused) {
                return !C\contains($unused, $item);
            }));
            $name = $clause->getName();
            if ($name instanceof NameToken) {
                $name = new QualifiedName(EditableList::createNonEmptyListOrMissing(\array_merge([$name], $node->getPrefix()->getParts()->getChildren())));
            } else {
                invariant($name instanceof QualifiedName, 'name is not a name or qualified name');
                $name = new QualifiedName(EditableList::createNonEmptyListOrMissing(\array_merge($name->getParts()->getChildren(), $node->getPrefix()->getParts()->getChildren())));
            }
            $clause = $clause->withName($name)->without($clause->getFirstTokenx()->getLeading());
            $fixed = new NamespaceUseDeclaration($node->getKeyword(), $node->getKind() ?? HHAST\Missing(), EditableList::createNonEmptyListOrMissing([new HHAST\ListItem($clause, HHAST\Missing())]), $node->getSemicolon() ?? HHAST\Missing());
        } else {
            $fixed = $node->rewriteDescendants(function ($c, $_) use($unused) {
                if ($c instanceof HHAST\ListItem && C\contains($unused, $c->getItem())) {
                    return HHAST\Missing();
                }
                return $c;
            });
        }
        $last = C\lastx($fixed->getClauses()->getChildrenOfType(HHAST\ListItem::class));
        $sep = $last->getSeparator();
        if ($sep && !Str\contains($sep->getTrailing()->getCode(), "\n")) {
            return $fixed->without($sep);
        }
        return $fixed;
    }
    /**
     * @return array{namespaces:array<string, string>, types:array<string, string>, functions:array<string, string>}
     */
    private function getUnresolvedReferencedNames()
    {
        return HHAST\get_unresolved_referenced_names($this->getAST());
    }
}

