<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use HH\Lib\Str as Str;
final class SubprocessException extends \Exception
{
    /**
     * @var int
     */
    private $exitCode;
    /**
     * @var int
     */
    public function __construct(array $command, int $exitCode)
    {
        $this->exitCode = $exitCode;
        parent::__construct(Str\format('Command "%s" failed with exit code %d', \implode(' ', $command), $exitCode));
    }
    /**
     * @return int
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }
}

