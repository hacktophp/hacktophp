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
/**
 * @template Terr as LineLintError
 *
 * @template-extends LineLinter<Terr>
 */
abstract class AutoFixingLineLinter extends LineLinter implements AutoFixingLinter
{
    use AutoFixingLinterTrait;
    /**
     * @return string
     */
    public abstract function getFixedLine(string $line);
    /**
     * @param iterable<mixed, Terr> $errors
     *
     * @return File
     */
    public final function getFixedFile(iterable $errors)
    {
        $lines = $this->getLinesFromFile();
        foreach ($errors as $err) {
            $i = $err->getPosition()[0] - 1;
            invariant($i >= 0, 'line number should never be negative');
            $original = $lines[$i];
            $lines[$i] = $this->getFixedLine($original);
        }
        return $this->getFile()->withContents(\implode("\n", $lines));
    }
}

