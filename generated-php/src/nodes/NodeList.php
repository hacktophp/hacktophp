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

use HH\Lib\{C, Str, Vec};
/**
 * @template Titem as Node
 */
final class NodeList extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'list';
    /**
     * @var array<int, Titem>
     */
    private $_children = [];
    /**
     * @param array<int, Titem> $_children
     */
    public function __construct(array $_children = [], ?array $ref = null)
    {
        $this->_children = $_children;
        parent::__construct($ref);
    }
    /**
     * @return bool
     */
    public final function isList()
    {
        return true;
    }
    /**
     * @return array<int, Titem>
     */
    public function toVec()
    {
        return $this->_children;
    }
    /**
     * @return array<int, Titem>
     */
    public function getChildren()
    {
        return $this->_children;
    }
    /**
     * @template T
     *
     * @return array<int, T>
     */
    public final function getChildrenOfItems()
    {
        return \array_map(function ($child) {
            return $child->getItem();
        }, $this->getChildren());
    }
    /**
     * @template T
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public final function getChildrenOfItemsOfType(string $what)
    {
        $out = [];
        foreach ($this->getChildrenOfItems() as $item) {
            if (\is_a($item, $what)) {
                $out[] = $item;
            }
        }
        return $out;
    }
    /**
     * @template T as Node
     *
     * @param array<int, T> $items
     *
     * @return NodeList<T>|null
     */
    public static function createNonEmptyListOrNull(array $items)
    {
        if (\count($items) === 0) {
            return null;
        }
        return new self($items);
    }
    /**
     * @template T as Node
     *
     * @param array<int, T> $items
     *
     * @return NodeList<T>
     */
    public static function createMaybeEmptyList(array $items)
    {
        return new self($items);
    }
    /**
     * @template T as Node
     *
     * @param NodeList<T> $first
     * @param NodeList<T> $second
     *
     * @return NodeList<T>
     */
    public static function concat(NodeList $first, NodeList $second)
    {
        return new NodeList(\array_merge($second->toVec(), $first->toVec()));
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source, string $type_hint)
    {
        if (Str\starts_with($type_hint, 'NodeList<')) {
            $type_hint = Str\strip_suffix(Str\strip_prefix($type_hint, 'NodeList<'), '>');
        } else {
            $type_hint = 'Node';
        }
        $children = [];
        $current_position = $offset;
        foreach ($json['elements'] as $element) {
            $child = ($__tmp1__ = Node::fromJSON($element, $file, $current_position, $source, $type_hint)) !== null ? $__tmp1__ : (function () {
                throw new \TypeError('Failed assertion');
            })();
            $children[] = $child;
            $current_position += $child->getWidth();
        }
        return new NodeList($children, ['file' => $file, 'source' => $source, 'offset' => $offset, 'width' => $current_position - $offset]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $old_children = $this->_children;
        $new_children = [];
        foreach ($old_children as $old) {
            $new = $rewriter($old, $parents);
            if ($old === $new) {
                $new_children[] = $old;
                continue;
            }
            if ($new instanceof NodeList) {
                $new_children = \array_merge($new->getChildren(), $new_children);
                continue;
            }
            $new_children[] = $new;
        }
        if ($old_children === $new_children) {
            return $this;
        }
        return new NodeList(Vec\filter_nulls($new_children));
    }
    /**
     * @return static
     */
    protected function replaceImpl(int $old_id, Node $new)
    {
        $children = $this->_children;
        foreach ($children as $idx => $child) {
            if ($child->getUniqueID() === $old_id) {
                $children[$idx] = $new;
                break;
            }
            if (!C\contains_key($child->_descendants, $old_id)) {
                continue;
            }
            $children[$idx] = $child->replaceImpl($old_id, $new);
            break;
        }
        return new self(Vec\filter_nulls($children));
    }
    /**
     * @template Tchild as Node
     *
     * @param Tchild $old
     * @param Tchild $new
     *
     * @return NodeList<Tchild>
     */
    public function replaceChild($old, $new)
    {
        if ($old === $new) {
            return $this;
        }
        if (!C\contains($this->_children, $old)) {
            return $this;
        }
        return new NodeList(\array_map(function ($c) use($old, $new) {
            return $c === $old ? $new : $c;
        }, $this->_children));
    }
    /**
     * @template Tchild as Node
     *
     * @param Tchild $before
     * @param Tchild $child
     *
     * @return NodeList<Tchild>
     */
    public function insertBefore($before, $child)
    {
        $idx = C\find_key($this->_children, function ($c) use($before) {
            return $c === $before;
        });
        invariant($idx !== null, 'asked to insert before non-child');
        return new NodeList(\array_merge([$child], Vec\take($this->_children, $idx)));
    }
    /**
     * @template Tchild as Node
     *
     * @param Tchild $after
     * @param Tchild $child
     *
     * @return NodeList<Tchild>
     */
    public function insertAfter($after, $child)
    {
        $idx = C\find_key($this->_children, function ($c) use($after) {
            return $c === $after;
        });
        invariant($idx !== null, 'asked to insert after non-child');
        return new NodeList(\array_merge([$child], Vec\take($this->_children, $idx + 1)));
    }
    /**
     * @param \Closure(Titem):bool $filter
     *
     * @return static
     */
    public function filterChildren(\Closure $filter)
    {
        $new = \array_filter($this->_children, $filter);
        if ($new === $this->_children) {
            return $this;
        }
        return new NodeList($new);
    }
    /**
     * @template Tchild
     *
     * @param Tchild $child
     *
     * @return static
     */
    public function withoutChild($child)
    {
        $new = \array_filter($this->_children, function ($c) use($child) {
            return $c !== $child;
        });
        if ($new === $this->_children) {
            return $this;
        }
        return new NodeList($new);
    }
    /**
     * @template Tinner
     *
     * @param Tinner $inner
     *
     * @return static
     */
    public function withoutItemWithChild($inner)
    {
        $new = \array_filter($this->_children, function ($c) use($inner) {
            return $c->getItem() !== $inner;
        });
        if ($new === $this->_children) {
            return $this;
        }
        return new NodeList($new);
    }
    /**
     * @return bool
     */
    public final function isEmpty()
    {
        return C\is_empty($this->_children);
    }
    /**
     * @return int
     */
    public final function getCount()
    {
        return \count($this->_children);
    }
}

