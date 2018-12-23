<?php
namespace Facebook\HHAST\Migrations;

use function Facebook\HHAST\__Private\get_typechecker_errors as get_typechecker_errors;
use Facebook\HHAST\__Private\TTypecheckerError as TTypecheckerError;
use HH\Lib\{C as C, Keyset as Keyset, Vec as Vec};
trait TypeErrorMigrationTrait
{
    /**
     * @var string
     */
    private $root;
    public function __construct(string $root)
    {
        $this->root = $root;
    }
    /**
     * @return bool
     */
    protected static abstract function filterTypecheckerError(TTypecheckerError $in);
    /**
     * @return array<int, TTypecheckerError>
     */
    private final function getTypecheckerErrors()
    {
        return Vec\filter(get_typechecker_errors($this->root), function ($error) {
            return static::filterTypecheckerError($error);
        });
    }
    /**
     * @return array<int, TTypecheckerError>
     */
    protected final function getTypecheckerErrorsForFile(string $file)
    {
        return Vec\filter($this->getTypecheckerErrors(), function ($error) use($file) {
            return C\firstx($error['message'])['path'] === $file;
        });
    }
    /**
     * @return array<string, string>
     */
    public final function getFilePathsToMigrate()
    {
        return Keyset\map($this->getTypecheckerErrors(), function ($error) {
            return C\firstx($error['message'])['path'];
        });
    }
}

