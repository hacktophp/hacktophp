<?php
namespace Facebook\HHAST\__Private;

use Facebook\CLILib\ITerminal as ITerminal;
use Facebook\HHAST\Linters as Linters;
use HH\Lib\Vec as Vec;
final class LintRunJSONEventHandler implements LintRunEventHandler
{
    /**
     * @var array<int, mixed>
     */
    private $errors = array();
    /**
     * @var ITerminal
     */
    private $terminal;
    /**
     * @var ITerminal
     */
    public function __construct(ITerminal $terminal);
    /**
     * @param mixed $_config
     * @param Traversable<Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $_linter, $_config, Traversable $errors)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED> */
            function () use($_linter, $_config, $errors) : \Generator {
                $transformed_errors = self::transformErrors($errors);
                $this->errors = Vec\concat($this->errors, $transformed_errors);
                return LintAutoFixResult::SOME_UNFIXED;
            }
        );
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $_
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedFileAsync(string $_, $_);
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $_
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedRunAsync($_)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($_) : \Generator {
                (yield $this->terminal->getStdout()->writeAsync(\json_encode($this->getOutput())));
            }
        );
    }
    /**
     * @return mixed
     */
    private function getOutput()
    {
        return array('passed' => !$this->errors, 'errors' => $this->errors);
    }
    /**
     * @param Traversable<Linters\LintError> $errors
     *
     * @return array<int, mixed>
     */
    private static function transformErrors(Traversable $errors)
    {
        return \array_map(function ($error) use($range, $start, $end) {
            $range = $error->getRange();
            $start = $range[0] ?? null;
            $start = $start !== null ? array('line' => $start[0], 'character' => $start[1]) : null;
            $end = $range[1] ?? null;
            $end = $end !== null ? array('line' => $end[0], 'character' => $end[1]) : null;
            return array('path' => $error->getFile()->getPath(), 'range' => array('start' => $start, 'end' => $end), 'message' => $error->getDescription(), 'linter' => $error->getLinter()->getLinterName());
        }, $errors);
    }
}

