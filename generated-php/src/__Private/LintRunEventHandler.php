<?php
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
     * @param Traversable<Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $linter, $config, Traversable $errors);
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

