<?php
namespace Facebook\HHAST\__Private\LSPLib;

class InitializedNotification extends ClientNotification
{
    /**
     * @var string
     */
    const METHOD = 'initialized';
    /**
     * @var TState
     */
    protected $state;
    /**
     * @var TState
     */
    public function __construct(TState $state);
    /**
     * @param mixed $_in
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function executeAsync($_in)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($_in) : \Generator {
                $this->state->setStatus(ServerStatus::INITIALIZED);
            }
        );
    }
}

