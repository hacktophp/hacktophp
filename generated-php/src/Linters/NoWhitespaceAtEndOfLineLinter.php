<?php
namespace Facebook\HHAST\Linters;

use HH\Lib\Str as Str;
final class NoWhitespaceAtEndOfLineLinter extends AutoFixingLineLinter
{
    /**
     * @return string
     */
    public function getTitleForFix(LineLintError $_)
    {
        return 'Remove trailing whitespace';
    }
    /**
     * @return Traversable<LineLintError>
     */
    public function getLintErrorsForLine(string $line, int $line_number)
    {
        $errs = array();
        for ($i = \strlen($line) - 1; $i >= 0; $i--) {
            $char = $line[$i];
            if ($char !== ' ') {
                break;
            }
            $errs[] = new LineLintError($this, 'trailing whitespace at end of line', array($line_number + 1, $i + 1));
            break;
        }
        return $errs;
    }
    /**
     * @return string
     */
    public function getFixedLine(string $line)
    {
        return Str\trim_right($line, ' ');
    }
}

