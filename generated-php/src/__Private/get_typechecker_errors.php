<?php
namespace Facebook\HHAST\__Private;


use HH\Lib\Str as Str;
use Facebook\TypeAssert as TypeAssert;


/**
 * @return array<int, array{message:array<int, array{path:string, descr:string, line:int, start:int, end:int, code:int}>}>
 */
function get_typechecker_errors(string $path)
{
    $path = \realpath($path);
    $command = array('hh_client', '--json', '--from', 'hhast', \escapeshellarg($path));
    $output = \tempnam(\sys_get_temp_dir(), 'hhast-temp');
    \exec(\implode(' ', $command) . ' >/dev/null 2>' . \escapeshellarg($output));
    $lines = \file_get_contents($output);
    \unlink($output);
    $untyped_data = null;
    foreach (\explode('
', $lines) as $maybe_json) {
        $untyped_data = \json_decode($maybe_json, true, 512);
    }
    
    $data = TypeAssert\matches_type_structure(type_alias_structure(TTypecheckerOutput::class), $untyped_data);
    return $data['errors'] ?? array();
}

