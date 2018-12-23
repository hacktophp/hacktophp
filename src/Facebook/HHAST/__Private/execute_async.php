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

use HH\Lib\{Str as Str, Vec as Vec};
// A wrapper around the built-in exec with a nicer signature.
// * returns a result rather than filling an out-parameter
// * throws on error
/**
 * @return \Sabre\Event\Promise<array<int, string>>
 */
function execute_async(string ...$args)
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, array<int, string>> */
        function () use($args) : \Generator {
            // no equivalent to stream_await
            if (false) {
                yield '';
            }
            
            $command = \implode(' ', \array_map(function ($arg) {
                return \escapeshellarg($arg);
            }, $args));
            $spec = array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w'));
            $pipes = array();
            $proc = \proc_open($command, $spec, $pipes);
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
            }
            $output .= \stream_get_contents($stdout);
            \fclose($stdout);
            \fclose($stderr);
            \proc_close($proc);
            if ($exit_code !== 0) {
                throw new SubprocessException((array) $args, $exit_code);
            }
            return \explode('
', $output);
        }
    );
}

