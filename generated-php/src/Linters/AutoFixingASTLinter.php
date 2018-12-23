<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\EditableNode as EditableNode;
abstract class AutoFixingASTLinter extends ASTLinter
{
    /**
     * @return null|EditableNode
     */
    public abstract function getFixedNode(Tnode $node);
    use AutoFixingLinterTrait;
    /**
     * @param Traversable<ASTLintError<Tnode>> $errors
     *
     * @return File
     */
    public final function getFixedFile(Traversable $errors)
    {
        $ast = $this->getAST();
        foreach ($errors as $error) {
            invariant($error->getFile() === $this->getFile(), 'Can\'t fix errors in another file');
            invariant($error->getLinter() === $this, 'Can\'t fix errors from another linter');
            $old = $error->getBlameNode();
            $new = $this->getFixedNode($old);
            if ($new === null) {
                continue;
            }
            if ($ast === $old) {
                $ast = $new;
            } else {
                $ast = $ast->replace($old, $new);
            }
        }
        return $this->getFile()->withContents($ast->getCode());
    }
}

