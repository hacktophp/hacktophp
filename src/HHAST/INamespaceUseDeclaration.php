<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST;

use HackToPhp\HHAST\EditableToken;

interface INamespaceUseDeclaration {
  /**
   * @return static
   */
  public function withKeyword(EditableNode $value);
  public function hasKeyword(): bool;
  public function getKeyword(): UseToken;
  public function getKeywordx(): UseToken;

  /**
   * @return static
   */
  public function withKind(EditableNode $value);
  public function hasKind(): bool;
  public function getKind(): ?EditableToken;
  public function getKindx(): EditableToken;

  /**
   * @return static
   */
  public function withClauses(EditableNode $value);
  public function hasClauses(): bool;

  /**
   * @return EditableList<NamespaceUseClause>
   */
  public function getClauses(): EditableList;
  /**
   * @return EditableList<NamespaceUseClause>
   */
  public function getClausesx(): EditableList;

  public function getSemicolon(): ?SemicolonToken;
 }
