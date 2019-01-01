<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

use HH\Lib\Str;
/**
 * @param array<string, mixed> $json
 */
function from_json(array $json, ?string $file = null) : EditableNode
{
    $version = $json['version'] ?? null;
    if (\is_string($version) && $version !== SCHEMA_VERSION) {
        throw new SchemaVersionError($file ?? '! no file !', $version);
    }
    return EditableNode::fromJSON($json['parse_tree'], $file ?? '! no file !', 0, $json['program_text']);
}
/**
 * @return \Sabre\Event\Promise<array<string, mixed>>
 */
function json_from_file_async(string $file) : \Sabre\Event\Promise
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, array<string, mixed>> */
        function () use($file) : \Generator {
            try {
                try {
                    (yield __Private\ParserConcurrencyLease::getAsync());
                    $results = (yield __Private\execute_async('hh_parse', '--php5-compat-mode', '--full-fidelity-json', $file));
                } finally {
                }
            } catch (__Private\SubprocessException $e) {
                throw new HHParseError($file, 'hh_parse failed - exit code: ' . $e->getExitCode());
            }
            $json = $results[0];
            // The AST gives us byte offsets, so:
            // - we should run `hh_parse` on the unconverted source
            // - we should return the unconverted source
            //
            // https://github.com/facebook/hhvm/issues/8245
            //
            // However, `hh_parse` gives us JSON that includes non-UTF-8 sequences - so,
            // we need to convert the JSON first. While some can be converted to UTF-8,
            // this isn't guaranteed - JSON literally can't represent all the legal values
            // so the source it returns is useless.
            //
            // Given that, we don't even need to attempt to do the right conversion - we
            // can just do something cheap and throw away the result - so, we can just go
            // over the bytes, and throw them away if they're not 7-bit clean.
            $ascii = '';
            $len = \strlen($json);
            for ($i = 0; $i < $len; ++$i) {
                $byte = $json[$i];
                if ((\ord($byte) & 1 << 7) === 0) {
                    $ascii .= $byte;
                }
            }
            $json = $ascii;
            $json = \json_decode(
                $json,
                /* as array = */
                true,
                /* depth = */
                512
            );
            $no_type_refinement_please = $json;
            if (!\is_array($no_type_refinement_please)) {
                throw new HHParseError($file, 'hh_parse did not output valid JSON');
            }
            // Use the raw source rather than the re-encoded, as byte offsets may have
            // changed while re-encoding
            $json['program_text'] = \file_get_contents($file);
            return $json;
        }
    );
}
/**
 * @return array<string, mixed>
 */
function json_from_file(string $file) : array
{
    return json_from_file_async($file)->wait();
}
/**
 * @return \Sabre\Event\Promise<EditableNode>
 */
function from_file_async(string $file) : \Sabre\Event\Promise
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, EditableNode> */
        function () use($file) : \Generator {
            $json = (yield json_from_file_async($file));
            return from_json($json, $file);
        }
    );
}
function from_file(string $file) : EditableNode
{
    return from_file_async($file)->wait();
}
/**
 * @return \Sabre\Event\Promise<array<string, mixed>>
 */
function json_from_text_async(string $text) : \Sabre\Event\Promise
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, array<string, mixed>> */
        function () use($text) : \Generator {
            $file = \tempnam("/tmp", "");
            $handle = \fopen($file, "w");
            \fwrite($handle, $text);
            \fclose($handle);
            $json = (yield json_from_file_async($file));
            \unlink($file);
            return $json;
        }
    );
}
/**
 * @return array<string, mixed>
 */
function json_from_text(string $text) : array
{
    return json_from_text_async($text)->wait();
}
/**
 * @return \Sabre\Event\Promise<EditableNode>
 */
function from_code_async(string $text) : \Sabre\Event\Promise
{
    return \Sabre\Event\coroutine(
        /** @return \Generator<int, mixed, void, EditableNode> */
        function () use($text) : \Generator {
            $json = (yield json_from_text_async($text));
            return from_json($json);
        }
    );
}
function from_code(string $text) : EditableNode
{
    return from_code_async($text)->wait();
}

