<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\EditableNode as EditableNode;
use function Facebook\HHAST\find_position as find_position;
use HH\Lib\Str as Str;
class ASTLintError extends LintError
{
    /**
     * @var ASTLinter<Tnode>
     */
    protected $linter;
    /**
     * @var Tnode
     */
    protected $node;
    /**
     * @var Tnode
     */
    public function __construct(ASTLinter $linter, string $description, Tnode $node)
    {
        $this->linter = $linter;
        $this->node = $node;
        parent::__construct($linter, $description);
    }
    /**
     * @return Tnode
     */
    public final function getBlameNode()
    {
        return $this->node;
    }
    /**
     * @return array{0:int, 1:int}
     */
    public final function getPosition()
    {
        return find_position($this->linter->getAST(), $this->getBlameNode());
    }
    /**
     * @return array{0:array{0:int, 1:int}, 1:array{0:int, 1:int}}
     */
    public final function getRange()
    {
        $token = $this->getBlameNode()->getLastTokenx();
        list($line, $col) = find_position($this->linter->getAST(), $token);
        return array($this->getPosition(), array($line, $col + \strlen($token->getText())));
    }
    /**
     * @return string
     */
    public final function getBlameCode()
    {
        return $this->node->getCode();
    }
    /**
     * @return string
     */
    public final function getPrettyBlame()
    {
        return $this->linter->getPrettyTextForNode($this->node);
    }
}

