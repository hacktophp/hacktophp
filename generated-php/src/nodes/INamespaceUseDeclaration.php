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

interface INamespaceUseDeclaration
{
    /**
     * @return static
     */
    public function withKeyword(UseToken $value);
    /**
     * @return bool
     */
    public function hasKeyword();
    /**
     * @return UseToken
     */
    public function getKeyword();
    /**
     * @return UseToken
     */
    public function getKeywordx();
    /**
     * @return static
     */
    public function withKind(Token $value);
    /**
     * @return bool
     */
    public function hasKind();
    /**
     * @return null|Token
     */
    public function getKind();
    /**
     * @return Token
     */
    public function getKindx();
    /**
     * @param NodeList<ListItem<NamespaceUseClause>> $value
     *
     * @return static
     */
    public function withClauses(NodeList $value);
    /**
     * @return bool
     */
    public function hasClauses();
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    public function getClauses();
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    public function getClausesx();
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon();
}

