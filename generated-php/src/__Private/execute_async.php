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

use HH\Lib\{Str, Vec};
// A wrapper around the built-in exec with a nicer signature.
// * returns a result rather than filling an out-parameter
// * throws on error
/**
 * @return \Amp\Promise<array<int, string>>
 */
function execute_async(string ...$args) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, array<int, string>> */
        function () use($args) : \Generator {
            $command = \implode(' ', \array_map(function ($arg) {
                return \escapeshellarg($arg);
            }, $args));
            $spec = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
            $pipes = [];
            $proc = \proc_open($command, $spec, $pipes);
            invariant($proc, "Failed to execute: %s", $command);
            list($stdin, $stdout, $stderr) = $pipes;
            \fclose($stdin);
            \stream_set_blocking($stdout, false);
            $exit_code = -2;
            $output = '';
            while (true) {
                $chunk = \stream_get_contents($stdout);
                $output .= $chunk;
                $status = \proc_get_status($proc);
                if ($status['pid'] && !$status['running']) {
                    $exit_code = $status['exitcode'];
                    break;
                }
                /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                (yield \stream_await($stdout, \STREAM_AWAIT_READ));
            }
            $output .= \stream_get_contents($stdout);
            \fclose($stdout);
            \fclose($stderr);
            \proc_close($proc);
            if ($exit_code !== 0) {
                throw new SubprocessException((array) $args, $exit_code);
            }
            return \explode("\n", $output);
        }
    );
}

