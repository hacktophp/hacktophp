<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST;

/**
 * @psalm-type TRewriter = (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode)
 */

final class Missing extends EditableNode {
    static $_missing = null;

    public function __construct() {
        parent::__construct('missing');
    }

    public function isMissing(): bool {
        return true;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array {
        return [];
    }

    public static function getInstance(): Missing {
        if (!self::$_missing) {
            self::$_missing = new self();
        }
        return self::$_missing;
    }

    /**
     * @oaram array<string, mixed> $_json
     * @return static
     */
    public static function fromJSON(
        array $_json,
        string $_file,
        int $_position,
        string $_source
    ) {
        return self::getInstance();
    }

    /**
     * @psalm-param TRewriter $rewriter
     * @param ?array<int, EditableNode> $parents
     * @return EditableNode
     */
    public function rewriteDescendants(
        \Closure $rewriter,
        ?array $parents = null
    ): EditableNode {
        return $this;
    }
}

function Missing(): Missing {
    return Missing::getInstance();
}
