<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{Asio\AsyncPoll as AsyncPoll, LintRunLSPPublishDiagnosticsEventHandler as LintRunLSPPublishDiagnosticsEventHandler, LintRun as LintRun};
use Facebook\HHAST\__Private\{LSPImpl as LSPImpl, LSPLib as LSPLib};
use Facebook\CLILib\{ExitException as ExitException, ITerminal as ITerminal};
use HH\Lib\Str as Str;
final class Server extends LSPLib\Server
{
    /**
     * @var ITerminal
     */
    private $terminal;
    /**
     * @var ITerminal
     */
    public function __construct(ITerminal $terminal)
    {
        $this->terminal = $terminal;
        \set_error_handler(function (int $severity, string $message, string $file, int $line) {
            throw new \ErrorException($message, 0, $severity, $file, $line);
        });
        parent::__construct(new LSPImpl\Client($terminal), new ServerState());
    }
    /**
     * @return array<int, LSPLib\ServerCommand>
     */
    protected function getSupportedServerCommands()
    {
        return array(new LSPImpl\InitializeCommand($this->state), new LSPLib\ShutdownCommand($this->state), new LSPImpl\CodeActionCommand($this->client, $this->state), new LSPImpl\ExecuteCommandCommand($this->client));
    }
    /**
     * @return array<int, LSPLib\ClientNotification>
     */
    protected function getSupportedClientNotifications()
    {
        return array(new LSPImpl\DidChangeWatchedFilesNotification($this->client, $this->state), new LSPImpl\DidChangeTextDocumentNotification($this->client, $this->state), new LSPImpl\DidSaveTextDocumentNotification($this->client, $this->state), new LSPImpl\DidOpenTextDocumentNotification($this->client, $this->state), new LSPImpl\DidCloseTextDocumentNotification($this->client, $this->state), new LSPImpl\ExitNotification($this->state), new LSPImpl\InitializedNotification($this->client, $this->state));
    }
    /**
     * @return \Sabre\Event\Promise<int>
     */
    public function mainAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                try {
                    (yield $this->mainLoopAsync());
                } catch (ExitException $e) {
                    return $e->getCode();
                } catch (\Throwable $e) {
                    (yield $this->terminal->getStderr()->writeAsync(Str\format('Uncaught exception: %s:
%s
%s
', \get_class($e), $e->getMessage(), $e->getTraceAsString())));
                    throw $e;
                }
                return 0;
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    private function mainLoopAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, void> */
            function () : \Generator {
                $stdin = $this->terminal->getStdin();
                $poll = AsyncPoll::create();
                $poll->add($this->lintProjectAsync());
                $debug = (bool) \getenv('HHAST_LSP_DEBUG') ?? false;
                $verbose = $debug ? $this->terminal->getStderr() : null;
                $poll->add((function () use($stdin, $verbose, $body, $this, $poll) {
                    while (!$stdin->isEndOfFile()) {
                        (yield $verbose ? $verbose->writeAsync('< [waiting]
') : null);
                        $body = (yield $this->readMessageAsync());
                        (yield $verbose ? $verbose->writeAsync('> [dispatch]
') : null);
                        $poll->add((function () use($verbose, $body, $this) {
                            (yield $verbose ? $verbose->writeAsync('> [start]
') : null);
                            (yield $this->handleMessageAsync($body));
                            (yield $verbose ? $verbose->writeAsync('> [done]
') : null);
                        })());
                    }
                })());
                foreach ($poll as $_) {
                }
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<void>
     */
    private function lintProjectAsync()
    {
        return \Sabre\Event\coroutine(
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
                (yield (new LintRun($this->state->config, $handler, ($this->state->config ? $this->state->config->getRoots() : null) ?? array()))->runAsync());
            }
        );
    }
    /**
     * @return \Sabre\Event\Promise<string>
     */
    private function readMessageAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, string> */
            function () : \Generator {
                return (yield read_message_async($this->terminal->getStdin()));
            }
        );
    }
}

