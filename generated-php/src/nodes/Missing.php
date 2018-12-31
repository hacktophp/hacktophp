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

final class Missing extends EditableNode
{
    public function __construct()
    {
        parent::__construct('missing');
    }
    /**
     * @return bool
     */
    public function isMissing()
    {
        return true;
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return [];
    }
    /**
     * @return Missing
     */
    public static function getInstance()
    {
        return new self();
    }
    /**
     * @param array<string, mixed> $_json
     *
     * @return static
     */
    public static function fromJSON(array $_json, string $_file, int $_position, string $_source)
    {
        return self::getInstance();
    }
    /**
     * @param mixed $_rewriter
     * @param array<int, EditableNode>|null $_parents
     *
     * @return static
     */
    public function rewriteDescendants($_rewriter, ?array $_parents = null)
    {
        return $this;
    }
}
/**
 * @return Missing
 */
function Missing()
{
    return Missing::getInstance();
}

