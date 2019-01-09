<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use function Facebook\HHAST\__Private\get_typechecker_errors;

use HH\Lib\{C, Keyset, Vec};
trait TypeErrorMigrationTrait
{
    /**
     * @var string
     */
    private $root;
    public function __construct(string $root)
    {
        $this->root = $root;
    }
    /**
     * @param array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>} $in
     *
     * @return bool
     */
    protected static abstract function filterTypecheckerError(array $in);
    /**
     * @return array<int, array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>}>
     */
    private final function getTypecheckerErrors()
    {
        return \array_filter(get_typechecker_errors($this->root), function ($error) {
            return static::filterTypecheckerError($error);
        });
    }
    /**
     * @return array<int, array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>}>
     */
    protected final function getTypecheckerErrorsForFile(string $file)
    {
        return \array_filter($this->getTypecheckerErrors(), function ($error) use($file) {
            return C\firstx($error['message'])['path'] === $file;
        });
    }
    /**
     * @return array<string, string>
     */
    public final function getFilePathsToMigrate()
    {
        return Keyset\map($this->getTypecheckerErrors(), function ($error) {
            return C\firstx($error['message'])['path'];
        });
    }
}

