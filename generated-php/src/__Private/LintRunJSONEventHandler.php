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

use Facebook\CLILib\ITerminal;
use Facebook\HHAST\Linters;
use HH\Lib\Vec;
final class LintRunJSONEventHandler implements LintRunEventHandler
{
    /**
     * @var array<int, mixed>
     */
    private $errors = [];
    /**
     * @var ITerminal
     */
    private $terminal;
    /**
     * @var ITerminal
     */
    public function __construct(ITerminal $terminal)
    {
    }
    /**
     * @param mixed $_config
     * @param iterable<mixed, Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $_linter, $_config, iterable $errors)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED> */
            function () use($_linter, $_config, $errors) : \Generator {
                $transformed_errors = self::transformErrors($errors);
                $this->errors = \array_merge($transformed_errors, $this->errors);
                return LintAutoFixResult::SOME_UNFIXED;
            }
        );
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $_1
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedFileAsync(string $_0, $_1)
    {
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $_0
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedRunAsync($_0)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($_0) : \Generator {
                (yield $this->terminal->getStdout()->writeAsync(\json_encode($this->getOutput())));
            }
        );
    }
    /**
     * @return mixed
     */
    private function getOutput()
    {
        return ['passed' => !$this->errors, 'errors' => $this->errors];
    }
    /**
     * @param iterable<mixed, Linters\LintError> $errors
     *
     * @return array<int, mixed>
     */
    private static function transformErrors(iterable $errors)
    {
        return \array_map(function ($error) use($range, $start, $end) {
            $range = $error->getRange();
            $start = $range[0] ?? null;
            $start = $start !== null ? ['line' => $start[0], 'character' => $start[1]] : null;
            $end = $range[1] ?? null;
            $end = $end !== null ? ['line' => $end[0], 'character' => $end[1]] : null;
            return ['path' => $error->getFile()->getPath(), 'range' => ['start' => $start, 'end' => $end], 'message' => $error->getDescription(), 'linter' => $error->getLinter()->getLinterName()];
        }, $errors);
    }
}

