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

use Facebook\CLILib\CLIBase;
use Facebook\CLILib\CLIOptions;
trait CLIWithVerbosityTrait
{
    /**
     * @var int
     */
    protected $verbosity = 0;
    /**
     * @param \HH\FormatString<\PlainSprintf> $format
     * @param mixed ...$args
     *
     * @return void
     */
    protected function verbosePrintf(int $level, \HH\FormatString $format, ...$args)
    {
        if ($this->verbosity < $level) {
            return;
        }
        print \vsprintf($format, $args);
    }
    /**
     * @return CLIOptions\CLIOption
     */
    protected function getVerbosityOption()
    {
        return CLIOptions\flag(function () {
            $this->verbosity++;
        }, 'Increase output verbosity', '--verbose', '-v');
    }
}

