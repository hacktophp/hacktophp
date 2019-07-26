<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{LintRun, LintRunLSPPublishDiagnosticsEventHandler};
use Facebook\HHAST\__Private\{LSPImpl, LSPLib};
use Facebook\CLILib\{ExitException, ITerminal};
use HH\Lib\Str;
use HH\Lib\Experimental\Async;
/**
 * @template-extends LSPLib\Server<ServerState>
 */
final class Server extends LSPLib\Server
{
    /**
     * @var ITerminal
     */
    private $terminal;
    public function __construct(ITerminal $terminal)
    {
        $this->terminal = $terminal;
        \set_error_handler(function (int $severity, string $message, string $file, int $line) : bool {
            throw new \ErrorException($message, 0, $severity, $file, $line);
        });
        parent::__construct(new LSPImpl\Client($terminal), new ServerState());
    }
    /**
     * @return array<int, LSPLib\ServerCommand>
     */
    protected function getSupportedServerCommands()
    {
        return [new LSPImpl\InitializeCommand($this->state), new LSPLib\ShutdownCommand($this->state), new LSPImpl\CodeActionCommand($this->client, $this->state), new LSPImpl\ExecuteCommandCommand($this->client)];
    }
    /**
     * @return array<int, LSPLib\ClientNotification>
     */
    protected function getSupportedClientNotifications()
    {
        return [new LSPImpl\DidChangeWatchedFilesNotification($this->client, $this->state), new LSPImpl\DidChangeTextDocumentNotification($this->client, $this->state), new LSPImpl\DidSaveTextDocumentNotification($this->client, $this->state), new LSPImpl\DidOpenTextDocumentNotification($this->client, $this->state), new LSPImpl\DidCloseTextDocumentNotification($this->client, $this->state), new LSPImpl\ExitNotification($this->state), new LSPImpl\InitializedNotification($this->client, $this->state)];
    }
    /**
     * @return \Amp\Promise<int>
     */
    public function mainAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                try {
                    (yield $this->mainLoopAsync());
                } catch (ExitException $e) {
                    return $e->getCode();
                } catch (\Throwable $e) {
                    $message = Str\format("Uncaught exception: %s:\n%s\n%s\n", \get_class($e), $e->getMessage(), $e->getTraceAsString());
                    $previous = $e->getPrevious();
                    if ($previous !== null) {
                        $message .= Str\format("Previous exception: %s:\n%s\n%s\n", \get_class($previous), $previous->getMessage(), $previous->getTraceAsString());
                    }
                    (yield $this->terminal->getStderr()->writeAsync($message));
                    throw $e;
                }
                return 0;
            }
        );
    }
    /**
     * @return \Amp\Promise<void>
     */
    private function mainLoopAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () : \Generator {
                $stdin = $this->terminal->getStdin();
                $poll = Async\Poll::create();
                $poll->add($this->lintProjectAsync());
                $debug = (bool) \getenv('HHAST_LSP_DEBUG') ?? false;
                $verbose = $debug ? $this->terminal->getStderr() : null;
                $poll->add((function () use($stdin, $verbose, $body, $this, $poll) {
                    while (!$stdin->isEndOfFile()) {
                        /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                        (yield ($__tmp1__ = $verbose) !== null ? $__tmp1__->writeAsync("< [waiting]\n") : null);
                        /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                        $body = (yield $this->readMessageAsync());
                        /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                        (yield ($__tmp2__ = $verbose) !== null ? $__tmp2__->writeAsync("> [dispatch]\n") : null);
                        $poll->add((function () use($verbose, $body, $this) {
                            (yield ($__tmp3__ = $verbose) !== null ? $__tmp3__->writeAsync("> [start]\n") : null);
                            (yield $this->handleMessageAsync($body));
                            (yield ($__tmp4__ = $verbose) !== null ? $__tmp4__->writeAsync("> [done]\n") : null);
                        })());
                    }
                })());
                foreach ($poll as $_) {
                }
            }
        );
    }
    /**
     * @return \Amp\Promise<void>
     */
    private function lintProjectAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () : \Generator {
                (yield $this->state->waitForInitAsync());
                if ($this->state->getStatus() !== LSPLib\ServerStatus::INITIALIZED) {
                    return;
                }
                if ($this->state->lintMode !== LintMode::WHOLE_PROJECT) {
                    return;
                }
                $handler = new LintRunLSPPublishDiagnosticsEventHandler($this->client, $this->state);
                (yield (new LintRun($this->state->config, $handler, (($__tmp5__ = $this->state->config) !== null ? $__tmp5__->getRoots() : null) ?? []))->runAsync());
            }
        );
    }
    /**
     * @return \Amp\Promise<string>
     */
    private function readMessageAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, string> */
            function () : \Generator {
                return (yield read_message_async($this->terminal->getStdin()));
            }
        );
    }
}

