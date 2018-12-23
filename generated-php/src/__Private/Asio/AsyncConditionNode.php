<?php
namespace Facebook\HHAST\__Private\Asio;

final class AsyncConditionNode extends AsyncCondition
{
    /**
     * @var AsyncConditionNode<T>|null
     */
    private $next = null;
    /**
     * @return AsyncConditionNode<T>
     */
    public function addNext()
    {
        invariant($this->next === null, 'The next node already exists');
        return $this->next = new AsyncConditionNode();
    }
    /**
     * @return AsyncConditionNode<T>|null
     */
    public function getNext()
    {
        return $this->next;
    }
}

