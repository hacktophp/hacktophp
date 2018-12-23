<?php
namespace Facebook\HHAST\Linters;

use HH\Lib\Str as Str;
abstract class AutoFixingLineLinter extends LineLinter implements AutoFixingLinter
{
    use AutoFixingLinterTrait;
    /**
     * @return string
     */
    public abstract function getFixedLine(string $line);
    /**
     * @param Traversable<Terr> $errors
     *
     * @return File
     */
    public final function getFixedFile(Traversable $errors)
    {
        $lines = $this->getLinesFromFile();
        foreach ($errors as $err) {
            $i = $err->getPosition()[0] - 1;
            invariant($i >= 0, 'line number should never be negative');
            $original = $lines[$i];
            $lines[$i] = $this->getFixedLine($original);
        }
        return $this->getFile()->withContents(\implode('
', $lines));
    }
}

