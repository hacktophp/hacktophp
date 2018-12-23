<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
use Facebook\HHAST\Linters as Linters;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
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
    /**
     * @var ServerState
     */
    public function __construct(LSPLib\Client $client, ServerState $state);
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
                $uri = $p['textDocument']['uri'];
                $file_errors = $this->state->lintErrors[$uri] ?? array();
                return self::success(Vec\filter_nulls(\array_map(function ($d) use($e, $file_errors, $linter, $ca, $command, $edit, $caps) {
                    $e = $this->findError($d, $file_errors);
                    if ($e === null) {
                        return null;
                    }
                    $linter = $e->getLinter();
                    if (!$linter instanceof Linters\AutoFixingLinter) {
                        return null;
                    }
                    try {
                        $ca = $linter->getCodeActionForError($e);
                    } catch (\Exception $_) {
                        return null;
                    }
                    if ($ca === null) {
                        return null;
                    }
                    $ca['diagnostics'] = array($d);
                    $command = $ca['command'] ?? null;
                    $edit = $ca['edit'] ?? null;
                    invariant(!($command && $edit), 'Can\'t currently support both a command and an edit for editor ' . 'compatibility');
                    $caps = $this->state->getClientCapabilities();
                    if (($caps['textDocument']['codeAction']['codeActionLiteralSupport'] ?? null) !== null) {
                        return $ca;
                    }
                    if ($command) {
                        return $command;
                    }
                    invariant($edit !== null, 'Need a command or an edit');
                    return array('title' => $ca['title'], 'command' => ExecuteCommandCommand::HHAST_ApplyWorkspaceEdit, 'arguments' => array($edit));
                }, $p['context']['diagnostics'])));
            }
        );
    }
    /**
     * @param array<int, Linters\LintError> $errors
     *
     * @return null|Linters\LintError
     */
    private function findError(LSP\Diagnostic $diagnostic, array $errors)
    {
        $pos = position_from_lsp($diagnostic['range']['start']);
        foreach ($errors as $error) {
            $code = Str\strip_suffix(C\lastx(\explode('\\', \get_class($error->getLinter()))), 'Linter');
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

