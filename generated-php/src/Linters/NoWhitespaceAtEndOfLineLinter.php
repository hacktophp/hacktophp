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
final class NoWhitespaceAtEndOfLineLinter extends AutoFixingLineLinter
{
    /**
     * @return string
     */
    public function getTitleForFix(LineLintError $_)
    {
        return 'Remove trailing whitespace';
    }
    /**
     * @return iterable<mixed, LineLintError>
     */
    public function getLintErrorsForLine(string $line, int $line_number)
    {
        $errs = [];
        for ($i = \strlen($line) - 1; $i >= 0; $i--) {
            $char = $line[$i];
            if ($char !== ' ') {
                break;
            }
            $errs[] = new LineLintError($this, 'trailing whitespace at end of line', [$line_number + 1, $i + 1]);
            break;
        }
        return $errs;
    }
    /**
     * @return string
     */
    public function getFixedLine(string $line)
    {
        return Str\trim_right($line, ' ');
    }
}

