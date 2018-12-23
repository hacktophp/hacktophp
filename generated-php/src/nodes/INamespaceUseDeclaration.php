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
    public function withKeyword(EditableNode $value);
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
    public function withKind(EditableNode $value);
    /**
     * @return bool
     */
    public function hasKind();
    /**
     * @return null|EditableToken
     */
    public function getKind();
    /**
     * @return EditableToken
     */
    public function getKindx();
    /**
     * @return static
     */
    public function withClauses(EditableNode $value);
    /**
     * @return bool
     */
    public function hasClauses();
    /**
     * @return EditableList<NamespaceUseClause>
     */
    public function getClauses();
    /**
     * @return EditableList<NamespaceUseClause>
     */
    public function getClausesx();
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon();
}

