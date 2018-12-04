<?php

require_once('vendor/autoload.php');
require_once('entrypoints.php');

$valid_short_options = [
	'f:'
];

$valid_long_options = [
	'file:'
];

$options = getopt(implode('', $valid_short_options), $valid_long_options);

$file_path = $options['f'] ?? $options['file'] ?? null;

if (!is_string($file_path)) {
	die('Expecting file path' . PHP_EOL);
}

$hackfile = new HackToPhp\Transform\HackFile();

$stmts = HackToPhp\Transform\NodeTransformer::transform(HackToPhp\from_file($file_path), $hackfile);

$prettyPrinter = new \PhpParser\PrettyPrinter\Standard;
echo $prettyPrinter->prettyPrint($stmts);
echo PHP_EOL;