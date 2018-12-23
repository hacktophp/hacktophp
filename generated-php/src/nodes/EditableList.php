<?php
namespace Facebook\HHAST;

use HH\Lib\{C as C, Dict as Dict, Vec as Vec};
final class EditableList extends EditableNode
{
    /**
     * @var array<int, EditableNode>
     */
    private $_children;
    /**
     * @param array<int, EditableNode> $children
     */
    public function __construct(array $children)
    {
        parent::__construct('list');
        $this->_children = (array) $children;
    }
    /**
     * @return bool
     */
    public final function isList()
    {
        return true;
    }
    /**
     * @return array<int, EditableNode>
     */
    public function toVec()
    {
        return $this->_children;
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return Dict\pull_with_key($this->_children, function ($_, $v) {
            return $v;
        }, function ($k, $_) {
            return (string) $k;
        });
    }
    /**
     * @return array<int, Titem>
     */
    public final function getItems()
    {
        return \array_map(function ($child) {
            return $child instanceof ListItem ? $child->getItem() : $child;
        }, $this->_children);
    }
    /**
     * @psalm-template T as \Facebook\HHAST\EditableNode
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public final function getItemsOfType(string $what)
    {
        $out = array();
        foreach ($this->getItems() as $item) {
            if ($item instanceof $what) {
                $out[] = $item;
            }
        }
        return $out;
    }
    /**
     * @param array<int, EditableNode> $items
     *
     * @return EditableNode
     */
    public static function fromItems(array $items)
    {
        return self::createNonEmptyListOrMissing($items);
    }
    /**
     * @param array<int, EditableNode> $items
     *
     * @return EditableNode
     */
    public static function createNonEmptyListOrMissing(array $items)
    {
        if (\count($items) === 0) {
            return Missing();
        } else {
            return new self($items);
        }
    }
    /**
     * @psalm-template T as \Facebook\HHAST\EditableNode
     *
     * @param array<int, T> $items
     *
     * @return EditableList<T>
     */
    public static function createMaybeEmptyList(array $items)
    {
        return new self($items);
    }
    /**
     * @return EditableNode
     */
    public static function concat(EditableNode $left, EditableNode $right)
    {
        if ($left->isMissing()) {
            return $right;
        }
        if ($right->isMissing()) {
            return $left;
        }
        return new EditableList(Vec\concat($left->toVec(), $right->toVec()));
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $children = array();
        $current_position = $offset;
        foreach ($json['elements'] as $element) {
            $child = EditableNode::fromJSON($element, $file, $current_position, $source);
            $children[] = $child;
            $current_position += $child->getWidth();
        }
        return new EditableList($children);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $dirty = false;
        $new_children = array();
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
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return EditableNode
     */
    public function rewrite($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $with_rewritten_children = $this->rewriteDescendants($rewriter, $parents);
        if (C\is_empty($with_rewritten_children->_children)) {
            $node = Missing();
        } else {
            $node = $with_rewritten_children;
        }
        return $rewriter($node, $parents);
    }
}

