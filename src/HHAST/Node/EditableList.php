<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST\Node;

/**
 * @psalm-type TRewriter = (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode)
 */

/**
 * @template TItem
 */
final class EditableList extends EditableNode {
    /**
     * @var array<int, EditableNode>
     */
    private $_children;
    /**
     * Use `EditableList::createMaybeEmptyList()` or
     * `EditableList::createNonEmptyListOrMissing()` instead to be explicit
     * about desired behavior.
     * @param array<int, EditableNode> $children
     */
    public function __construct(array $children) {
        parent::__construct('list');
        $this->_children = $children;
    }

    final public function isList(): bool {
        return true;
    }

    /**
     * @return array<int, EditableNode>
     */
    public function toVec(): array {
        return $this->_children;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array {
        return $this->_children;
    }

    /**
     * @return array<Titem>
     */
    final public function getItems(): array {
        // The `filter_nulls()` is needed for for expressions like
        // `list($a,,$c) = $foo` and types like `\Foo\Bar`, now that the first
        // is parsed as name token items with  backslash separators - i.e. the first
        // item is empty.

        /* HH_FIXME[4110] we have to trust the typechecker here; in future, use
         * reified generics */
        return array_map(
            function($child) { return $child instanceof ListItem ? $child->getItem() : $child; },
            $this->_children
        );// |> Vec\filter_nulls($$);
    }

    /**
     * @template T
     * @template-typeof T $what
     * @param class-string $what
     * @return array<int, T>
     */
    final public function getItemsOfType(
        string $what
    ): array {
        $out = [];
        foreach ($this->getItems() as $item) {
            if ($item instanceof $what) {
                $out[] = $item;
            }
        }
        return $out;
    }

    /**
     * @deprecated Use createNonEmptyListOrMissing() instead
     * @param array<int, EditableNode> $items
     */
    public static function fromItems(
        array $items
    ): EditableNode {
        return self::createNonEmptyListOrMissing($items);
    }

    /**
     * @param array<int, EditableNode> $items
     */
    public static function createNonEmptyListOrMissing(
        array $items
    ): EditableNode {
        if (\count($items) === 0) {
            return Missing();
        } else {
            return new self($items);
        }
    }

    /**
     * @template T
     * @param array<int, T> $items
     * @return EditableList<T>
     */
    public static function createMaybeEmptyList(
        array $items
    ): EditableList {
        return new self($items);
    }

    public static function concat(
        EditableNode $left,
        EditableNode $right
    ): EditableNode {
        if ($left->isMissing()) {
            return $right;
        }
        if ($right->isMissing()) {
            return $left;
        }
        return new EditableList(array_merge($left->toVec(), $right->toVec()));
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
        $children = [];
        $current_position = $offset;
        foreach (/* UNSAFE_EXPR */$json['elements'] as $element) {
            $child =
                EditableNode::fromJSON($element, $file, $current_position, $source);
            $children[] = $child;
            $current_position += $child->getWidth();
        }
        return new EditableList($children);
    }

    /**
     * @psalm-param TRewriter $rewriter
     * @param ?array<int, EditableNode> $parents
     * @return static
     */
    public function rewriteDescendants(
        \Closure $rewriter,
        ?array $parents = null
    ) {
        $parents = $parents === null ? [] : vec($parents);

        $dirty = false;
        $new_children = [];
        $new_parents = $parents;
        $new_parents[] = $this;
        foreach ($this->getChildren() as $child) {
            $new_child = $child->rewrite($rewriter, $new_parents);
            if ($new_child !== $child) {
                $dirty = true;
            }
            if ($new_child !== null && !$new_child->isMissing()) {
                if ($new_child->isList()) {
                    foreach ($new_child->getChildren() as $n) {
                        $new_children[] = $n;
                    }
                } else {
                    $new_children[] = $new_child;
                }
            }
        }

        if (!$dirty) {
            return $this;
        }

        return new self($new_children);
    }

    /**
     * @psalm-param TRewriter $rewriter
     * @param ?array<int, EditableNode> $parents
     * @return EditableNode
     */
    public function rewrite(
        \Closure $rewriter,
        ?array $parents = null
    ) : EditableNode {
        $parents = $parents === null ? [] : vec($parents);
        $with_rewritten_children = $this->rewriteDescendants(
            $rewriter,
            $parents
        );
        if (empty($with_rewritten_children->_children)) {
            $node = Missing();
        } else {
            $node = $with_rewritten_children;
        }
        return $rewriter($node, $parents);
    }
}
