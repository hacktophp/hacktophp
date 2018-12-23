<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{LintRunConfig as LintRunConfig, LintRunEventHandler as LintRunEventHandler};
use HH\Lib\Vec as Vec;
/**
 * @param array<int, string> $uris
 *
 * @return \Sabre\Event\Promise<void>
 */
function relint_uris_async(LintRunEventHandler $handler, ?LintRunConfig $config, array $uris)
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, void> */
        function () use($handler, $config, $uris) : \Generator {
            (yield Vec\map_async($uris, function ($uri) use($handler, $config) {
                return (yield relint_uri_async($handler, $config, $uri));
            }));
        }
    );
}

