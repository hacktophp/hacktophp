<?php
namespace Facebook\HHAST\__Private;

use Facebook\HHAST\Linters as Linters;
use Facebook\TypeAssert as TypeAssert;
use HH\Lib\{C as C, Keyset as Keyset, Str as Str, Vec as Vec};
use Facebook\HHAST\Linters\BaseLinter as BaseLinter;
final class LintRunConfig
{
    /**
     * @var array<int, BaseLinter::class>
     */
    const DEFAULT_LINTERS = array(Linters\AsyncFunctionAndMethodLinter::class, Linters\CamelCasedMethodsUnderscoredFunctionsLinter::class, Linters\DontAwaitInALoopLinter::class, Linters\LicenseHeaderLinter::class, Linters\NewlineAtEndOfFileLinter::class, Linters\NoBasicAssignmentFunctionParameterLinter::class, Linters\MethodCallOnConstructorLinter::class, Linters\MustUseBracesForControlFlowLinter::class, Linters\MustUseOverrideAttributeLinter::class, Linters\NoPHPEqualityLinter::class, Linters\UnusedParameterLinter::class, Linters\UnusedUseClauseLinter::class, Linters\UseStatementWithLeadingBackslashLinter::class, Linters\UseStatementWithoutKindLinter::class, Linters\NoWhitespaceAtEndOfLineLinter::class);
    /**
     * @var array<int, BaseLinter::class>
     */
    const NON_DEFAULT_LINTERS = array(Linters\NoStringInterpolationLinter::class, Linters\StrictModeOnlyLinter::class, Linters\UseStatementWithAsLinter::class);
    /**
     * @param NamedLinterGroup::ALL_BUILTINS|NamedLinterGroup::DEFAULT_BUILTINS|NamedLinterGroup::NO_BUILTINS $group
     *
     * @return array<int, BaseLinter::class>
     */
    private static function getNamedLinterGroup($group)
    {
        switch ($group) {
            case NamedLinterGroup::NO_BUILTINS:
                return array();
            case NamedLinterGroup::DEFAULT_BUILTINS:
                return self::DEFAULT_LINTERS;
            case NamedLinterGroup::ALL_BUILTINS:
                return Vec\concat(self::DEFAULT_LINTERS, self::NON_DEFAULT_LINTERS);
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
     * @var mixed
     */
    private function __construct(string $projectRoot, $configFile);
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
        return new self(\getcwd(), array('roots' => array()));
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
        if ($roots !== array() && !C\any($roots, function ($root) use($file_path) {
            return Str\starts_with($file_path, $root);
        })) {
            return array('linters' => array(), 'autoFixBlacklist' => array());
        }
        $linters = $this->configFile['extraLinters'] ?? array();
        $blacklist = $this->configFile['disabledLinters'] ?? array();
        $autofix_blacklist = $this->configFile['disabledAutoFixes'] ?? array();
        $no_autofixes = $this->configFile['disableAllAutoFixes'] ?? false;
        foreach ($this->configFile['overrides'] ?? array() as $override) {
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
                return array('linters' => array(), 'autoFixBlacklist' => array());
            }
            $linters = Vec\concat($linters, $override['extraLinters'] ?? array());
            $blacklist = Vec\concat($blacklist, $override['disabledLinters'] ?? array());
            $autofix_blacklist = Vec\concat($autofix_blacklist, $override['disabledAutoFixes'] ?? array());
            $no_autofixes = $no_autofixes || ($override['disableAllAutoFixes'] ?? false);
        }
        $normalize = function ($list) {
            return Keyset\map($list, function ($linter) {
                return $this->getFullyQualifiedLinterName($linter);
            });
        };
        $linters = $normalize($linters);
        $blacklist = $normalize($blacklist);
        $autofix_blacklist = $normalize($autofix_blacklist);
        $linters = Keyset\union($linters, self::getNamedLinterGroup($this->configFile['builtinLinters'] ?? NamedLinterGroup::DEFAULT_BUILTINS));
        $linters = Keyset\diff($linters, $blacklist);
        if ($no_autofixes) {
            $autofix_blacklist = $linters;
        }
        $assert_types = function ($list) {
            return Keyset\map($list, function ($str) {
                return TypeAssert\classname_of(BaseLinter::class, $str);
            });
        };
        $linters = $assert_types($linters);
        $autofix_blacklist = $assert_types($autofix_blacklist);
        return array('linters' => $linters, 'autoFixBlacklist' => $autofix_blacklist);
    }
    /**
     * @return string
     */
    private function getFullyQualifiedLinterName(string $name)
    {
        $aliases = $this->configFile['namespaceAliases'] ?? array();
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
        $data = \json_decode($json, true, 512, \JSON_FB_LOOSE | \JSON_FB_HACK_ARRAYS);
        if ($data === null) {
            throw new \Exception('Failed to parse JSON in configuration file ' . $file);
        }
        try {
            return TypeAssert\matches_type_structure(type_structure(self::class, 'TConfigFile'), $data);
        } catch (TypeAssert\IncorrectTypeException $e) {
            throw new \Exception(Str\format('Invalid configuration file: %s
  %s', $file, $e->getMessage()));
        }
    }
}

