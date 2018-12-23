<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
class InitializeCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'initialize';
    /**
     * @var LSP\ServerCapabilities
     */
    const SERVER_CAPABILITIES = array();
    /**
     * @var TState
     */
    protected $state;
    /**
     * @var TState
     */
    public function __construct(TState $state);
    /**
     * @param mixed $p
     *
     * @return \Sabre\Event\Promise<mixed>
     */
    public function executeAsync($p)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, mixed> */
            function () use($p) : \Generator {
                $this->state->setStatus(ServerStatus::INITIALIZING)->setClientCapabilities($p['capabilities']);
                return static::success(array('capabilities' => static::SERVER_CAPABILITIES));
            }
        );
    }
}

