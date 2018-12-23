<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
use function Facebook\HHAST\__Private\type_alias_structure as type_alias_structure;
use Facebook\TypeCoerce as TypeCoerce;
use Facebook\TypeAssert\TypeCoercionException as TypeCoercionException;
use HH\Lib\{Dict as Dict, Str as Str};
abstract class Server
{
    /**
     * @return array<int, ServerCommand>
     */
    protected abstract function getSupportedServerCommands();
    /**
     * @return array<int, ClientNotification>
     */
    protected abstract function getSupportedClientNotifications();
    /**
     * @var array<string, ServerCommand>
     */
    private $commands = array();
    /**
     * @var array<string, ClientNotification>
     */
    private $notifications = array();
    /**
     * @var bool
     */
    private $inited = false;
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var TState
     */
    protected $state;
    /**
     * @var TState
     */
    public function __construct(Client $client, TState $state)
    {
        $this->client = $client;
        $this->state = $state;
        $this->commands = Dict\pull($this->getSupportedServerCommands(), function ($class) {
            return $class;
        }, function ($class) {
            return $class::METHOD;
        });
        $this->notifications = Dict\pull($this->getSupportedClientNotifications(), function ($class) {
            return $class;
        }, function ($class) {
            return $class::METHOD;
        });
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    public final function handleMessageAsync(string $json)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($json) : \Generator {
                $was_request = (yield $this->tryHandleMessageTypeAsync(type_alias_structure(LSP\RequestMessage::class), function ($r) {
                    return (yield $this->handleRequestMessageAsync($r));
                }, $json));
                if ($was_request) {
                    return;
                }
                $was_notification = (yield $this->tryHandleMessageTypeAsync(type_alias_structure(LSP\NotificationMessage::class), function ($n) {
                    return (yield $this->handleClientNotificationMessageAsync($n));
                }, $json));
                if ($was_notification) {
                    return;
                }
                $was_response = (yield $this->tryHandleMessageTypeAsync(type_alias_structure(LSP\ResponseMessage::class), function ($x) {
                }, $json));
                if ($was_response) {
                    return;
                }
                invariant_violation('Don\'t know how to handle this message type: %s', $json);
            }
        );
    }
    /**
     * @psalm-template T
     *
     * @param TypeStructure<T> $type_structure
     * @param \Closure(T):\Sabre\Event\Promise<void> $impl
     *
     * @return \Sabre\Event\Promise<bool>
     */
    private function tryHandleMessageTypeAsync(TypeStructure $type_structure, \Closure $impl, string $json)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, bool> */
            function () use($type_structure, $impl, $json) : \Generator {
                try {
                    $message = self::jsonDecode($type_structure, $json);
                } catch (TypeCoercionException $_) {
                    return false;
                }
                (yield $impl($message));
                return true;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    private function handleClientNotificationMessageAsync(LSP\NotificationMessage $notification)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($notification) : \Generator {
                $handler = $this->notifications[$notification['method']] ?? null;
                if ($handler === null) {
                    (yield $this->client->sendNotificationMessageAsync((new LogMessageNotification(array('type' => LSP\MessageType::WARNING, 'message' => Str\format('Don\'t know how to handle notification method \'%s\'', $notification['method']))))->asMessage()));
                    return;
                }
                $params = TypeCoerce\match_type_structure(type_structure($handler, 'TParams'), $notification['params'] ?? null);
                (yield $handler->executeAsync($params));
                if ($handler instanceof InitializedNotification) {
                    $this->inited = true;
                }
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    private function handleRequestMessageAsync(LSP\RequestMessage $request)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () use($request) : \Generator {
                $command = $this->commands[$request['method']] ?? null;
                if ($command === null) {
                    (yield $this->client->sendResponseMessageAsync(array('jsonrpc' => '2.0', 'id' => $request['id'], 'error' => array('code' => LSP\ErrorCode::METHOD_NOT_FOUND, 'message' => Str\format('Command \'%s\' is not implemented', $request['method'])))));
                    return;
                }
                $params = TypeCoerce\match_type_structure(type_structure($command, 'TParams'), $request['params'] ?? null);
                $result = (yield $command->executeAsync($params));
                if ($result instanceof Success) {
                    (yield $this->client->sendResponseMessageAsync(array('jsonrpc' => '2.0', 'id' => $request['id'], 'result' => $result->getResult())));
                    return;
                }
                $error = $result->getError();
                (yield $this->client->sendResponseMessageAsync(array('jsonrpc' => '2.0', 'id' => $request['id'], 'error' => $result->getError()->asResponseError())));
                return;
            }
        );
    }
    /**
     * @psalm-template T
     *
     * @param TypeStructure<T> $ts
     *
     * @return \T
     */
    private static function jsonDecode(TypeStructure $ts, string $json)
    {
        $request = \json_decode($json, true, 512);
        return TypeCoerce\match_type_structure($ts, $request);
    }
}

