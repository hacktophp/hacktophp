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
use HH\Lib\{C as C, Math as Math, Str as Str, Vec as Vec};
use Facebook\CLILib\{CLIWithArguments as CLIWithArguments, ExitException as ExitException};
use Facebook\CLILib\CLIOptions as CLIOptions;
final class LinterCLI extends CLIWithArguments
{
    /**
     * @var bool
     */
    private $xhprof = false;
    /**
     * @var LinterCLIMode::PLAIN|LinterCLIMode::JSON|LinterCLIMode::LSP
     */
    private $mode = LinterCLIMode::PLAIN;
    use CLIWithVerbosityTrait;
    /**
     * @return string
     */
    public static function getHelpTextForOptionalArguments()
    {
        return 'PATH';
    }
    /**
     * @return array<int, CLIOptions\CLIOption>
     */
    protected function getSupportedOptions()
    {
        return array(CLIOptions\flag(function () {
            return new ExitException(1, '--perf is no longer supported; consider --xhprof');
        }, '[unsupported]', '--perf'), CLIOptions\flag(function () {
            return $this->xhprof = true;
        }, 'Enable XHProf profiling', '--xhprof'), CLIOptions\with_required_enum(LinterCLIMode::class, function ($m) {
            return $this->mode = $m;
        }, 'Set the output mode; supported values are ' . \implode(' | ', LinterCLIMode::getValues()), '--mode', '-m'), CLIOptions\with_required_string(function ($_) {
        }, 'Name of the caller; intended for use with `--mode json` or `--mode lsp`', '--from'), $this->getVerbosityOption());
    }
    /**
     * @return \Sabre\Event\Promise<int>
     */
    public function mainAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                if ($this->xhprof) {
                    XHProf::enable();
                }
                $result = (yield $this->mainImplAsync());
                if ($this->xhprof) {
                    XHProf::disableAndDump(\STDERR);
                }
                return $result;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<int>
     */
    private function mainImplAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                $terminal = $this->getTerminal();
                if ($this->mode === LinterCLIMode::LSP) {
                    return (yield (new LSPImpl\Server($terminal))->mainAsync());
                }
                $err = $this->getStderr();
                $roots = $this->getArguments();
                if (C\is_empty($roots)) {
                    $config = LintRunConfig::getForPath(\getcwd());
                    $roots = $config->getRoots();
                    if (C\is_empty($roots)) {
                        (yield $err->writeAsync('You must either specify PATH arguments, or provide a configuration' . 'file.
'));
                        return 1;
                    }
                } else {
                    foreach ($roots as $root) {
                        $path = \realpath($root);
                        if (\is_dir($path)) {
                            $config_file = $path . '/hhast-lint.json';
                            if (\file_exists($config_file)) {
                                (yield $err->writeAsync('Warning: PATH arguments contain a hhast-lint.json, ' . 'which modifies the linters used and customizes behavior. ' . 'Consider \'cd ' . $root . '; vendor/bin/hhast-lint\'

'));
                            }
                        }
                    }
                    $config = null;
                }
                switch ($this->mode) {
                    case LinterCLIMode::PLAIN:
                        $error_handler = new LintRunCLIEventHandler($terminal);
                        break;
                    case LinterCLIMode::JSON:
                        $error_handler = new LintRunJSONEventHandler($terminal);
                        break;
                    case LinterCLIMode::LSP:
                        invariant_violation('should have returned earlier');
                }
                try {
                    $result = (yield (new LintRun($config, $error_handler, $roots))->runAsync());
                } catch (Linters\LinterException $e) {
                    $orig = $e->getPrevious() ?? $e;
                    $err = $terminal->getStderr();
                    $pos = $e->getPosition();
                    (yield $err->writeAsync(Str\format('A linter threw an exception:
  Linter: %s
  File: %s%s
', $e->getLinterClass(), \realpath($e->getFileBeingLinted()), $pos === null ? '' : Str\format(':%d:%d', $pos[0], $pos[1] + 1))));
                    if ($pos !== null && \is_readable($e->getFileBeingLinted())) {
                        list($line, $column) = $pos;
                        $content = \file_get_contents($e->getFileBeingLinted());
                        (yield $err->writeAsync(Str\format('%s
      %s^ HERE
', \implode('
', \array_map(function ($line) {
                            return '    > ' . $line;
                        }, Vec\slice(Vec\take(\explode('
', \file_get_contents($e->getFileBeingLinted())), $line), Math\maxva($line - 3, 0)))), Str\repeat(' ', $column))));
                    }
                    (yield $err->writeAsync(Str\format('  Exception: %s
' . '  Message: %s
', \get_class($orig), $orig->getMessage())));
                    (yield $err->writeAsync('  Trace:
' . \implode('
', \array_map(function ($line) {
                        return '    ' . $line;
                    }, \explode('
', $orig->getTraceAsString()))) . '

'));
                    return 2;
                }
                switch ($result) {
                    case LintRunResult::NO_ERRORS:
                    case LintRunResult::HAD_AUTOFIXED_ERRORS:
                        return 0;
                    case LintRunResult::HAVE_UNFIXED_ERRORS:
                        return 1;
                }
            }
        );
    }
}

