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

use Facebook\HHAST\__Private\LSP;
/**
 * @template Terror as LintError
 */
interface AutoFixingLinter
{
    /**
     * @return \Sabre\Event\Promise<iterable<mixed, Terror>>
     */
    public function getLintErrorsAsync();
    /**
     * @param iterable<mixed, Terror> $errors
     *
     * @return File
     */
    public function getFixedFile(iterable $errors);
    /**
     * @param Terror $error
     *
     * @return string
     */
    protected function getTitleForFix($error);
    /**
     * @param Terror $error
     *
     * @return null|LSP\CodeAction
     */
    public function getCodeActionForError($error);
}

