<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\__Private\LSP as LSP;
interface AutoFixingLinter
{
    /**
     * @return \Sabre\Event\Promise<Traversable<Terror>>
     */
    public function getLintErrorsAsync();
    /**
     * @param Traversable<Terror> $errors
     *
     * @return File
     */
    public function getFixedFile(Traversable $errors);
    /**
     * @return string
     */
    protected function getTitleForFix(Terror $error);
    /**
     * @return null|LSP\CodeAction
     */
    public function getCodeActionForError(Terror $error);
}

