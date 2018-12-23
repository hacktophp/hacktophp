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

use Facebook\HHAST as HHAST;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
use Facebook\HHAST\Migrations\{AddFixMesMigration as AddFixMesMigration, AssertToExpectMigration as AssertToExpectMigration, BaseMigration as BaseMigration, CallTimePassByReferenceMigration as CallTimePassByReferenceMigration, HSLMigration as HSLMigration, IMigrationWithFileList as IMigrationWithFileList, ImplicitShapeSubtypesMigration as ImplicitShapeSubtypesMigration, IsRefinementMigration as IsRefinementMigration, OptionalShapeFieldsMigration as OptionalShapeFieldsMigration, NamespaceFallbackMigration as NamespaceFallbackMigration, PHPLessThanGreaterThanOperatorMigration as PHPLessThanGreaterThanOperatorMigration, PHPUnitToHackTestMigration as PHPUnitToHackTestMigration};
use Facebook\CLILib\CLIWithRequiredArguments as CLIWithRequiredArguments;
use Facebook\CLILib\CLIOptions as CLIOptions;
class MigrationCLI extends CLIWithRequiredArguments
{
    use CLIWithVerbosityTrait;
    const VERBOSE_SKIP_BECAUSE_GIT = 2;
    const VERBOSE_SKIP_BECAUSE_NOT_HACK = 1;
    const VERBOSE_SKIP_BECAUSE_VENDOR = 1;
    const VERBOSE_MIGRATE = 2;
    const VERBOSE_MIGRATE_NOT_HACK = 1;
    /**
     * @var array<BaseMigration::class, BaseMigration::class>
     */
    protected $migrations = array();
    /**
     * @var bool
     */
    private $includeVendor = false;
    /**
     * @var bool
     */
    private $xhprof = false;
    /**
     * @return array<int, string>
     */
    public static final function getHelpTextForRequiredArguments()
    {
        return array('PATH');
    }
    /**
     * @return array<int, CLIOptions\CLIOption>
     */
    protected function getSupportedOptions()
    {
        return array(CLIOptions\flag(function () {
            return $this->migrations[] = HSLMigration::class;
        }, 'Convert PHP standard library calls to HSL', '--hsl'), CLIOptions\flag(function () {
            return $this->migrations[] = AssertToExpectMigration::class;
        }, 'Change assert calls to expect ', '--assert-to-expect'), CLIOptions\flag(function () {
            return $this->migrations[] = ImplicitShapeSubtypesMigration::class;
        }, 'Allow implicit structural subtyping of all shapes', '--implicit-shape-subtypes'), CLIOptions\flag(function () {
            return $this->migrations[] = OptionalShapeFieldsMigration::class;
        }, 'Migrate nullable shape fields to be both nullable and optional', '--optional-shape-fields'), CLIOptions\flag(function () {
            $this->migrations[] = OptionalShapeFieldsMigration::class;
            $this->migrations[] = ImplicitShapeSubtypesMigration::class;
        }, 'Apply all migrations for moving from 3.22 to 3.23', '--hhvm-3.22-to-3.23'), CLIOptions\flag(function () {
            return $this->migrations[] = CallTimePassByReferenceMigration::class;
        }, 'Add required ampersands at call sites for byref arguments', '--ctpbr'), CLIOptions\flag(function () {
            return $this->migrations[] = CallTimePassByReferenceMigration::class;
        }, 'Apply all migrations for moving from 3.23 to 3.24', '--hhvm-3.23-to-3.24'), CLIOptions\flag(function () {
            return $this->migrations[] = PHPLessThanGreaterThanOperatorMigration::class;
        }, 'Replace <> with != (no semantic change', '--ltgt-to-ne'), CLIOptions\flag(function () {
            return $this->migrations[] = PHPLessThanGreaterThanOperatorMigration::class;
        }, 'Apply all migrations for moving from 3.28 to 3.29', '--hhvm-3.28-to-3.29'), CLIOptions\flag(function () {
            return $this->migrations[] = IsRefinementMigration::class;
        }, 'Replace is_foo() with is expressions', '--is-refinement'), CLIOptions\flag(function () {
            return $this->migrations[] = IsRefinementMigration::class;
        }, 'Apply all migrations for moving from 3.29 to 3.30', '--hhvm-3.29-to-3.30'), CLIOptions\flag(function () {
            return $this->migrations[] = NamespaceFallbackMigration::class;
        }, 'Add leading \\ to calls to unqualified references to global ' . 'functions or constants', '--no-namespace-fallback'), CLIOptions\flag(function () {
            return $this->migrations[] = PHPUnitToHackTestMigration::class;
        }, 'Migrate from PHPUnit to HackTest', '--phpunit-to-hacktest'), CLIOptions\flag(function () {
            return $this->migrations[] = AddFixMesMigration::class;
        }, 'Add /* HH_FIXME[] */ comments where needed', '--add-fixmes'), CLIOptions\flag(function () {
            return $this->includeVendor = true;
        }, 'Also migrate files in vendor/ subdirectories', '--include-vendor'), CLIOptions\flag(function () {
            return $this->xhprof = true;
        }, 'Enable XHProf profiling', '--xhprof'), $this->getVerbosityOption());
    }
    /**
     * @param array<int, BaseMigration> $migrations
     *
     * @return void
     */
    private final function migrateFile(array $migrations, string $file)
    {
        $this->verbosePrintf(self::VERBOSE_MIGRATE, 'Migrating file %s...
', $file);
        if (!self::isHackFile($file)) {
            $this->verbosePrintf(self::VERBOSE_MIGRATE_NOT_HACK, 'Migrating file %s despite it not looking like a Hack file
', $file);
        }
        $ast = HHAST\from_file($file);
        foreach ($migrations as $migration) {
            $new_ast = $migration->migrateFile($file, $ast);
            if ($ast !== $new_ast) {
                $ast = $new_ast;
                \file_put_contents($file, $ast->getCode());
            }
        }
    }
    /**
     * @param array<int, BaseMigration> $migrations
     *
     * @return void
     */
    private final function migrateDirectory(array $migrations, string $directory)
    {
        $need_recursion = false;
        $has_file_list = array();
        foreach ($migrations as $migration) {
            if ($migration instanceof IMigrationWithFileList) {
                $has_file_list[] = $migration;
            } else {
                $need_recursion = true;
                break;
            }
        }
        if ($need_recursion) {
            $this->migrateDirectoryByRecursing($migrations, $directory);
            return;
        }
        foreach ($has_file_list as $migration) {
            $files = $migration->getFilePathsToMigrate();
            foreach ($files as $file) {
                $this->migrateFile(array($migration), $file);
            }
        }
    }
    /**
     * @param array<int, BaseMigration> $migrations
     *
     * @return void
     */
    private final function migrateDirectoryByRecursing(array $migrations, string $directory)
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        foreach ($it as $info) {
            if (!$info->isFile()) {
                continue;
            }
            $file = $info->getPathname();
            if (!$this->includeVendor) {
                if (Str\contains($file, '/.git/')) {
                    $this->verbosePrintf(self::VERBOSE_SKIP_BECAUSE_GIT, 'Skipping file \'%s\' because it is in .git/
', $file);
                    continue;
                }
                if (Str\contains($file, '/vendor/')) {
                    $this->verbosePrintf(self::VERBOSE_SKIP_BECAUSE_VENDOR, 'Skipping file \'%s\' because it is in vendor/
', $file);
                    continue;
                }
                if (!self::isHackFile($file)) {
                    $this->verbosePrintf(self::VERBOSE_SKIP_BECAUSE_NOT_HACK, 'Skipping file \'%s\' because it is not a Hack file
', $file);
                    continue;
                }
            }
            $this->migrateFile($migrations, $file);
        }
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
                $err = $this->getStderr();
                if (C\is_empty($this->migrations)) {
                    (yield $err->writeAsync('You must specify at least one migration!

'));
                    $this->displayHelp($err);
                    return 1;
                }
                $args = $this->getArguments();
                if (C\is_empty($args)) {
                    (yield $err->writeAsync('You must specify at least one path!

'));
                    $this->displayHelp($err);
                    return 1;
                }
                foreach ($args as $path) {
                    $migrations = \array_map(function ($class) use($path) {
                        return new $class($path);
                    }, $this->migrations);
                    if (\is_file($path)) {
                        $this->migrateFile($migrations, $path);
                        continue;
                    }
                    if (\is_dir($path)) {
                        $this->migrateDirectory($migrations, $path);
                        continue;
                    }
                    (yield $err->writeAsync(Str\format('Don\'t know how to process path: %s
', $path)));
                    return 1;
                }
                return 0;
            }
        );
    }
    /**
     * @return bool
     */
    private static function isHackFile(string $file)
    {
        static $cache = null;
        if ($cache !== null) {
            list($cache_file, $cache_result) = $cache;
            if ($cache_file === $file) {
                return $cache_result;
            }
        }
        $f = \fopen($file, 'r');
        $prefix = \fread($f, 4);
        if ($prefix === '<?hh') {
            $cache = array($file, true);
            return true;
        }
        if (!Str\starts_with($prefix, '#!')) {
            $cache = array($file, false);
            return false;
        }
        \rewind($f);
        $_shebang = \fgets($f);
        $prefix = \fread($f, 4);
        $is_hh = $prefix === '<?hh';
        $cache = array($file, $is_hh);
        return $is_hh;
    }
}

