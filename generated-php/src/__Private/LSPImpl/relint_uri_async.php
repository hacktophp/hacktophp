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

use Facebook\HHAST\__Private\{LintRun, LintRunConfig, LintRunEventHandler};
use Facebook\HHAST\Linters\File;
use HH\Lib\Str;
/**
 * @return \Amp\Promise<void>
 */
function relint_uri_async(LintRunEventHandler $handler, ?LintRunConfig $config, string $uri, ?string $content = null) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, void> */
        function () use($handler, $config, $uri, $content) : \Generator {
            $path = Str\strip_prefix($uri, 'file://');
            $config = $config ?? LintRunConfig::getForPath($path);
            $lint_run = new LintRun($config, $handler, [$path]);
            if ($content !== null) {
                $lint_run = $lint_run->withFile(new File($path, $content));
            }
            (yield $lint_run->runAsync());
        }
    );
}

