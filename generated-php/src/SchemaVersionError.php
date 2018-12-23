<?php
namespace Facebook\HHAST;

use HH\Lib\Str as Str;
final class SchemaVersionError extends ParseError
{
    /**
     * @var string
     */
    private $version;
    /**
     * @var string
     */
    public function __construct(string $targetFile, string $version)
    {
        $this->version = $version;
        parent::__construct($targetFile, null, Str\format('AST version mismatch: expected \'%s\' (%d.%d.%d), but got \'%s', SCHEMA_VERSION, HHVM_VERSION_ID / 10000, HHVM_VERSION_ID / 100 % 100, HHVM_VERSION_ID % 100, $version));
    }
}

