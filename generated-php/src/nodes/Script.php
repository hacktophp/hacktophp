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

use HH\Lib\{C, Dict, Vec};
final class Script extends ScriptGeneratedBase
{
    /**
     * @return array<int, Token>
     */
    public function getTokens()
    {
        return $this->getDescendantsOfType(Token::class);
    }
    /**
     * @return array<int, int>
     */
    private function getTokenIndices()
    {
        return Dict\pull_with_key($this->getTokens(), function ($k, $_v) {
            return $k;
        }, function ($_k, $v) {
            return $v->getUniqueID();
        });
    }
    /**
     * @return null|Token
     */
    public function getPreviousToken(Token $token)
    {
        $idx = $this->getTokenIndices()[$token->getUniqueID()];
        if ($idx === 0) {
            return null;
        }
        return $this->getTokens()[$idx - 1];
    }
    /**
     * @return array<int, mixed>
     */
    public function getNamespaces()
    {
        $namespaces = (array) $this->getDeclarationsx()->getChildrenOfType(NamespaceDeclaration::class);
        $count = \count($namespaces);
        if ($count === 0) {
            return [];
        }
        $outer = __Private\Resolution\get_uses_directly_in_scope($this->getDeclarationsx());
        if ($count === 1 && $namespaces[0]->getBody() instanceof NamespaceEmptyBody) {
            return [['statement' => true, 'decl' => $namespaces[0], 'uses' => $outer]];
        }
        return \array_map(function ($ns) use($inner, $outer) {
            $inner = __Private\Resolution\get_uses_directly_in_scope((($__tmp1__ = $ns->getBody()) instanceof NamespaceBody ? $__tmp1__ : (function () {
                throw new \TypeError('Failed assertion');
            })())->getDeclarations());
            return ['statement' => false, 'decl' => $ns, 'uses' => ['namespaces' => Dict\merge($outer['namespaces'], $inner['namespaces']), 'types' => Dict\merge($outer['types'], $inner['types'])]];
        }, $namespaces);
    }
}

