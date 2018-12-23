<?php // strict
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
use Facebook\HHAST\EditableNode;
use Facebook\HHAST\EditableList;

abstract class EditableToken extends EditableNode {
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

    public function __construct(
        string $token_kind,
        EditableNode $leading,
        EditableNode $trailing,
        string $text
    ) {
        parent::__construct('token');
        $this->_token_kind = $token_kind;
        $this->_leading = $leading;
        $this->_trailing = $trailing;
        $this->_text = $text;
        $this->_width = strlen($text) + $leading->getWidth() + $trailing->getWidth();
    }

    public function getTokenKind(): string {
        return $this->_token_kind;
    }

    public function getText(): string {
        return $this->_text;
    }

    public function getLeading(): EditableNode {
        return $this->_leading;
    }

    final public function getLeadingWhitespace(): EditableNode {
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

    final public function getTrailingWhitespace(): EditableNode {
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
        $result = [];
        foreach ($trailing->getChildren() as $child) {
            if ($child instanceof WhiteSpace) {
                $result[] = $child;
            } else if ($child instanceof EndOfLine) {
                $result[] = $child;
                break;
            }
        }
        return EditableList::createNonEmptyListOrMissing($result);
    }

    public function getTrailing(): EditableNode {
        return $this->_trailing;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array {
        return [
            'leading' => $this->getLeading(),
            'trailing' => $this->getTrailing(),
        ];
    }

    final public function isToken(): bool {
        return true;
    }

    public function getCode(): string {
        return $this->getLeading()->getCode().
            $this->getText().
            $this->getTrailing()->getCode();
    }

    /**
     * @return static
     */
    public abstract function withLeading(EditableNode $leading);

    /**
     * @return static
     */
    public abstract function withTrailing(
        EditableNode $trailing
    );

    private static function factory(
        string $file,
        int $offset,
        string $token_kind,
        EditableNode $leading,
        EditableNode $trailing,
        string $token_text
    ): EditableToken {
        return __Private\editable_token_from_data(
            $file,
            $offset,
            $token_kind,
            $leading,
            $trailing,
            $token_text
        );
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJSON(
        array $json,
        string $file,
        int $offset,
        string $source
    ): EditableToken {
        $leading_list = \Facebook\HHAST\__Private\fold_map(
            /* HH_IGNORE_ERROR[4110] */ $json['leading'],
            function($j, $p) use ($file, $source) { return EditableNode::fromJSON($j, $file, $p, $source);},
            function($j, $p) { return $j['width'] + $p; },
            $offset
        );

        $leading = EditableList::createNonEmptyListOrMissing($leading_list);
        $token_position = $offset + $leading->getWidth();
        assert(is_int($json['width']));
        $token_width = $json['width'];
        $token_text = substr($source, $token_position, $token_width);
        $trailing_position = $token_position + $token_width;
        $trailing_list = \Facebook\HHAST\__Private\fold_map(
            /* HH_IGNORE_ERROR[4110] */ $json['trailing'],
            function($j, $p) use ($file, $source) { return EditableNode::fromJSON($j, $file, $p, $source); },
            function($j, $p) { return $j['width'] + $p; },
            $trailing_position
        );
        $trailing = EditableList::createNonEmptyListOrMissing($trailing_list);
        return EditableToken::factory(
            $file,
            $token_position,
            /* HH_IGNORE_ERROR[4110] */ $json['kind'],
            $leading,
            $trailing,
            $token_text
        );
    }

    final public function getFirstToken(): EditableToken {
        return $this;
    }

    final public function getLastToken(): EditableToken {
        return $this;
    }
}
