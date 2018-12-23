<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
use Facebook\CLILib\ITerminal as ITerminal;
use HH\Lib\Str as Str;
final class Client extends LSPLib\Client
{
    /**
     * @var \Sabre\Event\Promise<void>|null
     */
    private $pendingStdout;
    /**
     * @var ITerminal
     */
    private $terminal;
    /**
     * @var ITerminal
     */
    public function __construct(ITerminal $terminal);
    /**
     * @return \Sabre\Event\Promise<void>
     */
    protected function sendMessageAsync(LSP\Message $message)
    {
        $json = \json_encode($message, \JSON_UNESCAPED_SLASHES);
        $tail = $this->pendingStdout;
        $next = (function () use($tail, $json, $this) {
            (yield $tail);
            (yield $this->terminal->getStdout()->writeAsync(Str\format('Content-Length: %d

%s', \strlen($json), $json)));
        })();
        $this->pendingStdout = $next;
        return $next;
    }
}

