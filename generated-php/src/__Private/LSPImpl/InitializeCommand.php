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
use HH\Lib\Str;
use Facebook\HHAST\__Private\LintRunConfig;
/**
 * @template-extends LSPLib\InitializeCommand<ServerState>
 */
final class InitializeCommand extends LSPLib\InitializeCommand
{
    /**
     * @var LSP\ServerCapabilities
     */
    const SERVER_CAPABILITIES = ['textDocumentSync' => ['save' => ['includeText' => false], 'openClose' => true, 'change' => LSP\TextDocumentSyncKind::FULL], 'codeActionProvider' => true, 'executeCommandProvider' => ['commands' => ExecuteCommandCommand::COMMANDS]];
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
                $options = TypeAssert\matches_type_structure(type_structure(self::class, 'TInitializationOptions'), $p['initializationOptions'] ?? []);
                $lint_mode = $options['lintMode'] ?? null;
                if ($lint_mode !== null) {
                    $this->state->lintMode = $lint_mode;
                }
                $lint_as_you_type = $options['lintAsYouType'] ?? null;
                if ($lint_as_you_type !== null) {
                    $this->state->lintAsYouType = $lint_as_you_type;
                }
                $test_options = $options['__PRIVATE__']['unitTestOptions'] ?? null;
                if ($test_options !== null) {
                    $v = $test_options['ignoreFilenameExtensions'] ?? null;
                    if ($v !== null) {
                        $this->state->ignoreFilenameExtensions = $v;
                    }
                }
                invariant($this->state->config === null, 'Tried to set config twice');
                $uri = $p['rootUri'];
                if ($uri === null) {
                    $uri = 'file://' . \getcwd();
                }
                if (Str\starts_with($uri, 'file://')) {
                    $path = Str\strip_prefix($uri, 'file://');
                    $this->state->config = LintRunConfig::getForPath($path);
                }
                return (yield parent::executeAsync($p));
            }
        );
    }
}

