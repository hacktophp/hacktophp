<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use HH\Lib\Str as Str;
use HH\Lib\Experimental\IO as IO;
/**
 * @return \Sabre\Event\Promise<string>
 */
function read_message_async(IO\ReadHandle $in)
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, string> */
        function () use($in) : \Generator {
            $length = null;
            $line = '';
            while (true) {
                $line = (yield $in->readLineAsync());
                $line = Str\trim($line);
                if ($line === '') {
                    break;
                }
                if (!Str\starts_with($line, 'Content-Length')) {
                    continue;
                }
                $length = Str\to_int(Str\trim(Str\strip_prefix($line, 'Content-Length:')));
            }
            invariant($length !== null, 'Expected a content-length header');
            $body = '';
            while ($length > 0 && !$in->isEndOfFile()) {
                $part = (yield $in->readAsync($length));
                $body .= $part;
                $length -= \strlen($part);
                invariant($length >= 0, 'negative bytes remaining');
            }
            return $body;
        }
    );
}

