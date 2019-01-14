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

use HH\Lib\Str;
use HH\Lib\Experimental\IO;
/**
 * @return \Amp\Promise<string>
 */
function read_message_async(IO\ReadHandle $in) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, string> */
        function () use($in) : \Generator {
            $length = null;
            $line = '';
            while (true) {
                /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
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
            invariant($length !== null, "Expected a content-length header");
            // read body
            $body = '';
            while ($length > 0 && !$in->isEndOfFile()) {
                /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
                $part = (yield $in->readAsync($length));
                $body .= $part;
                $length -= \strlen($part);
                invariant($length >= 0, 'negative bytes remaining');
            }
            return $body;
        }
    );
}

