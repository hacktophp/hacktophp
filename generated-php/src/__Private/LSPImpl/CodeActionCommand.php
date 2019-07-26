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

use Facebook\HHAST\__Private\{LSP, LSPLib};
use Facebook\HHAST\{AutoFixingLinter, LintError};
use HH\Lib\{C, Str, Vec};
final class CodeActionCommand extends LSPLib\CodeActionCommand
{
    /**
     * @var LSPLib\Client
     */
    private $client;
    /**
     * @var ServerState
     */
    private $state;
    public function __construct(LSPLib\Client $client, ServerState $state)
    {
        $this->client = $client;
        $this->state = $state;
    }
    /**
     * @param mixed $p
     *
     * @return \Amp\Promise<mixed>
     */
    public function executeAsync($p)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, mixed> */
            function () use($p) : \Generator {
                $uri = $p['textDocument']['uri'];
                $file_errors = $this->state->lintErrors[$uri] ?? [];
                return self::success(Vec\filter_nulls(\array_map(function ($d) use($e, $file_errors, $linter, $ca, $command, $edit, $caps) {
                    $e = $this->findError($d, $file_errors);
                    if ($e === null) {
                        return null;
                    }
                    $linter = $e->getLinter();
                    if (!$linter instanceof AutoFixingLinter) {
                        return null;
                    }
                    try {
                        $ca = $linter->getCodeActionForError($e);
                    } catch (\Exception $_) {
                        // usually some form of parse error, especially with as-you-type.
                        // Don't crash the LSP server.
                        return null;
                    }
                    if ($ca === null) {
                        return null;
                    }
                    $ca['diagnostics'] = [$d];
                    // Atom doesn't support CodeAction responses:
                    // https://github.com/atom/atom-languageclient/issues/226
                    $command = $ca['command'] ?? null;
                    $edit = $ca['edit'] ?? null;
                    invariant(!($command && $edit), "Can't currently support both a command and an edit for editor " . "compatibility");
                    // If we're on a full-featured editor, return the code action
                    // directly to avoid a pointless round-trip.
                    $caps = $this->state->getClientCapabilities();
                    if (($caps['textDocument']['codeAction']['codeActionLiteralSupport'] ?? null) !== null) {
                        return $ca;
                    }
                    // Otherwise, return a command, making one if neccessary
                    if ($command) {
                        return $command;
                    }
                    invariant($edit !== null, "Need a command or an edit");
                    return ['title' => $ca['title'], 'command' => ExecuteCommandCommand::HHAST_ApplyWorkspaceEdit, 'arguments' => [$edit]];
                }, $p['context']['diagnostics'])));
            }
        );
    }
    /**
     * @param array<int, LintError> $errors
     *
     * @return null|LintError
     */
    private function findError(LSP\Diagnostic $diagnostic, array $errors)
    {
        $pos = position_from_lsp($diagnostic['range']['start']);
        foreach ($errors as $error) {
            $code = Str\strip_suffix(C\lastx(\explode("\\", \get_class($error->getLinter()))), 'Linter');
            if ($code !== ($diagnostic['code'] ?? null)) {
                continue;
            }
            if ($error->getPosition() !== $pos) {
                continue;
            }
            return $error;
        }
        return null;
    }
}

