<?php
namespace Facebook\HHAST\Linters;

class LineLintError extends LintError
{
    /**
     * @var LineLinter<LineLintError>
     */
    private $linter;
    /**
     * @var string
     */
    private $description;
    /**
     * @var array{0:int, 1:int}
     */
    private $position;
    /**
     * @var array{0:int, 1:int}
     */
    public function __construct(LineLinter $linter, string $description, $position)
    {
        $this->linter = $linter;
        $this->description = $description;
        $this->position = $position;
        parent::__construct($linter, $description);
    }
    /**
     * @return array{0:int, 1:int}
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @return null|string
     */
    public function getBlameCode()
    {
        $line = $this->position[0] - 1;
        invariant($line >= 0, 'line number should never be negative');
        return $this->linter->getLine($line);
    }
}

