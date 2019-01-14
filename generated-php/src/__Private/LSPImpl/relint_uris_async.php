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

use Facebook\HHAST\__Private\{LintRunConfig, LintRunEventHandler};
use HH\Lib\Vec;
/**
 * @param array<int, string> $uris
 *
 * @return \Amp\Promise<void>
 */
function relint_uris_async(LintRunEventHandler $handler, ?LintRunConfig $config, array $uris) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, void> */
        function () use($handler, $config, $uris) : \Generator {
            (yield Vec\map_async($uris, function ($uri) use($handler, $config) {
                return (yield relint_uri_async($handler, $config, $uri));
            }));
        }
    );
}

