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

use Facebook\HHAST\Linters as Linters;
/**
 * Interface for creating custom handlers for lint errors that are found during
 * a hhast-lint run. Some examples of hander actions are generating human
 * readable output and diffs, interactive autofixing, JSON-formatted output for
 * IDEs etc.
 */
interface LintRunEventHandler
{
    /**
     * Process a set of errors returned by running an individual linter on a
     * single file
     */
    /**
     * @param mixed $config
     * @param iterable<mixed, Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $linter, $config, iterable $errors);
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $result
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedFileAsync(string $path, $result);
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $result
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedRunAsync($result);
}

