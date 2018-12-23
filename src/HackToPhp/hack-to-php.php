<?php

require_once('vendor/autoload.php');
require_once(dirname(__DIR__) . '/Facebook/HHAST/entrypoints.php');

$valid_short_options = [];

$valid_long_options = [
	'input:',
	'output:'
];

$options = getopt(implode('', $valid_short_options), $valid_long_options);

$input_path = $options['input'] ?? null;
$output_path = $options['output'] ?? null;

if (!is_string($input_path)) {
	die('Expecting input folder' . PHP_EOL);
}

if (!is_string($output_path)) {
	die('Expecting output folder' . PHP_EOL);
}

if (!file_exists($input_path)) {
	die('Input file/folder does not exist' . PHP_EOL);
}

if (!file_exists($output_path)) {
	if (file_exists(dirname($output_path))) {
		$p = pathinfo($output_path);
		$output_path = realpath($p['dirname']) . DIRECTORY_SEPARATOR . $p['basename'];
	} else {
		die('Output file path not accessible, directory does not exist' . PHP_EOL);
	}
} else {
	$output_path = realpath($output_path);

	if (is_dir($output_path) && !is_dir($input_path)) {
		die('Output path must be a file if input path is' . PHP_EOL);
	}
}

$input_path = realpath($input_path);


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

$input_file_paths = is_dir($input_path) ? getFilesInDir($input_path, ['php']) : [$input_path];


$project = new HackToPhp\Transform\Project();

echo 'Looking for types' . PHP_EOL;

foreach ($input_file_paths as $input_file_path) {
	$ast = Facebook\HHAST\from_file($input_file_path);
	HackToPhp\Transform\TypeCollector::collect(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);
}

echo 'Converting files' . PHP_EOL;

foreach ($input_file_paths as $input_file_path) {
	$ast = Facebook\HHAST\from_file($input_file_path);
	echo 'Transforming ' . $input_file_path . PHP_EOL;
	$stmts = HackToPhp\Transform\NodeTransformer::transform(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);

	$prettyPrinter = new \PhpParser\PrettyPrinter\Standard;
	$file_output = '<?php' . PHP_EOL . $prettyPrinter->prettyPrint($stmts) . PHP_EOL;
	
	if ($input_file_path === $input_path) {
		//echo $file_output;
		echo 'Saving to ' . $output_path . PHP_EOL;
		file_put_contents($output_path, $file_output);
	} else {
		$stubbed_path = preg_replace('/^' . preg_quote($input_path, '//') . '/', '', $input_file_path);
		$output_file_path = $output_path . $stubbed_path;
		if (!file_exists(dirname($output_file_path))) {
			mkdir(dirname($output_file_path), 0777, true);
		}
		//echo $file_output;
		echo 'Saving to ' . $output_file_path . PHP_EOL;
		file_put_contents($output_file_path, $file_output);
	}
}

