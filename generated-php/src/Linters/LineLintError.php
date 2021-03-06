<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
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
     * @param LineLinter<LineLintError> $linter
     * @param array{0:int, 1:int} $position
     */
    public function __construct(LineLinter $linter, string $description, array $position)
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

