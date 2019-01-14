<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP;
use function Facebook\HHAST\__Private\type_alias_structure;
use Facebook\TypeCoerce;
use Facebook\TypeAssert\TypeCoercionException;
use HH\Lib\{Dict, Str};
/**
 * @template TState as ServerState
 */
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
    private $commands = [];
    /**
     * @var array<string, ClientNotification>
     */
    private $notifications = [];
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
     * @param TState $state
     */
    public function __construct(Client $client, $state)
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
     * @return \Amp\Promise<void>
     */
    public final function handleMessageAsync(string $json)
    {
        return \Amp\call(
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
                invariant_violation("Don't know how to handle this message type: %s", $json);
            }
        );
    }
    /**
     * @template T
     *
     * @param TypeStructure<T> $type_structure
     * @param \Closure(T):\Amp\Promise<void> $impl
     *
     * @return \Amp\Promise<bool>
     */
    private function tryHandleMessageTypeAsync(TypeStructure $type_structure, \Closure $impl, string $json)
    {
        return \Amp\call(
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
     * @return \Amp\Promise<void>
     */
    private function handleClientNotificationMessageAsync(LSP\NotificationMessage $notification)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($notification) : \Generator {
                $handler = $this->notifications[$notification['method']] ?? null;
                if ($handler === null) {
                    (yield $this->client->sendNotificationMessageAsync((new LogMessageNotification(['type' => LSP\MessageType::WARNING, 'message' => Str\format("Don't know how to handle notification method '%s'", $notification['method'])]))->asMessage()));
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
     * @return \Amp\Promise<void>
     */
    private function handleRequestMessageAsync(LSP\RequestMessage $request)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($request) : \Generator {
                $command = $this->commands[$request['method']] ?? null;
                if ($command === null) {
                    (yield $this->client->sendResponseMessageAsync(['jsonrpc' => '2.0', 'id' => $request['id'], 'error' => ['code' => LSP\ErrorCode::METHOD_NOT_FOUND, 'message' => Str\format("Command '%s' is not implemented", $request['method'])]]));
                    return;
                }
                $params = TypeCoerce\match_type_structure(type_structure($command, 'TParams'), $request['params'] ?? null);
                $result = (yield $command->executeAsync($params));
                if ($result instanceof Success) {
                    (yield $this->client->sendResponseMessageAsync(['jsonrpc' => '2.0', 'id' => $request['id'], 'result' => $result->getResult()]));
                    return;
                }
                $error = $result->getError();
                (yield $this->client->sendResponseMessageAsync(['jsonrpc' => '2.0', 'id' => $request['id'], 'error' => $result->getError()->asResponseError()]));
                return;
            }
        );
    }
    /**
     * @template T
     *
     * @param TypeStructure<T> $ts
     *
     * @return T
     */
    private static function jsonDecode(TypeStructure $ts, string $json)
    {
        $request = \json_decode($json, true, 512);
        return TypeCoerce\match_type_structure($ts, $request);
    }
}

