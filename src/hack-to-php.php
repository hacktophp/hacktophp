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
	die('Expecting folder' . PHP_EOL);
}

if (!file_exists($file_path)) {
	die('File/folder does not exist' . PHP_EOL);
}

/**
 * @param string $dir_path
 * @param array<string> $file_extensions
 *
 * @return array<int, string>
 */
function getFilesInDir($dir_path, array $file_extensions)
{
    $file_paths = [];

    /** @var \RecursiveDirectoryIterator */
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir_path));
    $iterator->rewind();

    while ($iterator->valid()) {
        if (!$iterator->isDot()) {
            $extension = $iterator->getExtension();
            if (in_array($extension, $file_extensions, true)) {
                $file_paths[] = (string)$iterator->getRealPath();
            }
        }

        $iterator->next();
    }

    return $file_paths;
}

$file_paths = is_dir($file_path) ? getFilesInDir($file_path, ['php']) : [$file_path];


$project = new HackToPhp\Transform\Project();

echo 'Looking for types' . PHP_EOL;

foreach ($file_paths as $file_path) {
	$ast = HackToPhp\from_file($file_path);
	HackToPhp\Transform\TypeCollector::collect(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);
}

var_dump($project->types);

echo 'Converting files' . PHP_EOL;

foreach ($file_paths as $file_path) {
	$ast = HackToPhp\from_file($file_path);
	$stmts = HackToPhp\Transform\NodeTransformer::transform(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);

	$prettyPrinter = new \PhpParser\PrettyPrinter\Standard;
	echo $prettyPrinter->prettyPrint($stmts);
	echo PHP_EOL;
}

