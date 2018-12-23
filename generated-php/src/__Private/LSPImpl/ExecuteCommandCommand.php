<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\TypeAssert as TypeAssert;
use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
final class ExecuteCommandCommand extends LSPLib\ExecuteCommandCommand
{
    /**
     * @var string
     */
    const HHAST_ApplyWorkspaceEdit = 'hhast/applyWorkspaceEdit';
    /**
     * @var array<int, string>
     */
    const COMMANDS = array(self::HHAST_ApplyWorkspaceEdit);
    /**
     * @var LSPLib\Client
     */
    private $client;
    /**
     * @var LSPLib\Client
     */
    public function __construct(LSPLib\Client $client);
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
                $command = $p['command'];
                switch ($command) {
                    case self::HHAST_ApplyWorkspaceEdit:
                        $args = TypeAssert\matches_type_structure(type_structure(self::class, 'THHAST_ApplyWorkspaceEditParams'), $p['arguments'] ?? array());
                        (yield $this->client->sendRequestMessageAsync((new LSPLib\ApplyWorkspaceEditCommand(self::generateID(), array('edit' => $args[0])))->asMessage()));
                        return self::success(null);
                }
                return self::error(0, 'Unsupported command: ' . $command, null);
            }
        );
    }
    /**
     * @return string
     */
    private static function generateID()
    {
        static $counter = 0;
        return __CLASS__ . '!' . $counter++;
    }
}

