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

abstract class TokenWithFixedText extends Token
{
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $ref)
    {
        parent::__construct(static::KIND, $leading, $trailing, static::TEXT, $ref);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public final function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $leading = $rewriter($this->getLeading(), $parents);
        $trailing = $rewriter($this->getTrailing(), $parents);
        $text = $this->getText();
        if ($leading === $this->getLeading() && $trailing === $this->getTrailing()) {
            return $this;
        }
        return new static($leading, $trailing, null);
    }
    /**
     * @param NodeList<Trivia>|null $value
     *
     * @return static
     */
    public final function withLeading(?NodeList $value)
    {
        $value = $value ?? new NodeList([]);
        if ($value === $this->getLeading()) {
            return $this;
        }
        return new static($value, $this->getTrailing(), null);
    }
    /**
     * @param NodeList<Trivia>|null $value
     *
     * @return static
     */
    public final function withTrailing(?NodeList $value)
    {
        $value = $value ?? new NodeList([]);
        if ($value === $this->getTrailing()) {
            return $this;
        }
        return new static($this->getLeading(), $value, null);
    }
}

