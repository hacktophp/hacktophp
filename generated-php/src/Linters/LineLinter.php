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

use Facebook\HHAST\Linters\{BaseLinter};
use HH\Lib\{C, Str, Vec};
/**
 * @template Terror as LineLintError
 */
abstract class LineLinter extends BaseLinter
{
    /**
     * @return array<int, string>
     */
    public function getLinesFromFile()
    {
        $code = $this->getFile()->getContents();
        $lines = \explode("\n", $code);
        return (array) $lines;
    }
    /**
     * @return null|string
     */
    public function getLine(int $l)
    {
        return idx($this->getLinesFromFile(), $l);
    }
    /**
     * @return \Amp\Promise<array<int, Terror>>
     */
    public function getLintErrorsAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, array<int, Terror>> */
            function () : \Generator {
                $lines = $this->getLinesFromFile();
                $errs = [];
                foreach ($lines as $ln => $line) {
                    $line_errors = (array) $this->getLintErrorsForLine($line, $ln);
                    if (C\is_empty($line_errors)) {
                        continue;
                    }
                    // We got an error. Let's check the previous line to see if it is marked as ignorable
                    if ($ln - 1 >= 0 && $this->isLinterSuppressed($lines[$ln - 1])) {
                        continue;
                    }
                    $errs = \array_merge($line_errors, $errs);
                }
                return $errs;
            }
        );
    }
    /** Check if this linter has been disabled by a comment on the previous line.
     */
    /**
     * @return bool
     */
    protected function isLinterSuppressed(string $previous_line)
    {
        return Str\contains($previous_line, $this->getFixmeMarker()) || Str\contains($previous_line, $this->getIgnoreSingleErrorMarker());
    }
    /** Parse a single line of code and attempts to find lint errors */
    /**
     * @return iterable<mixed, Terror>
     */
    public abstract function getLintErrorsForLine(string $line, int $line_number);
}

