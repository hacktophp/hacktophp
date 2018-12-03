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

var_dump(HackToPhp\from_file($file_path));