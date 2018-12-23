<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
class ShutdownCommand extends ServerCommand
{
    /**
     * @var string
     */
    const METHOD = 'shutdown';
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
     * @param mixed $_
     *
     * @return \Sabre\Event\Promise<mixed>
     */
    public function executeAsync($_)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, mixed> */
            function () use($_) : \Generator {
                $this->state->setStatus(ServerStatus::SHUTTING_DOWN);
                return static::success(null);
            }
        );
    }
}

