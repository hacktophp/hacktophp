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

use HH\Lib\Str;
abstract class Trivia extends Node
{
    /**
     * @var string
     */
    private $_text;
    public function __construct(string $text, ?__Private\SourceRef $ref)
    {
        $this->_text = $text;
        parent::__construct($ref);
    }
    /**
     * @return string
     */
    public function getText()
    {
        return $this->_text;
    }
    /**
     * @return string
     */
    protected function getCodeUncached()
    {
        return $this->_text;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
        return \strlen($this->_text);
    }
    /**
     * @return bool
     */
    public final function isTrivia()
    {
        return true;
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return [];
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return Trivia
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source, string $_type_hint)
    {
        return __Private\trivia_from_json($json, ['file' => $file, 'source' => $source, 'offset' => $offset, 'width' => \is_int($__tmp1__ = $json['width']) ? $__tmp1__ : (function () {
            throw new \TypeError('Failed assertion');
        })()]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $_rewriter
     * @param array<int, Node> $_parents
     *
     * @return static
     */
    public final function rewriteChildren(\Closure $_rewriter, array $_parents = [])
    {
        // Trivia have no children
        return $this;
    }
}

