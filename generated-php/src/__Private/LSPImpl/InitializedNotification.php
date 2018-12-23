<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\LSPLib as LSPLib;
final class InitializedNotification extends LSPLib\InitializedNotification
{
    /**
     * @var LSPLib\Client
     */
    private $client;
    /**
     * @var LSPLib\Client
     */
    public function __construct(LSPLib\Client $client, LSPLib\ServerState $state)
    {
        $this->client = $client;
        parent::__construct($state);
    }
    /**
     * @param mixed $p
     *
     * @return \Sabre\Event\Promise<void>
     */
    public function executeAsync($p)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($p) : \Generator {
                $message = (new LSPLib\RegisterCapabilityCommand(__CLASS__, array('registrations' => array(array('id' => 'relint on watched file change', 'method' => LSPLib\DidChangeWatchedFilesNotification::METHOD, 'registerOptions' => array('watchers' => array(array('globPattern' => '**/*.php'), array('globPattern' => '**/*.hh'))))))))->asMessage();
                (yield $this->client->sendRequestMessageAsync($message));
                (yield parent::executeAsync($p));
            }
        );
    }
}

