<?php
namespace Facebook\HHAST\__Private;

use Facebook\CLILib\ITerminal as ITerminal;
use Facebook\DiffLib\{CLIColoredUnifiedDiff as CLIColoredUnifiedDiff, StringDiff as StringDiff};
use Facebook\HHAST\Linters as Linters;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
final class LintRunCLIEventHandler implements LintRunEventHandler
{
    /**
     * @var AsyncQueue
     */
    private $interactivityQueue;
    /**
     * @var ITerminal
     */
    private $terminal;
    /**
     * @var ITerminal
     */
    public function __construct(ITerminal $terminal)
    {
        $this->terminal = $terminal;
        $this->interactivityQueue = new AsyncQueue();
    }
    /**
     * @param mixed $config
     * @param Traversable<Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $linter, $config, Traversable $errors)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED> */
            function () use($linter, $config, $errors) : \Generator {
                if (!$this->terminal->isInteractive()) {
                    return (yield $this->linterRaisedErrorsImplAsync($linter, $config, $errors));
                }
                return (yield $this->interactivityQueue->enqueueAndWaitForAsync(function () use($linter, $config, $errors) {
                    return (yield $this->linterRaisedErrorsImplAsync($linter, $config, $errors));
                }));
            }
        );
    }
    /**
     * @param mixed $config
     * @param Traversable<Linters\LintError> $errors
     *
     * @return \Sabre\Event\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    private function linterRaisedErrorsImplAsync(Linters\BaseLinter $linter, $config, Traversable $errors)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED> */
            function () use($linter, $config, $errors) : \Generator {
                $class = \get_class($linter);
                $to_fix = array();
                $result = LintAutoFixResult::ALL_FIXED;
                $colors = $this->terminal->supportsColors();
                $fixing_linter = $linter instanceof Linters\AutoFixingLinter && !C\contains_key($config['autoFixBlacklist'], $class) ? $linter : null;
                foreach ($errors as $error) {
                    $position = $error->getPosition();
                    (yield $this->terminal->getStdout()->writeAsync(Str\format('%s%s%s
' . '  %sLinter: %s%s
' . '  Location: %s
', $colors ? 'e[1;31m' : '', $error->getDescription(), $colors ? 'e[0m' : '', $colors ? 'e[90m' : '', \get_class($error->getLinter()), $colors ? 'e[0m' : '', $position === null ? $error->getFile()->getPath() : Str\format('%s:%d:%d', $error->getFile()->getPath(), $position[0], $position[1]))));
                    if ($fixing_linter) {
                        $should_fix = (yield $this->shouldFixLintAsync($fixing_linter, $error));
                        if ($should_fix) {
                            $to_fix[] = $error;
                        } else {
                            $result = LintAutoFixResult::SOME_UNFIXED;
                        }
                        continue;
                    }
                    (yield $this->renderLintBlameAsync($error));
                    $result = LintAutoFixResult::SOME_UNFIXED;
                }
                if (!C\is_empty($to_fix)) {
                    invariant($fixing_linter, 'Can\'t fix without a fixing linter');
                    self::fixErrors($fixing_linter, $to_fix);
                }
                return $result;
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
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $result
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function finishedRunAsync($result)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($result) : \Generator {
                if ($result === LintRunResult::NO_ERRORS) {
                    (yield $this->terminal->getStdout()->writeAsync('No errors.
'));
                }
            }
        );
    }
    /**
     * @psalm-template Terror as \Facebook\HHAST\__Private\Linters\LintError
     *
     * @param Linters\AutoFixingLinter<Terror> $linter
     * @param array<int, Terror> $errors
     *
     * @return void
     */
    private static function fixErrors(Linters\AutoFixingLinter $linter, array $errors)
    {
        invariant($linter instanceof Linters\AutoFixingLinter, '%s is not an auto-fixing-linter', \get_class($linter));
        $file = $linter->getFixedFile($errors);
        \file_put_contents($file->getPath(), $file->getContents());
    }
    /**
     * @psalm-template Terror as \Facebook\HHAST\__Private\Linters\LintError
     *
     * @param Linters\AutoFixingLinter<Terror> $linter
     * @param Terror $error
     *
     * @return \Sabre\Event\Promise<bool>
     */
    private function shouldFixLintAsync(Linters\AutoFixingLinter $linter, $error)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, bool> */
            function () use($linter, $error) : \Generator {
                $old = $linter->getFile()->getContents();
                $new = $linter->getFixedFile(array($error))->getContents();
                if ($old === $new) {
                    (yield $this->renderLintBlameAsync($error));
                    return false;
                }
                if ($this->terminal->supportsColors()) {
                    (yield $this->terminal->getStdout()->writeAsync(CLIColoredUnifiedDiff::create($old, $new)));
                } else {
                    (yield $this->terminal->getStdout()->writeAsync(StringDiff::lines($old, $new)->getUnifiedDiff()));
                }
                if (!$this->terminal->isInteractive()) {
                    return false;
                }
                static $cache = array();
                $cache_key = \get_class($error->getLinter());
                if (C\contains_key($cache, $cache_key)) {
                    $should_fix = $cache[$cache_key];
                    (yield $this->terminal->getStdout()->writeAsync(Str\format('Would you like to apply this fix?
  <%s to all>
', $should_fix ? 'yes' : 'no')));
                    return $should_fix;
                }
                $response = null;
                do {
                    (yield $this->terminal->getStdout()->writeAsync('e[94mWould you like to apply this fix?e[0m
' . '  e[37m[y]es/[N]o/yes to [a]ll/n[o] to all:e[0m '));
                    $response = (yield $this->terminal->getStdin()->readLineAsync());
                    $response = Str\trim($response);
                    switch ($response) {
                        case 'a':
                            $cache[$cache_key] = true;
                        case 'y':
                            return true;
                        case 'o':
                            $cache[$cache_key] = false;
                        case 'n':
                        case '':
                            return false;
                        default:
                            (yield $this->terminal->getStderr()->writeAsync(Str\format('\'%s\' is not a valid response.
', $response)));
                            $response = null;
                    }
                } while ($response === null);
                return false;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    private function renderLintBlameAsync(Linters\LintError $error)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($error) : \Generator {
                $blame = $error->getPrettyBlame();
                if ($blame === null) {
                    return;
                }
                $colors = $this->terminal->supportsColors();
                (yield $this->terminal->getStdout()->writeAsync(Str\format('  Code:
%s%s%s
', $colors ? 'e[33m' : '', \implode('
', \array_map(function ($line) {
                    return '  >' . $line;
                }, \explode('
', $blame))), $colors ? 'e[0m' : '')));
            }
        );
    }
}

