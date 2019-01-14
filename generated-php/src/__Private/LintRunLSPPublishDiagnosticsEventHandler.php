<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use Facebook\HHAST\Linters;
use HH\Lib\{C, Str, Vec};
final class LintRunLSPPublishDiagnosticsEventHandler implements LintRunEventHandler
{
    /**
     * @var LSPLib\Client
     */
    private $client;
    /**
     * @var LSPImpl\ServerState
     */
    private $state;
    public function __construct(LSPLib\Client $client, LSPImpl\ServerState $state)
    {
        $this->client = $client;
        $this->state = $state;
    }
    /**
     * @var null|string
     */
    private $file = null;
    /**
     * @var array<int, Linters\LintError>
     */
    private $errors = [];
    /**
     * @param mixed $_config
     * @param iterable<mixed, Linters\LintError> $errors
     *
     * @return \Amp\Promise<LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED>
     */
    public function linterRaisedErrorsAsync(Linters\BaseLinter $linter, $_config, iterable $errors)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, LintAutoFixResult::ALL_FIXED|LintAutoFixResult::SOME_UNFIXED> */
            function () use($linter, $_config, $errors) : \Generator {
                $file = \realpath($linter->getFile()->getPath());
                invariant($this->file === null || $this->file === $file, "Unexpected file change in lint process");
                $this->file = $file;
                $this->errors = \array_merge($errors, $this->errors ?? []);
                return LintAutoFixResult::SOME_UNFIXED;
            }
        );
    }
    /**
     * @return array{range:LSP\Range, severity:LSP\DiagnosticSeverity, code:array-key, source:string, message:string, relatedInformation:array<int, LSP\DiagnosticRelatedInformation>}
     */
    private function asDiagnostic(Linters\LintError $error)
    {
        $range = $error->getRange();
        $start = $range[0] ?? [0, 0];
        $end = $range[1] ?? $start;
        $start = LSPImpl\position_to_lsp($start);
        $end = LSPImpl\position_to_lsp($end);
        $source = Str\strip_suffix(C\lastx(\explode("\\", \get_class($error->getLinter()))), 'Linter');
        return ['range' => ['start' => $start, 'end' => $end], 'severity' => LSP\DiagnosticSeverity::WARNING, 'message' => $error->getDescription(), 'code' => $source, 'source' => 'HHAST'];
    }
    /**
     * @param array<int, Linters\LintError> $errors
     *
     * @return \Amp\Promise<void>
     */
    private function publishDiagnosticsAsync(string $file, array $errors)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($file, $errors) : \Generator {
                $uri = 'file://' . $file;
                $this->state->lintErrors[$uri] = $errors;
                $message = (new LSPLib\PublishDiagnosticsNotification(['uri' => $uri, 'diagnostics' => \array_map(function ($e) {
                    return $this->asDiagnostic($e);
                }, $errors)]))->asMessage();
                (yield $this->client->sendNotificationMessageAsync($message));
            }
        );
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $result
     *
     * @return \Amp\Promise<void>
     */
    public function finishedFileAsync(string $path, $result)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, void> */
            function () use($path, $result) : \Generator {
                $path = \realpath($path);
                invariant($this->file === null || $this->file === $path, "Unexpected file change");
                $errors = $this->errors;
                if ($result === LintRunResult::NO_ERRORS) {
                    invariant(C\is_empty($errors), "Linter reports no errors, but we have errors");
                } else {
                    invariant(!C\is_empty($errors), "Linter reports errors, but we have none");
                }
                (yield $this->publishDiagnosticsAsync($path, $errors));
                $this->file = null;
                $this->errors = [];
            }
        );
    }
    /**
     * @param LintRunResult::NO_ERRORS|LintRunResult::HAD_AUTOFIXED_ERRORS|LintRunResult::HAVE_UNFIXED_ERRORS $_0
     *
     * @return \Amp\Promise<void>
     */
    public function finishedRunAsync($_0)
    {
    }
}

