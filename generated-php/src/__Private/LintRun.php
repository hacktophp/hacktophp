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

use Facebook\HHAST\Linters\{BaseLinter, File, LinterException};
use Facebook\CLILib\ExitException;
use HH\Lib\{C, Str, Vec};
final class LintRun
{
    /**
     * @var array<string, File>
     */
    private $files = [];
    /**
     * @var null|LintRunConfig
     */
    private $config;
    /**
     * @var LintRunEventHandler
     */
    private $handler;
    /**
     * @var array<int, string>
     */
    private $paths;
    /**
     * @param array<int, string> $paths
     */
    public function __construct(?LintRunConfig $config, LintRunEventHandler $handler, array $paths)
    {
        $this->config = $config;
        $this->handler = $handler;
        $this->paths = $paths;
    }
    /**
     * @return static
     */
    public function withFile(File $file)
    {
        $this->files[$file->getPath()] = $file;
        return $this;
    }
    /**
     * @return File
     */
    private function getFileForPath(string $path)
    {
        return $this->files[$path] ?? new File($path, \file_get_contents($path));
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS ...$results
     *
     * @return LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS
     */
    private static function worstResult(...$results)
    {
        $results = (array) $results;
        if (C\contains($results, LintRunResult::HAVE_UNFIXED_ERRORS)) {
            return LintRunResult::HAVE_UNFIXED_ERRORS;
        }
        if (C\contains($results, LintRunResult::HAD_AUTOFIXED_ERRORS)) {
            return LintRunResult::HAD_AUTOFIXED_ERRORS;
        }
        invariant($results === [LintRunResult::NO_ERRORS => LintRunResult::NO_ERRORS], 'Got unexpected results');
        return LintRunResult::NO_ERRORS;
    }
    /**
     * @return \Sabre\Event\Promise<LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS>
     */
    public function runAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS> */
            function () : \Generator {
                $results = (yield Vec\map_async($this->paths, function ($path) use($config) {
                    $config = $this->config ?? LintRunConfig::getForPath($path);
                    return (yield $this->lintPathAsync($config, $path));
                }));
                $result = self::worstResult(...$results);
                (yield $this->handler->finishedRunAsync($result));
                return $result;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS>
     */
    private function lintFileAsync(LintRunConfig $config, File $file)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS> */
            function () use($config, $file) : \Generator {
                $config = $config->getConfigForFile($file->getPath());
                $result = LintRunResult::NO_ERRORS;
                foreach ($config['linters'] as $class) {
                    try {
                        /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                        $this_result = (yield $this->runLinterOnFileImplAsync($config, $class, $file));
                        $result = self::worstResult($result, $this_result);
                    } catch (LinterException $e) {
                        throw $e;
                    } catch (\Throwable $t) {
                        throw new LinterException($class, $file->getPath(), $t->getMessage(), null, $t);
                    }
                }
                (yield $this->handler->finishedFileAsync($file->getPath(), $result));
                return $result;
            }
        );
    }
    /**
     * @param mixed $config
     * @param class-string<BaseLinter> $linter
     *
     * @return \Sabre\Event\Promise<LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS>
     */
    private function runLinterOnFileImplAsync($config, string $linter, File $file)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS> */
            function () use($config, $linter, $file) : \Generator {
                if (!$linter::shouldLintFile($file)) {
                    return LintRunResult::NO_ERRORS;
                }
                $linter = new $linter($file);
                if ($linter->isLinterSuppressedForFile()) {
                    return LintRunResult::NO_ERRORS;
                }
                try {
                    $errors = (yield $linter->getLintErrorsAsync());
                } catch (\Throwable $t) {
                    throw $t;
                } catch (\Exception $e) {
                    throw $e;
                }
                if (!$errors) {
                    return LintRunResult::NO_ERRORS;
                }
                $result = (yield $this->handler->linterRaisedErrorsAsync($linter, $config, $errors));
                return $result === LintAutoFixResult::ALL_FIXED ? LintRunResult::HAD_AUTOFIXED_ERRORS : LintRunResult::HAVE_UNFIXED_ERRORS;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS>
     */
    private function lintDirectoryAsync(LintRunConfig $config, string $path)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS> */
            function () use($config, $path) : \Generator {
                $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
                $files = [];
                foreach ($it as $info) {
                    if (!$info->isFile()) {
                        continue;
                    }
                    $ext = Str\lowercase($info->getExtension());
                    if ($ext === 'hh' || $ext === 'php' || $ext === 'hack' || $ext === 'hck') {
                        $files[] = $this->getFileForPath($info->getPathname());
                    }
                }
                $results = (yield Vec\map_async($files, function ($file) use($config) {
                    return (yield $this->lintFileAsync($config, $file));
                }));
                return self::worstResult(...$results);
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS>
     */
    private function lintPathAsync(LintRunConfig $config, string $path)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS> */
            function () use($config, $path) : \Generator {
                if (\is_file($path)) {
                    $file = $this->getFileForPath($path);
                    return (yield $this->lintFileAsync($config, $file));
                } else {
                    if (\is_dir($path)) {
                        return (yield $this->lintDirectoryAsync($config, $path));
                    } else {
                        throw new ExitException(1, Str\format("'%s' doesn't appear to be a file or directory, bailing", $path));
                    }
                }
            }
        );
    }
}

