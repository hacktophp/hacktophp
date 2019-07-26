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

abstract class WrapperNode extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'hhhast_wrapper';
    /**
     * @return mixed
     */
    public abstract function getWrappedNode();
    /**
     * @var mixed
     */
    protected $wrapped;
    /**
     * @param mixed $wrapped
     */
    public final function __construct($wrapped)
    {
        $this->wrapped = $wrapped;
        parent::__construct($wrapped->sourceRef);
    }
    /**
     * @return string
     */
    protected final function getCodeUncached()
    {
        return $this->wrapped->getCodeUncached();
    }
    /**
     * @return array<string, Node>
     */
    public final function getChildren()
    {
        return ['wrapped' => $this->wrapped];
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
        $new = $rewriter($this->wrapped, $parents);
        if ($new === $this->wrapped) {
            return $this;
        }
        return new static($new);
    }
}

