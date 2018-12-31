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

class LintError
{
    /**
     * @var BaseLinter
     */
    private $linter;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    public function __construct(BaseLinter $linter, string $description)
    {
    }
    /**
     * @return File
     */
    public final function getFile()
    {
        return $this->linter->getFile();
    }
    /**
     * @return array{0:int, 1:int}|null
     */
    public function getPosition()
    {
        return null;
    }
    /**
     * @return array{0:array{0:int, 1:int}, 1:array{0:int, 1:int}|null}|null
     */
    public function getRange()
    {
        $pos = $this->getPosition();
        if ($pos === null) {
            return null;
        }
        return [$pos, null];
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @return null|string
     */
    public function getBlameCode()
    {
        return null;
    }
    /**
     * @return null|string
     */
    public function getPrettyBlame()
    {
        return $this->getBlameCode();
    }
    /**
     * @return BaseLinter
     */
    public final function getLinter()
    {
        return $this->linter;
    }
}

