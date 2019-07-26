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

use Facebook\TypeAssert;
use HH\Lib\{Dict, Str};
/**
 * @template T as null|Node
 */
final class ListItem extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'list_item';
    /**
     * @var \T
     */
    private $_item;
    /**
     * @var null|Token
     */
    private $_separator;
    /**
     * @param T $item
     */
    public function __construct($item, ?Token $separator, ?array $source_ref = null)
    {
        $this->_item = $item;
        $this->_separator = $separator;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $type_hint)
    {
        if (Str\starts_with($type_hint, 'ListItem<')) {
            $type_hint = Str\strip_suffix(Str\strip_prefix($type_hint, 'ListItem<'), '>');
        } else {
            $type_hint = 'Node';
        }
        $offset = $initial_offset;
        $item = Node::fromJSON($json['list_item'], $file, $offset, $source, $type_hint);
        $offset += (($__tmp1__ = $item) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $separator = Node::fromJSON($json['list_separator'], $file, $offset, $source, 'Token');
        $offset += (($__tmp2__ = $separator) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($item, $separator instanceof Token || $separator === null ? $separator : (function () {
            throw new \TypeError('Failed assertion');
        })(), $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['item' => $this->_item, 'separator' => $this->_separator]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return ListItem<T>
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $item = $this->_item === null ? $this->_item : $rewriter($this->_item, $parents);
        $separator = $this->_separator === null ? null : (($__tmp3__ = $rewriter($this->_separator, $parents)) instanceof Token || $__tmp3__ === null ? $__tmp3__ : (function () {
            throw new \TypeError('Failed assertion');
        })());
        if ($item === $this->_item && $separator === $this->_separator) {
            return $this;
        }
        return new static($item, $separator);
    }
    /**
     * @template Tnode as Node
     *
     * @param Tnode $value
     *
     * @return ListItem<Tnode>
     */
    public function withItem($value)
    {
        if ($value === $this->_item) {
            return $this;
        }
        return new static($value, $this->_separator);
    }
    /**
     * @return bool
     */
    public function hasItem()
    {
        return $this->_item !== null;
    }
    /**
     * @return null|Node
     */
    public function getItemUNTYPED()
    {
        return $this->_item;
    }
    /**
     * @return T
     */
    public function getItem()
    {
        if ($this->_item === null) {
            return null;
        }
        return $this->_item;
    }
    /**
     * @return T
     */
    public function getItemx()
    {
        return ($__tmp4__ = $this->getItem()) !== null ? $__tmp4__ : (function () {
            throw new \TypeError('Failed assertion');
        })();
    }
    /**
     * @return null|Token
     */
    public function getSeparatorUNTYPED()
    {
        return $this->_separator;
    }
    /**
     * @return static
     */
    public function withSeparator(?Token $value)
    {
        if ($value === $this->_separator) {
            return $this;
        }
        return new static($this->_item, $value);
    }
    /**
     * @return bool
     */
    public function hasSeparator()
    {
        return $this->_separator !== null;
    }
    /**
     * @return null | CommaToken | SemicolonToken | BackslashToken
     */
    /**
     * @return null|Token
     */
    public function getSeparator()
    {
        return $this->_separator;
        return TypeAssert\instance_of(Token::class, $this->_separator);
    }
    /**
     * @return CommaToken | SemicolonToken | BackslashToken
     */
    /**
     * @return Token
     */
    public function getSeparatorx()
    {
        return TypeAssert\not_null($this->getSeparator());
    }
}

