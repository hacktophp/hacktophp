<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\TypeAssert as TypeAssert;
use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
use HH\Lib\Str as Str;
use Facebook\HHAST\__Private\LintRunConfig as LintRunConfig;
final class InitializeCommand extends LSPLib\InitializeCommand
{
    /**
     * @var LSP\ServerCapabilities
     */
    const SERVER_CAPABILITIES = array('textDocumentSync' => array('save' => array('includeText' => false), 'openClose' => true, 'change' => LSP\TextDocumentSyncKind::FULL), 'codeActionProvider' => true, 'executeCommandProvider' => array('commands' => ExecuteCommandCommand::COMMANDS));
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
                $options = TypeAssert\matches_type_structure(type_structure(self::class, 'TInitializationOptions'), $p['initializationOptions'] ?? array());
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

