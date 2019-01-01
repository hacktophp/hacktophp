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

use HH\Lib\{C, Math, Str, Vec};
final class NewlineAtEndOfFileLinter extends BaseLinter implements AutoFixingLinter
{
    use AutoFixingLinterTrait;
    /**
     * @return \Sabre\Event\Promise<array<int, LintError>>
     */
    public function getLintErrorsAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, array<int, LintError>> */
            function () : \Generator {
                $contents = $this->getFile()->getContents();
                $fixed = $this->getFixedFile([])->getContents();
                if ($contents === $fixed) {
                    return [];
                }
                $trimmed = Str\trim_right($contents);
                $trailing = Str\slice($contents, \strlen($trimmed));
                $blame = \implode("\n", \array_slice(Math\maxva(0, \count(\explode("\n", $trimmed)) - 3), \explode("\n", $trimmed))) . $trailing;
                $lines = \count(\explode("\n", $contents));
                return [(new BuiltLintError($this, "Files should end with a single trailing newline"))->withPosition($lines, 0)->withBlameCode($blame)];
            }
        );
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_0)
    {
        $contents = $this->getFile()->getContents();
        if (Str\ends_with($contents, "\n")) {
            return "Remove extra trailing whitespace";
        }
        if (Str\trim_right($contents) === $contents) {
            return "Add trailing newline";
        }
        return "Replace trailng whitespace with newline";
    }
    /**
     * @param iterable<mixed, LintError> $_0
     *
     * @return File
     */
    public function getFixedFile(iterable $_0)
    {
        return $this->getFile()->withContents(Str\trim_right($this->getFile()->getContents()) . "\n");
    }
}

