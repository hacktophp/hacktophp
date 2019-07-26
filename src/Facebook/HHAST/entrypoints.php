<?php

namespace Facebook\HHAST;

use Facebook\HHAST\Node;



/**
 * @param array<string, mixed> $json
 */
function from_json(array $json, ?string $file) : Node
{
    $version = $json['version'] ?? null;
    
    return Script::fromJSON($json['parse_tree'], $file ?? '! no file !', 0, $json['program_text'], 'Script');
}
/**
 * @return \Amp\Promise<array<string, mixed>>
 */
function json_from_file_async(string $file) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, array<string, mixed>> */
        function () use($file) : \Generator {
            try {
                try {
                    //(yield __Private\ParserConcurrencyLease::getAsync());
                    $results = (yield __Private\execute_async('hh_parse', '--php5-compat-mode', '--full-fidelity-json', $file));
                } finally {
                }
            } catch (__Private\SubprocessException $e) {
                throw new HHParseError($file, 'hh_parse failed - exit code: ' . $e->getExitCode());
            }
            $json = $results[0];
            $ascii = '';
            $len = \strlen($json);
            for ($i = 0; $i < $len; ++$i) {
                $byte = $json[$i];
                if ((\ord($byte) & 1 << 7) === 0) {
                    $ascii .= $byte;
                }
            }
            $json = $ascii;
            $json = \json_decode($json, true, 512);
            $no_type_refinement_please = $json;
            if (!\is_array($no_type_refinement_please)) {
                throw new HHParseError($file, 'hh_parse did not output valid JSON');
            }
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
    return \Amp\Promise\wait(json_from_file_async($file));
}
/**
 * @return \Amp\Promise<Node>
 */
function from_file_async(string $file) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, Node> */
        function () use($file) : \Generator {
            $json = (yield json_from_file_async($file));
            return from_json($json, $file);
        }
    );
}
function from_file(string $file) : Node
{
    return \Amp\Promise\wait(from_file_async($file));
}
/**
 * @return \Amp\Promise<array<string, mixed>>
 */
function json_from_text_async(string $text) : \Amp\Promise
{
    return \Amp\call(
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
    return \Amp\Promise\wait(json_from_text_async($text));
}
/**
 * @return \Amp\Promise<Node>
 */
function from_code_async(string $text) : \Amp\Promise
{
    return \Amp\call(
        /** @return \Generator<int, mixed, void, Node> */
        function () use($text) : \Generator {
            $json = (yield json_from_text_async($text));
            return from_json($json);
        }
    );
}
function from_code(string $text) : Node
{
    return \Amp\Promise\wait(from_code_async($text));
}