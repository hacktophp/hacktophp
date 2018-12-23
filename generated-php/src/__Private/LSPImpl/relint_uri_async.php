<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\__Private\{LintRun as LintRun, LintRunConfig as LintRunConfig, LintRunEventHandler as LintRunEventHandler};
use Facebook\HHAST\Linters\File as File;
use HH\Lib\Str as Str;
/**
 * @return \Sabre\Event\Promise<void>
 */
function relint_uri_async(LintRunEventHandler $handler, ?LintRunConfig $config, string $uri, ?string $content = null)
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, void> */
        function () use($handler, $config, $uri, $content) : \Generator {
            $path = Str\strip_prefix($uri, 'file://');
            $config = $config ?? LintRunConfig::getForPath($path);
            $lint_run = new LintRun($config, $handler, array($path));
            if ($content !== null) {
                $lint_run = $lint_run->withFile(new File($path, $content));
            }
            (yield $lint_run->runAsync());
        }
    );
}

