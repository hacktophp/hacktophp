<?php

require_once('vendor/autoload.php');

$valid_short_options = [];

$valid_long_options = [
	'input:',
	'output:'
];

$options = getopt(implode('', $valid_short_options), $valid_long_options);

$input_paths = $options['input'] ?? null;
$output_path = $options['output'] ?? null;

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

if (is_string($input_paths)) {
	$input_paths = [$input_paths];
}

if (!is_array($input_paths) || !$input_paths) {
	die('Expecting input folder' . PHP_EOL);
}

if (!is_string($output_path)) {
	die('Expecting output folder' . PHP_EOL);
}

$working_dir = getcwd() . DIRECTORY_SEPARATOR;

$common_path = null;

foreach ($input_paths as $i => $input_path) {
	if (!file_exists($working_dir . $input_path)) {
		die('Input ' . $working_dir . $input_path . ' does not exist' . PHP_EOL);
	}

	$input_path = $input_paths[$i] = realpath($working_dir . $input_path);

	if ($common_path === null) {
		$common_path = $input_path;
	} else {
		$path_parts = explode(DIRECTORY_SEPARATOR, $common_path);

		$new_common_path = array_shift($path_parts);

		while ($path_parts) {
			$new_path = $new_common_path . DIRECTORY_SEPARATOR . $path_parts[0];
			
			if (preg_match('/^' . preg_quote($new_path, '//') . '/', $input_path)) {
				$new_common_path .= DIRECTORY_SEPARATOR . array_shift($path_parts);
			} else {
				break;
			}
		}

		$common_path = $new_common_path;
	}
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

$input_file_paths = [];

foreach ($input_paths as $input_path) {
	if (is_dir($input_path)) {
		$dir_input_file_paths = getFilesInDir($input_path, ['php', 'hack', 'hh', 'hck']) ;

		foreach ($dir_input_file_paths as $dir_input_file_path) {
			$stubbed_path = preg_replace('/^' . preg_quote($common_path, '//') . '/', '', $dir_input_file_path);
			$output_file_path = $output_path . preg_replace('/(\.(hack|hh|hck))$/', '.php', $stubbed_path);
			
			if (!file_exists(dirname($output_file_path))) {
				mkdir(dirname($output_file_path), 0777, true);
			}

			$input_file_paths[$dir_input_file_path] = $output_file_path;
		}
	} else {
		if (is_dir($output_path)) {
			die('If input path is a file, output path must be as well');
		}
		$input_file_paths[$input_path] = $output_path;
	}
}

$project = new HackToPhp\Transform\Project();

echo 'Looking for types' . PHP_EOL;

foreach ($input_file_paths as $input_file_path => $_) {
	$ast = Facebook\HHAST\from_file($input_file_path);
	HackToPhp\Transform\TypeCollector::collect(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);
}

// do it again, because some types might reference one another
foreach ($input_file_paths as $input_file_path => $_) {
	$ast = Facebook\HHAST\from_file($input_file_path);
	HackToPhp\Transform\TypeCollector::collect(
		$ast,
		$project,
		new HackToPhp\Transform\HackFile(),
		new HackToPhp\Transform\Scope()
	);
}

echo 'Converting files' . PHP_EOL;

foreach ($input_file_paths as $input_file_path => $output_file_path) {
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
	
	//echo $file_output;
	echo 'Saving to ' . $output_file_path . PHP_EOL;
	file_put_contents($output_file_path, $file_output);
}

