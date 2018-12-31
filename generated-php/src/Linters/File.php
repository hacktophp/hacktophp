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

final class File
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $contents;
    /**
     * @var string
     */
    public function __construct(string $path, string $contents)
    {
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }
    /**
     * @return static
     */
    public function withContents(string $contents)
    {
        if ($contents === $this->contents) {
            return $this;
        }
        return new self($this->path, $contents);
    }
}

