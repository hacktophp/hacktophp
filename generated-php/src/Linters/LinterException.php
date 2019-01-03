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

use HH\Lib\Str;
final class LinterException extends \Exception
{
    /**
     * @var class-string<BaseLinter>
     */
    private $linter;
    /**
     * @var string
     */
    private $fileBeingLinted;
    /**
     * @var string
     */
    private $rawMessage;
    /**
     * @var array{0:int, 1:int}|null
     */
    private $position = null;
    /**
     * @param class-string<BaseLinter> $linter
     * @param array{0:int, 1:int}|null $position
     */
    public function __construct(string $linter, string $fileBeingLinted, string $rawMessage, ?array $position = null, ?\Throwable $previous = null)
    {
        $this->linter = $linter;
        $this->fileBeingLinted = $fileBeingLinted;
        $this->rawMessage = $rawMessage;
        $this->position = $position;
        parent::__construct(
            Str\format("While running '%s' on '%s': %s", $linter, $fileBeingLinted, $rawMessage),
            /* code = */
            0,
            $previous
        );
    }
    /**
     * @return class-string<BaseLinter>
     */
    public function getLinterClass()
    {
        return $this->linter;
    }
    /**
     * @return string
     */
    public function getFileBeingLinted()
    {
        return $this->fileBeingLinted;
    }
    /**
     * @return string
     */
    public function getRawMessage()
    {
        return $this->rawMessage;
    }
    /**
     * @return array{0:int, 1:int}|null
     */
    public function getPosition()
    {
        return $this->position;
    }
}

