<?php
namespace Facebook\HHAST\__Private;

use HH\Lib\Str as Str;
final class SubprocessException extends \Exception
{
    /**
     * @var int
     */
    private $exitCode;
    /**
     * @var int
     */
    public function __construct(array $command, int $exitCode)
    {
        $this->exitCode = $exitCode;
        parent::__construct(Str\format('Command "%s" failed with exit code %d', \implode(' ', $command), $exitCode));
    }
    /**
     * @return int
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }
}

