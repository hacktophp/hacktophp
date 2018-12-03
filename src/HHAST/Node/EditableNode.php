<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST\Node;

use HackToPhp\HHAST\Token\EditableToken;

use Facebook\TypeAssert;

require_once(dirname(__DIR__, 3) . '/codegen/editable_node_from_json.php');

/**
 * @psalm-type TRewriter = (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode)
 */

abstract class EditableNode {
    /**
     * @var string
     */
    private $_syntax_kind;

    /**
     * @var ?int
     */
    protected $_width;

    public function __construct(string $syntax_kind) {
        $this->_syntax_kind = $syntax_kind;
    }

    public function getSyntaxKind(): string {
        return $this->_syntax_kind;
    }

    /**
     * @return array<string, EditableNode>
     */
    public abstract function getChildren(): array;

    /**
     * @param \Closure(EditableNode):bool $filter
     * @return array<string, EditableNode>
     */
    public function getChildrenWhere(
        \Closure $filter
    ): array {
        return array_filter(
            $this->getChildren(),
            function($child) { return $filter($child); }
        );
    }

    /**
     * @template T
     * @template-typeof T $what
     * @param class-string $what
     * @return array<string, T>
     */
    final public function getChildrenOfType(
        string $what
    ): array {
        $out = [];
        foreach ($this->getChildren() as $k => $node) {
            if ($node instanceof $what) {
                $out[$k] = $node;
            }
        }
        return $out;
    }

    /**
     * @return array<EditableNode>
     */
    public function traverse(): array {
        $out = [$this];
        foreach ($this->getChildren() as $child) {
            foreach ($child->traverse() as $descendant) {
                $out[] = $descendant;
            }
        }
        return $out;
    }

    /**
     * @param array<int, EditableNode> $parents
     * @return array<int, array{0: EditableNode, array<int, EditableNode>}>
     */
    private function traverseImpl(
        array $parents
    ): array {
        $new_parents = vec($parents);
        $new_parents[] = $this;
        $out = vec[tuple($this, $parents)];
        foreach ($this->getChildren() as $child) {
            foreach ($child->traverseImpl($new_parents) as list($child, $child_parents)) {
                $out[] = tuple($child, $child_parents);
            }
        }
        return $out;
    }

    /**
     * @return array<int, array{0: EditableNode, array<int, EditableNode>}>
     */
    public function traverseWithParents(
    ): array {
        return $this->traverseImpl([]);
    }

    public function isToken(): bool {
        return false;
    }

    public function isTrivia(): bool {
        return false;
    }

    public function isList(): bool {
        return false;
    }

    public function isMissing(): bool {
        return false;
    }

    public function getWidth(): int {
        if ($this->_width === null) {
            $width = 0;
            /* TODO: Make an accumulation sequence operator */
            foreach ($this->getChildren() as $node) {
                $width += $node->getWidth();
            }
            $this->_width = $width;
            return $width;
        } else {
            return $this->_width;
        }
    }

    public function getCode(): string {
        /* TODO: Make an accumulation sequence operator */
        $s = '';
        foreach ($this->getChildren() as $node) {
            $s .= $node->getCode();
        }
        return $s;
    }

    /**
     * @param array<string, mixed> $json
     * @return static
     */
    public static function fromJSON(
        array $json,
        string $file,
        int $offset,
        string $source
    ) {
        return __Private\editable_node_from_json($json, $file, $offset, $source);
    }

    /**
     * @return array<int, EditbaleNode>
     */
    public function toVec(): array {
        return [$this];
    }

    // Returns all the parents (and the node itself) of the first node
    // that matches a predicate, or [] if there is no such node.
    /**
     * @param (\Closure(EditableNode): bool) $predicate
     * @param ?array<int, EditableNode> $parents
     * @return array<EditableNode>
     */
    public function findWithParents(
        \Closure $predicate,
        ?array $parents = null
    ): array {
        $parents = $parents === null ? [] : vec($parents);
        $new_parents = $parents;
        $new_parents[] = $this;
        if ($predicate($this)) {
            return $new_parents;
        }
        foreach ($this->getChildren() as $child) {
            $result = $child->findWithParents($predicate, $new_parents);
            if (\count($result) !== 0) {
                return $result;
            }
        }
        return [];
    }

