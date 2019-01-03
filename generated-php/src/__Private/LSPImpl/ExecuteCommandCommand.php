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

use Facebook\TypeAssert;
use Facebook\HHAST\__Private\{LSP, LSPLib};
final class ExecuteCommandCommand extends LSPLib\ExecuteCommandCommand
{
    /**
     * @var string
     */
    const HHAST_ApplyWorkspaceEdit = 'hhast/applyWorkspaceEdit';
    /**
     * @var array<int, string>
     */
    const COMMANDS = [self::HHAST_ApplyWorkspaceEdit];
    /**
     * @var LSPLib\Client
     */
    private $client;
    public function __construct(LSPLib\Client $client)
    {
        $this->client = $client;
    }
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
                        $args = TypeAssert\matches_type_structure(type_structure(self::class, 'THHAST_ApplyWorkspaceEditParams'), $p['arguments'] ?? []);
                        (yield $this->client->sendRequestMessageAsync((new LSPLib\ApplyWorkspaceEditCommand(self::generateID(), ['edit' => $args[0]]))->asMessage()));
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

