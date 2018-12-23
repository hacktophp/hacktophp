<?php
namespace Facebook\HHAST\__Private;

use Facebook\CLILib\CLIBase as CLIBase;
use Facebook\CLILib\CLIOptions as CLIOptions;
trait CLIWithVerbosityTrait
{
    /**
     * @var int
     */
    protected $verbosity = 0;
    /**
     * @param \HH\FormatString<\PlainSprintf> $format
     * @param mixed $args
     *
     * @return void
     */
    protected function verbosePrintf(int $level, \HH\FormatString $format, ...$args)
    {
        if ($this->verbosity < $level) {
            return;
        }
        print \vsprintf($format, $args);
    }
    /**
     * @return CLIOptions\CLIOption
     */
    protected function getVerbosityOption()
    {
        return CLIOptions\flag(function () {
            return $this->verbosity++;
        }, 'Increase output verbosity', '--verbose', '-v');
    }
}

