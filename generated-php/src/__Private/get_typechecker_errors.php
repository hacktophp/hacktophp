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


use HH\Lib\Str;
use Facebook\TypeAssert;


/**
 * @return array<int, array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>}>
 */
function get_typechecker_errors(string $path) : array
{
    $path = \realpath($path);
    $command = ['hh_client', '--json', '--from', 'hhast', \escapeshellarg($path)];
    $output = \tempnam(\sys_get_temp_dir(), 'hhast-temp');
    \exec(\implode(' ', $command) . ' >/dev/null 2>' . \escapeshellarg($output));
    // Exit code is unstable, so not checking it
    $lines = \file_get_contents($output);
    \unlink($output);
    $untyped_data = null;
    foreach (\explode("\n", $lines) as $maybe_json) {
        $untyped_data = \json_decode(
            $maybe_json,
            /* assoc = */
            true,
            /* depth = */
            512
        );
    }
    $data = TypeAssert\matches_type_structure(type_alias_structure(TTypecheckerOutput::class), $untyped_data);
    return $data['errors'] ?? [];
}

