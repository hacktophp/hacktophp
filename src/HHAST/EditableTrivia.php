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

require_once(dirname(__DIR__, 2) . '/codegen/editable_trivia_from_json.php');

/**
 * @psalm-type TRewriter = (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode)
 */

abstract class EditableTrivia extends EditableNode {
  /**
   * @var string
   */
  private $_text;

  public function __construct(string $trivia_kind, string $text) {
    parent::__construct($trivia_kind);
    $this->_text = $text;
  }

  public function getText(): string {
    return $this->_text;
  }

  public function getCode(): string {
    return $this->_text;
  }

  public function getWidth(): int {
    return strlen($this->_text);
  }

  final public function isTrivia(): bool {
    return true;
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren(): array {
    return [];
  }

  /**
   * @param array<string, mixed> $json
   */
  public static function fromJSON(
    array $json,
    string $file,
    int $offset,
    string $source
  ): EditableTrivia {
    return __Private\editable_trivia_from_json($json, $file, $offset, $source);
  }

  /**
   * @psalm-param TRewriter $_rewriter
   * @param ?array<int, EditableNode> $_parents
   * @return static
   */
  final public function rewriteDescendants(
    \Closure $_rewriter,
    ?array $_parents = null
  ) {
    // Trivia have no children
    return $this;
  }
}
