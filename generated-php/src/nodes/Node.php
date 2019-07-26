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

use HH\Lib\{C, Dict, Str, Vec};
use Facebook\TypeAssert;
abstract class Node
{
    /**
     * @var array<int, Node>
     */
    protected $_descendants = [];
    /**
     * @var null|int
     */
    protected $_width;
    /**
     * @var null|__Private\SourceRef
     */
    protected $sourceRef;
    public function __construct(?__Private\SourceRef $sourceRef)
    {
        $this->sourceRef = $sourceRef;
        $this->_descendants = Dict\merge([$this->getUniqueID() => $this], ...\array_map(function ($c) {
            return $c->_descendants;
        }, $this->getChildren()));
    }
    /**
     * @var int
     */
    private static $_maxID = 0;
    /**
     * @return int
     */
    public function getUniqueID()
    {
        $id = self::$_maxID;
        self::$_maxID++;
        return $id;
    }
    /**
     * @return bool
     */
    public final function isAncestorOf(Node $other)
    {
        return C\contains_key($this->_descendants, $other->getUniqueID());
    }
    /**
     * @return string
     */
    public final function getSyntaxKind()
    {
        return static::SYNTAX_KIND;
    }
    /**
     * @return iterable<array-key, Node>
     */
    public abstract function getChildren();
    /**
     * @param \Closure(Node):bool $filter
     *
     * @return iterable<array-key, Node>
     */
    public final function getChildrenWhere(\Closure $filter)
    {
        return \array_filter($this->getChildren(), function ($child) use($filter) {
            return $filter($child);
        });
    }
    /**
     * @template T as Node
     *
     * @param T::class $what
     *
     * @return iterable<array-key, T>
     */
    public final function getChildrenOfType(string $what)
    {
        $out = [];
        foreach ($this->getChildren() as $k => $node) {
            if (\is_a($node, $what)) {
                $out[$k] = $node;
            }
        }
        return $out;
    }
    /**
     * @return iterable<mixed, Node>
     */
    public final function traverse()
    {
        return $this->_descendants;
    }
    /**
     * @return bool
     */
    public function isToken()
    {
        return false;
    }
    /**
     * @return bool
     */
    public function isTrivia()
    {
        return false;
    }
    /**
     * @return bool
     */
    public function isList()
    {
        return false;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
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
    /**
     * @return string
     */
    public final function getCode()
    {
        $loc = $this->sourceRef;
        if ($loc !== null) {
            return Str\slice($loc['source'], $loc['offset'], $loc['width']);
        }
        return $this->getCodeUncached();
    }
    /**
     * @return string
     */
    protected function getCodeUncached()
    {
        /* TODO: Make an accumulation sequence operator */
        $s = '';
        foreach ($this->getChildren() as $key => $node) {
            $s .= $node->getCode();
        }
        return $s;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return null|Node
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source, string $type_hint)
    {
        return __Private\node_from_json($json, $file, $offset, $source, $type_hint);
    }
    /**
     * @return array<int, Node>
     */
    public function toVec()
    {
        return [$this];
    }
    /**
     * @template T as Node
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public final function getDescendantsOfType(string $what)
    {
        $out = [];
        foreach ($this->_descendants as $node) {
            if (\is_a($node, $what)) {
                $out[] = $node;
            }
        }
        return $out;
    }
    /**
     * @template T as Node
     *
     * @param T::class $what
     *
     * @return null|T
     */
    public final function getFirstDescendantOfType(string $what)
    {
        $out = [];
        foreach ($this->_descendants as $node) {
            if (\is_a($node, $what)) {
                return $node;
            }
        }
        return null;
    }
    /**
     * @return static
     */
    public final function replace(Node $old, Node $new)
    {
        if ($old === $new) {
            return $this;
        }
        return $this->replaceDescendant($old, $new);
    }
    /**
     * @return static
     */
    public final function replaceDescendant(Node $old, Node $new)
    {
        $old_id = $old->getUniqueID();
        if (!C\contains_key($this->_descendants, $old_id)) {
            return $this;
        }
        return $this->replaceImpl($old_id, $new);
    }
    /**
     * @return static
     */
    protected function replaceImpl(int $old_id, Node $new)
    {
        return $this->rewriteChildren(function ($child, $_1) use($old_id, $new) {
            if ($child->getUniqueID() === $old_id) {
                return $new;
            }
            if (!C\contains_key($child->_descendants, $old_id)) {
                return $child;
            }
            return $child->replaceImpl($old_id, $new);
        });
    }
    /**
     * @return Token
     */
    public function getFirstTokenx()
    {
        return TypeAssert\not_null($this->getFirstToken());
    }
    /**
     * @return null|Token
     */
    public function getFirstToken()
    {
        foreach ($this->getChildren() as $child) {
            return $child->getFirstToken();
        }
        return null;
    }
    /**
     * @return Token
     */
    public function getLastTokenx()
    {
        return TypeAssert\not_null($this->getLastToken());
    }
    /**
     * @return null|Token
     */
    public function getLastToken()
    {
        foreach (Vec\reverse($this->getChildren()) as $child) {
            return $child->getLastToken();
        }
        return null;
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public final function rewriteDescendants(\Closure $rewriter, array $parents = [])
    {
        return $this->rewriteChildren(function ($c, $p) use($rewriter) {
            return $c->rewrite($rewriter, $p ?? []);
        }, $parents);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public abstract function rewriteChildren(\Closure $rewriter, array $parents = []);
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return Tret
     */
    public function rewrite(\Closure $rewriter, array $parents = [])
    {
        $with_rewritten_children = $this->rewriteDescendants($rewriter, $parents);
        return $rewriter($with_rewritten_children, $parents);
    }
    /**
     * @return array<int, Node>
     */
    public final function getAncestorsOfDescendant(Node $node)
    {
        if ($node === $this) {
            return [$this];
        }
        invariant($this->isAncestorOf($node), "Node is not a descendant");
        $stack = [$this];
        foreach ($this->getChildren() as $child) {
            if ($child === $node) {
                return [$this, $node];
            }
            if (!$child->isAncestorOf($node)) {
                continue;
            }
            return \array_merge($child->getAncestorsOfDescendant($node), [$this]);
        }
        invariant_violation('unreachable');
    }
    /**
     * @return Node
     */
    public final function getParentOfDescendant(Node $node)
    {
        invariant($node !== $this, "Asked to find parent of self");
        invariant($this->isAncestorOf($node), "Node is not a descendant");
        foreach ($this->getChildren() as $child) {
            if ($child === $node) {
                return $this;
            }
            if ($child->isAncestorOf($node)) {
                return $child->getParentOfDescendant($node);
            }
        }
        invariant_violation('unreachable');
    }
    /**
     * @param \Closure(Node):bool $predicate
     *
     * @return null|Node
     */
    public final function getFirstAncestorOfDescendantWhere(Node $node, \Closure $predicate)
    {
        if ($predicate($this)) {
            return $this;
        }
        $children = $this->getChildren();
        while ($children) {
            $child = C\firstx($children);
            if ($child === $node) {
                return null;
            }
            if (!$child->isAncestorOf($node)) {
                $children = Vec\drop($children, 1);
                continue;
            }
            if ($predicate($child)) {
                return $child;
            }
            $children = $child->getChildren();
        }
        return null;
    }
}

