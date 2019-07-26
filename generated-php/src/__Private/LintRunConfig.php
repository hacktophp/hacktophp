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

use Facebook\{HHAST, TypeAssert};
use HH\Lib\{C, Keyset, Str, Vec};
use Facebook\HHAST\BaseLinter;
final class LintRunConfig
{
    /**
     * @var array<int, class-string<BaseLinter>>
     */
    const DEFAULT_LINTERS = [HHAST\AsyncFunctionAndMethodLinter::class, HHAST\CamelCasedMethodsUnderscoredFunctionsLinter::class, HHAST\DontAwaitInALoopLinter::class, HHAST\LicenseHeaderLinter::class, HHAST\NewlineAtEndOfFileLinter::class, HHAST\NoBasicAssignmentFunctionParameterLinter::class, HHAST\MethodCallOnConstructorLinter::class, HHAST\MustUseBracesForControlFlowLinter::class, HHAST\MustUseOverrideAttributeLinter::class, HHAST\NoElseifLinter::class, HHAST\NoPHPEqualityLinter::class, HHAST\UnusedParameterLinter::class, HHAST\UnusedUseClauseLinter::class, HHAST\UseStatementWithLeadingBackslashLinter::class, HHAST\UseStatementWithoutKindLinter::class, HHAST\GroupUseStatementsLinter::class, HHAST\GroupUseStatementAlphabetizationLinter::class, HHAST\NoWhitespaceAtEndOfLineLinter::class];
    /**
     * @var array<int, class-string<BaseLinter>>
     */
    const NON_DEFAULT_LINTERS = [HHAST\NoStringInterpolationLinter::class, HHAST\StrictModeOnlyLinter::class, HHAST\UseStatementWithAsLinter::class];
    /**
     * @param NamedLinterGroup::ALL_BUILTINS|NamedLinterGroup::DEFAULT_BUILTINS|NamedLinterGroup::NO_BUILTINS $group
     *
     * @return array<int, class-string<BaseLinter>>
     */
    private static function getNamedLinterGroup($group)
    {
        switch ($group) {
            case NamedLinterGroup::NO_BUILTINS:
                return [];
            case NamedLinterGroup::DEFAULT_BUILTINS:
                return self::DEFAULT_LINTERS;
            case NamedLinterGroup::ALL_BUILTINS:
                return \array_merge(self::NON_DEFAULT_LINTERS, self::DEFAULT_LINTERS);
        }
    }
    /**
     * @var string
     */
    private $projectRoot;
    /**
     * @var mixed
     */
    private $configFile;
    /**
     * @param mixed $configFile
     */
    private function __construct(string $projectRoot, $configFile)
    {
        $this->projectRoot = $projectRoot;
        $this->configFile = $configFile;
    }
    /**
     * @return static
     */
    private static function getFromConfigFile(string $path)
    {
        return new self(\dirname($path), self::getConfigFromFile($path));
    }
    /**
     * @return static
     */
    private static function getDefault()
    {
        return new self(\getcwd(), ['roots' => []]);
    }
    /**
     * @return static
     */
    public static function getForPath(string $path)
    {
        $path = \realpath($path);
        if (\is_dir($path)) {
            return self::getForPathImpl($path);
        }
        return self::getForPathImpl(\dirname($path));
    }
    /**
     * @return static
     */
    private static function getForPathImpl(string $path)
    {
        if ($path === '') {
            return self::getDefault();
        }
        $config_file = $path . '/hhast-lint.json';
        if (\file_exists($config_file)) {
            return self::getFromConfigFile($config_file);
        }
        return self::getForPathImpl(\implode('/', Vec\take(\explode('/', $path), \count(\explode('/', $path)) - 1)));
    }
    /**
     * @return array<int, string>
     */
    public function getRoots()
    {
        return \array_map(function ($dir) {
            return $this->projectRoot . '/' . $dir;
        }, $this->configFile['roots']);
    }
    /**
     * @return mixed
     */
    public function getConfigForFile(string $file_path)
    {
        $roots = \array_map(function ($s) {
            return Str\strip_suffix($s, '/') . '/';
        }, $this->configFile['roots']);
        $file_path = Str\strip_prefix($file_path, $this->projectRoot . '/');
        if ($roots !== [] && !C\any($roots, function ($root) use($file_path) {
            return Str\starts_with($file_path, $root);
        })) {
            return ['linters' => [], 'autoFixBlacklist' => []];
        }
        $builtin_linters = $this->configFile['builtinLinters'] ?? NamedLinterGroup::DEFAULT_BUILTINS;
        $linters = $this->configFile['extraLinters'] ?? [];
        $blacklist = $this->configFile['disabledLinters'] ?? [];
        $autofix_blacklist = $this->configFile['disabledAutoFixes'] ?? [];
        $no_autofixes = $this->configFile['disableAllAutoFixes'] ?? false;
        foreach ($this->configFile['overrides'] ?? [] as $override) {
            $matches = false;
            foreach ($override['patterns'] as $pattern) {
                if (\fnmatch($pattern, $file_path)) {
                    $matches = true;
                    break;
                }
            }
            if (!$matches) {
                continue;
            }
            if ($override['disableAllLinters'] ?? false) {
                return ['linters' => [], 'autoFixBlacklist' => []];
            }
            if (Shapes::keyExists($override, 'builtinLinters')) {
                $builtin_linters = $override['builtinLinters'];
            }
            $linters = \array_merge($override['extraLinters'] ?? [], $linters);
            $blacklist = \array_merge($override['disabledLinters'] ?? [], $blacklist);
            $autofix_blacklist = \array_merge($override['disabledAutoFixes'] ?? [], $autofix_blacklist);
            $no_autofixes = $no_autofixes || ($override['disableAllAutoFixes'] ?? false);
        }
        $normalize = function (array $list) {
            return Keyset\map($list, function ($linter) {
                return $this->getFullyQualifiedLinterName($linter);
            });
        };
        $linters = $normalize($linters);
        $blacklist = $normalize($blacklist);
        $autofix_blacklist = $normalize($autofix_blacklist);
        $linters = Keyset\union($linters, self::getNamedLinterGroup($builtin_linters));
        $linters = Keyset\diff($linters, $blacklist);
        if ($no_autofixes) {
            $autofix_blacklist = $linters;
        }
        $assert_types = function (array $list) {
            return Keyset\map($list, function ($str) {
                return TypeAssert\classname_of(BaseLinter::class, $str);
            });
        };
        $linters = $assert_types($linters);
        $autofix_blacklist = $assert_types($autofix_blacklist);
        return ['linters' => $linters, 'autoFixBlacklist' => $autofix_blacklist];
    }
    /**
     * @return string
     */
    private function getFullyQualifiedLinterName(string $name)
    {
        if (Str\starts_with($name, "Facebook\\HHAST\\Linters")) {
            $name = "Facebook\\HHAST" . Str\strip_prefix($name, "Facebook\\HHAST\\Linters");
        }
        $aliases = $this->configFile['namespaceAliases'] ?? [];
        if (C\is_empty($aliases)) {
            return $name;
        }
        foreach ($aliases as $alias => $ns) {
            $alias = $alias . '\\';
            if (Str\starts_with($name, $alias)) {
                return $ns . '\\' . Str\strip_prefix($name, $alias);
            }
        }
        return $name;
    }
    /**
     * @return mixed
     */
    private static function getConfigFromFile(string $file)
    {
        $json = \file_get_contents($file);
        $data = \json_decode(
            $json,
            /* as array = */
            true,
            /* depth = [default] */
            512,
            \JSON_FB_LOOSE | \JSON_FB_HACK_ARRAYS
        );
        if ($data === null) {
            throw new \Exception('Failed to parse JSON in configuration file ' . $file);
        }
        try {
            return TypeAssert\matches_type_structure(type_structure(self::class, 'TConfigFile'), $data);
        } catch (TypeAssert\IncorrectTypeException $e) {
            throw new \Exception(Str\format("Invalid configuration file: %s\n  %s", $file, $e->getMessage()));
        }
    }
}

