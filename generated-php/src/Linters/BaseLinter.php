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

use HH\Lib\{C, Str};
abstract class BaseLinter
{
    /**
     * @return \Amp\Promise<array<int, LintError>>
     */
    public abstract function getLintErrorsAsync();
    /**
     * @return bool
     */
    public static function shouldLintFile(File $_0)
    {
        return true;
    }
    /**
     * @var File
     */
    private $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }
    /**
     * @return static
     */
    public static final function fromPath(string $path)
    {
        return new static(new File($path, \file_get_contents($path)));
    }
    /**
     * @return File
     */
    public final function getFile()
    {
        return $this->file;
    }
    /**
     * @return string
     */
    public function getLinterName()
    {
        return Str\strip_suffix(C\lastx(\explode('\\', static::class)), 'Linter');
    }
    /**
     * A user can choose to ignore all errors reported by this linter for a
     * whole file using this string as a marker
     */
    /**
     * @return string
     */
    public function getIgnoreAllMarker()
    {
        return 'HHAST_IGNORE_ALL[' . $this->getLinterName() . ']';
    }
    /**
     * A user can choose to ignore a specific error reported by this linter
     * using this string as a marker
     */
    /**
     * @return string
     */
    public function getIgnoreSingleErrorMarker()
    {
        return 'HHAST_IGNORE_ERROR[' . $this->getLinterName() . ']';
    }
    /**
     * A user can choose to ignore a specific error reported by this linter
     * using this string as a marker.
     *
     * The difference to HHAST_IGNORE_ERROR is that we expect this one to be
     * fixed.
     */
    /**
     * @return string
     */
    public function getFixmeMarker()
    {
        return 'HHAST_FIXME[' . $this->getLinterName() . ']';
    }
    /**
     * @return bool
     */
    public function isLinterSuppressedForFile()
    {
        return Str\contains($this->getFile()->getContents(), $this->getIgnoreAllMarker());
    }
}

