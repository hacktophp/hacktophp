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

use Facebook\TypeAssert as TypeAssert;
use HH\Lib\Str as Str;
abstract class EditableToken extends EditableNode
{
    /**
     * @var string
     */
    private $_token_kind;
    /**
     * @var EditableNode
     */
    private $_leading;
    /**
     * @var EditableNode
     */
    private $_trailing;
    /**
     * @var string
     */
    private $_text;
    public function __construct(string $token_kind, EditableNode $leading, EditableNode $trailing, string $text)
    {
        parent::__construct('token');
        $this->_token_kind = $token_kind;
        $this->_leading = $leading;
        $this->_trailing = $trailing;
        $this->_text = $text;
        $this->_width = \strlen($text) + $leading->getWidth() + $trailing->getWidth();
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
    public function getText()
    {
        return $this->_text;
    }
    /**
     * @return EditableNode
     */
    public function getLeading()
    {
        return $this->_leading;
    }
    /**
     * @return EditableNode
     */
    public final function getLeadingWhitespace()
    {
        $leading = $this->getLeading();
        if ($leading->isMissing()) {
            return $leading;
        }
        if ($leading instanceof WhiteSpace || $leading instanceof EndOfLine) {
            return $leading;
        }
        if (!$leading instanceof EditableList) {
            return Missing();
        }
        $last = Missing();
        foreach ($leading->getChildren() as $child) {
            if ($child instanceof WhiteSpace || $child instanceof EndOfLine) {
                $last = $child;
            }
        }
        return $last;
    }
    /**
     * @return EditableNode
     */
    public final function getTrailingWhitespace()
    {
        $trailing = $this->getTrailing();
        if ($trailing->isMissing()) {
            return $trailing;
        }
        if ($trailing instanceof WhiteSpace || $trailing instanceof EndOfLine) {
            return $trailing;
        }
        if (!$trailing instanceof EditableList) {
            return Missing();
        }
        $result = array();
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
        return EditableList::createNonEmptyListOrMissing($result);
    }
    /**
     * @return EditableNode
     */
    public function getTrailing()
    {
        return $this->_trailing;
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('leading' => $this->getLeading(), 'trailing' => $this->getTrailing());
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
    public function getCode()
    {
        return $this->getLeading()->getCode() . $this->getText() . $this->getTrailing()->getCode();
    }
    /**
     * @return EditableToken
     */
    public abstract function withLeading(EditableNode $leading);
    /**
     * @return EditableToken
     */
    public abstract function withTrailing(EditableNode $trailing);
    /**
     * @return EditableToken
     */
    private static function factory(string $file, int $offset, string $token_kind, EditableNode $leading, EditableNode $trailing, string $token_text)
    {
        return __Private\editable_token_from_data($file, $offset, $token_kind, $leading, $trailing, $token_text);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return EditableToken
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $leading_list = __Private\fold_map($json['leading'], function ($j, $p) use($file, $source) {
            return EditableNode::fromJSON($j, $file, $p, $source);
        }, function ($j, $p) {
            return $j['width'] + $p;
        }, $offset);
        $leading = EditableList::createNonEmptyListOrMissing($leading_list);
        $token_position = $offset + $leading->getWidth();
        $token_width = TypeAssert\int($json['width']);
        $token_text = Str\slice($source, $token_position, $token_width);
        $trailing_position = $token_position + $token_width;
        $trailing_list = __Private\fold_map($json['trailing'], function ($j, $p) use($file, $source) {
            return EditableNode::fromJSON($j, $file, $p, $source);
        }, function ($j, $p) {
            return $j['width'] + $p;
        }, $trailing_position);
        $trailing = EditableList::createNonEmptyListOrMissing($trailing_list);
        return EditableToken::factory($file, $token_position, $json['kind'], $leading, $trailing, $token_text);
    }
    /**
     * @return EditableToken
     */
    public final function getFirstToken()
    {
        return $this;
    }
    /**
     * @return EditableToken
     */
    public final function getLastToken()
    {
        return $this;
    }
}