    /**
     * @param (\Closure(EditableNode, vec<EditableNode>):bool) $filter
     * @return array<int, EditableNode>
     */
    public function getDescendantsWhere(
        \Closure $filter
    ): array {
        $out = [];
        foreach ($this->traverseWithParents() as list($node, $parents)) {
            if ($filter($node, $parents)) {
                $out[] = $node;
            }
        }
        return $out;
    }

    /**
     * @template T
     * @template-typeof T $what
     * @param class-string $what
     * @return array<int, T>
     */
    public function getDescendantsOfType(
        string $what
    ): array {
        $out = [];
        foreach ($this->traverse() as $child) {
            if ($child instanceof $what) {
                $out[] = $child;
            }
        }
        return $out;
    }

    /**
     * @param (\Closure(EditableNode, ?vec<EditableNode>):bool) $predicate
     * @return array<int, EditableNode>
     */
    public function removeWhere(
        \Closure $predicate
    ): EditableNode {
        return $this->rewrite(
            function($node, $parents) {
                return $predicate($node, $parents) ? Missing::getInstance() : $node;
            }
        );
    }

    public function without(EditableNode $target): EditableNode {
        return $this->removeWhere(
            function($node, $parents) { return $node === $target; }
        );
    }

    /**
     * @return static
     */
    public function replace(
        EditableNode $target,
        EditableNode $new_node
    ): self {
        return $this->rewriteDescendants(
            function($node, $parents) { return $node === $target ? $new_node : $node; }
        );
    }

    public function getFirstTokenx(): EditableToken {
        return TypeAssert\not_null($this->getFirstToken());
    }

    public function getFirstToken(): ?EditableToken {
        foreach ($this->getChildren() as $child) {
            if (!$child->isMissing()) {
                return $child->getFirstToken();
            }
        }
        return null;
    }

    public function getLastTokenx(): EditableToken {
        return TypeAssert\not_null($this->getLastToken());
    }

    public function getLastToken(): ?EditableToken {
        foreach (array_reverse($this->getChildren()) as $child) {
            if (!$child->isMissing()) {
                return $child->getLastToken();
            }
        }
        return null;
    }

    /**
     * @return static
     */
    public function insertBefore(
        EditableNode $target,
        EditableNode $new_node
    ) {
        // Inserting before missing is an error.
        if ($target->isMissing()) {
            throw new \Exception('Target must not be missing in insert_before.');
        }

        // Inserting missing is a no-op
        if ($new_node->isMissing()) {
            return $this;
        }

        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getFirstToken();
            if ($token === null) {
                throw new \Exception('Unable to find token to insert trivia.');
            }
            $token = TypeAssert\instance_of(EditableToken::class, $token);

            // Inserting trivia before token is inserting to the right end of
            // the leading trivia.
            $new_leading =
                EditableList::concat($token->getLeading(), $new_node);
            $new_token = $token->withLeading($new_leading);
            return $this->replace($token, $new_token);
        }

        return $this->replace(
            $target,
            EditableList::concat($new_node, $target)
        );
    }

    /**
     * @return static
     */
    public function insertAfter(
        EditableNode $target,
        EditableNode $new_node
    ) {

        // Inserting after missing is an error.
        if ($target->isMissing()) {
            throw new \Exception('Target must not be missing in insert_after.');
        }

        // Inserting missing is a no-op
        if ($new_node->isMissing()) {
            return $this;
        }

        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getLastToken();
            if ($token === null) {
                throw new \Exception('Unable to find token to insert trivia.');
            }

            $token = TypeAssert\instance_of(EditableToken::class, $token);

            // Inserting trivia after token is inserting to the left end of
            // the trailing trivia.
            $new_trailing =
                EditableList::concat($new_node, $token->getTrailing());
            $new_token = $token->withTrailing($new_trailing);
            return $this->replace($token, $new_token);
        }

        return $this->replace(
            $target,
            EditableList::concat($target, $new_node)
        );
    }

    /**
     * @psalm-param TRewriter $rewriter
     * @param ?array<int, EditableNode> $parents
     * @return static
     */
    abstract public function rewriteDescendants(
        \Closure $rewriter,
        ?array $parents = null
    );

    /**
     * @psalm-param TRewriter $rewriter
     * @param ?array<int, EditableNode> $parents
     * @return EditableNode
     */
    public function rewrite(
        \Closure $rewriter,
        ?array $parents = null
    ): EditableNode {
        $parents = $parents === null ? [] : vec($parents);
        $with_rewritten_children = $this->rewriteDescendants(
            $rewriter,
            $parents
        );
        return $rewriter($with_rewritten_children, $parents);
    }
}
