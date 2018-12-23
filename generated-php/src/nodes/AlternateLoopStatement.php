<?php
namespace Facebook\HHAST;

final class AlternateLoopStatement extends AlternateLoopStatementGeneratedBase
{
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return $this->getStatements();
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $body)
    {
        return $this->withStatements($body);
    }
}

