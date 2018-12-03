<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\__Private;

use function Sabre\Event\coroutine;
use Sabre\Event\Promise;

// A wrapper around the built-in exec with a nicer signature.
// * returns a result rather than filling an out-parameter
// * throws on error
/**
 * @return Promise<array<int, string>>
 */
function execute_async(string ...$args): Promise {
    return coroutine(
        /**
         * @return Generator<int, string, void, array<int, string>>
         */
        function() use ($args) {
            // no equivalent to stream_await
            if (false) {
                yield '';
            }

            $command = implode(
                ' ',
                array_map(
                    function($arg) {
                        return \escapeshellarg($arg);
                    },
                    $args
                )
            );

            $spec = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
            $pipes = [];

            $proc = \proc_open($command, $spec, $pipes);

            list($stdin, $stdout, $stderr) = $pipes;
            \fclose($stdin);

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
            }
            $output .= \stream_get_contents($stdout);
            \fclose($stdout);
            \fclose($stderr);

            // Always returns -1 if we called `proc_get_status` first
            \proc_close($proc);

            if ($exit_code !== 0) {
                throw new SubprocessException($args, $exit_code);
            }
            return explode("\n", $output);
        }
    );
}
