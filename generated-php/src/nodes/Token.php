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
use HH\Lib\{C, Str, Vec};
abstract class Token extends Node
{
    /**
     * @var string
     */
    private $_token_kind;
    /**
     * @var NodeList<Trivia>
     */
    private $_leading;
    /**
     * @var NodeList<Trivia>
     */
    private $_trailing;
    /**
     * @var string
     */
    private $_text;
    /**
     * @var string
     */
    const SYNTAX_KIND = 'token';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(string $token_kind, ?NodeList $leading, ?NodeList $trailing, string $text, ?array $ref)
    {
        $this->_token_kind = $token_kind;
        $this->_leading = $leading ?? new NodeList([]);
        $this->_trailing = $trailing ?? new NodeList([]);
        $this->_text = $text;
        $this->_width = \strlen($text) + $this->_leading->getWidth() + $this->_trailing->getWidth();
        parent::__construct($ref);
    }
    /**
     * @return string
     */
    public function getTokenKind()
    {
        return $this->_token_kind;
    }
    /**
     * @return string
     */
    public final function getText()
    {
        return $this->_text;
    }
    /**
     * @return bool
     */
    public final function hasLeading()
    {
        return $this->_leading->isEmpty();
    }
    /**
     * @return bool
     */
    public final function hasTrailing()
    {
        return $this->_trailing->isEmpty();
    }
    /**
     * @return NodeList<Trivia>
     */
    public function getLeading()
    {
        return $this->_leading;
    }
    /**
     * @return null|Trivia
     */
    public final function getLeadingWhitespace()
    {
        $leading = $this->getLeading();
        $last = null;
        foreach ($leading->getChildren() as $child) {
            if ($child instanceof WhiteSpace || $child instanceof EndOfLine) {
                $last = $child;
            }
        }
        return $last;
    }
    /**
     * @return NodeList<Trivia>
     */
    public final function getTrailingWhitespace()
    {
        $trailing = $this->getTrailing();
        $result = [];
        foreach ($trailing->getChildren() as $child) {
            if ($child instanceof WhiteSpace) {
                $result[] = $child;
            } else {
                if ($child instanceof EndOfLine) {
                    $result[] = $child;
                    break;
                }
            }
        }
        return NodeList::createMaybeEmptyList($result);
    }
    /**
     * @return NodeList<Trivia>
     */
    public function getTrailing()
    {
        return $this->_trailing;
    }
    /**
     * @return array<string, NodeList<Trivia>>
     */
    public function getChildren()
    {
        return ['leading' => $this->getLeading(), 'trailing' => $this->getTrailing()];
    }
    /**
     * @return bool
     */
    public final function isToken()
    {
        return true;
    }
    /**
     * @return string
     */
    protected function getCodeUncached()
    {
        return $this->getLeading()->getCode() . $this->getText() . $this->getTrailing()->getCode();
    }
    /**
     * @param NodeList<Trivia>|null $leading
     *
     * @return Token
     */
    public abstract function withLeading(?NodeList $leading);
    /**
     * @param NodeList<Trivia>|null $trailing
     *
     * @return Token
     */
    public abstract function withTrailing(?NodeList $trailing);
    /**
     * @param array<array-key, mixed> $json
     *
     * @return Token
     */
    public static final function fromJSON(array $json, string $file, int $offset, string $source, string $_type_hint)
    {
        $leading_list = Vec\filter_nulls(__Private\fold_map($json['leading'], function ($j, $p) use($file, $source) {
            return Trivia::fromJSON($j, $file, $p, $source, 'Node');
        }, function ($j, $p) {
            return $j['width'] + $p;
        }, $offset));
        $leading = C\is_empty($leading_list) ? new NodeList([]) : new NodeList($leading_list, ['file' => $file, 'source' => $source, 'offset' => $offset, 'width' => \is_int($__tmp1__ = $json['leading_width']) ? $__tmp1__ : (function () {
            throw new \TypeError('Failed assertion');
        })()]);
        $token_position = $offset + (\is_int($__tmp2__ = $json['leading_width']) ? $__tmp2__ : (function () {
            throw new \TypeError('Failed assertion');
        })());
        $token_width = TypeAssert\int($json['width']);
        $token_text = Str\slice($source, $token_position, $token_width);
        $trailing_position = $token_position + $token_width;
        $trailing_list = Vec\filter_nulls(__Private\fold_map($json['trailing'], function ($j, $p) use($file, $source) {
            return Trivia::fromJSON($j, $file, $p, $source, 'Node');
        }, function ($j, $p) {
            return $j['width'] + $p;
        }, $trailing_position));
        $trailing = C\is_empty($trailing_list) ? new NodeList([]) : new NodeList($trailing_list, ['file' => $file, 'source' => $source, 'offset' => $trailing_position, 'width' => \is_int($__tmp3__ = $json['trailing_width']) ? $__tmp3__ : (function () {
            throw new \TypeError('Failed assertion');
        })()]);
        $width = (\is_int($__tmp4__ = $json['leading_width']) ? $__tmp4__ : (function () {
            throw new \TypeError('Failed assertion');
        })()) + (\is_int($__tmp5__ = $json['width']) ? $__tmp5__ : (function () {
            throw new \TypeError('Failed assertion');
        })()) + (\is_int($__tmp6__ = $json['trailing_width']) ? $__tmp6__ : (function () {
            throw new \TypeError('Failed assertion');
        })());
        return __Private\token_from_data(['file' => $file, 'source' => $source, 'offset' => $offset, 'width' => $width], \is_string($__tmp7__ = $json['kind']) ? $__tmp7__ : (function () {
            throw new \TypeError('Failed assertion');
        })(), $leading, $trailing, $token_text);
    }
    /**
     * @return Token
     */
    public final function getFirstToken()
    {
        return $this;
    }
    /**
     * @return Token
     */
    public final function getLastToken()
    {
        return $this;
    }
}

