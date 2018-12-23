<?php
namespace Facebook\HHAST;

interface ILoopStatement extends IControlFlowStatement
{
    /**
     * @return EditableNode
     */
    public function getBody();
    /**
     * @return static
     */
    public function withBody(EditableNode $body);
}

