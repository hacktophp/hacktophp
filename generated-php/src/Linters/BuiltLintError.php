<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

class BuiltLintError extends LintError
{
    /**
     * @var array{0:int, 1:int}|null
     */
    private $position = null;
    /**
     * @return array{0:int, 1:int}|null
     */
    public final function getPosition()
    {
        return $this->position;
    }
    /**
     * @return static
     */
    public final function withPosition(int $line, int $character)
    {
        $this->position = [$line, $character];
        return $this;
    }
    /**
     * @var null|string
     */
    private $blameCode = null;
    /**
     * @return null|string
     */
    public final function getBlameCode()
    {
        return $this->blameCode;
    }
    /**
     * @return static
     */
    public final function withBlameCode(?string $c)
    {
        $this->blameCode = $c;
        return $this;
    }
    /**
     * @var null|string
     */
    private $prettyBlame = null;
    /**
     * @return null|string
     */
    public final function getPrettyBlame()
    {
        return $this->prettyBlame ?? $this->getBlameCode();
    }
    /**
     * @return static
     */
    public final function withPrettyBlame(string $b)
    {
        $this->prettyBlame = $b;
        return $this;
    }
}

