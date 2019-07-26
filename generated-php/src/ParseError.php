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

use HH\Lib\Str;
abstract class ParseError extends \Exception
{
    /**
     * @var string
     */
    private $targetFile;
    /**
     * @var string
     */
    private $rawMessage;
    public function __construct(string $targetFile, ?int $_offset, string $rawMessage)
    {
        $this->targetFile = $targetFile;
        $this->rawMessage = $rawMessage;
        parent::__construct(Str\format('In file "%s": %s', $targetFile, $rawMessage));
    }
    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->targetFile;
    }
    /**
     * @return string
     */
    public function getRawMessage()
    {
        return $this->rawMessage;
    }

    public function setPrevious(\Throwable $e) {

    }
}
