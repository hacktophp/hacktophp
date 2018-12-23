<?php
namespace Facebook\HHAST\__Private;

use Facebook\HHAST as HHAST;
use HH\Lib\{C as C, Dict as Dict, Keyset as Keyset, Str as Str, Tuple as Tuple, Vec as Vec};
use Facebook\HackCodegen\{HackBuilderKeys as HackBuilderKeys, HackBuilderValues as HackBuilderValues};
use Facebook\TypeAssert as TypeAssert;
final class CodegenRelations extends CodegenBase
{
    /**
     * @var string
     */
    private $hhvmRoot;
    /**
     * @var string
     *
     * @param array{trivia:Schema\Traversable<array{trivia_kind_name:string, trivia_type_name:string}>, tokens:Schema\Traversable<array{token_kind:string, token_text:null|string}>, AST:Schema\Traversable<array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>}>, description:string, version:string} $schema
     */
    public function __construct(string $hhvmRoot, $schema)
    {
        $this->hhvmRoot = $hhvmRoot;
        $relationships = array();
        parent::__construct($schema, $relationships);
    }
    /**
     * @return void
     */
    public function generate()
    {
        print 'Infering relationships, this can take a long time...
';
        $files = $this->getFileList();
        $done = new \Facebook\HHAST\__Private\Set();
        $start = \microtime(true);
        list($all_inferences, $_) = Tuple\from_async(Vec\map_async($files, function ($file) use($t, $done) {
            try {
                return (yield $this->getRelationsInFileAsync($file));
            } catch (\Throwable $t) {
                throw $t;
            } finally {
                $done[] = $file;
            }
        }), (function () use($total, $files, $done, $ratio, $now, $elapsed, $start, $rate, $end) {
            $total = \count($files);
            while ($done->count() < $total) {
                (yield \HH\Asio\usleep(1000 * 1000));
                $ratio = (double) $done->count() / $total;
                $now = \microtime(true);
                $elapsed = $now - $start;
                $rate = $done->count() / $elapsed;
                $end = $start + $total / $rate;
                \fprintf(\STDERR, '%d%%	(%d / %d)	Expected finish in %ds at %s
', (int) ($ratio * 100), $done->count(), $total, (int) ($end - $now), \strftime('%H:%M:%S', (int) $end));
            }
        })())->wait();
        $result = array();
        foreach ($all_inferences as $inferences) {
            foreach ($inferences as $key => $child_keys) {
                $result[$key] = Keyset\sort(Keyset\flatten(array($result[$key] ?? array(), $child_keys)));
            }
        }
        $result = Dict\sort_by_key($result);
        $cg = $this->getCodegenFactory();
        $cg->codegenFile($this->getOutputDirectory() . '/inferred_relationships.php')->setNamespace('Facebook\\HHAST\\__Private')->addConstant($cg->codegenConstant('INFERRED_RELATIONSHIPS')->setType('dict<string, keyset<string>>')->setValue($result, HackBuilderValues::dict(HackBuilderKeys::export(), HackBuilderValues::keyset(HackBuilderValues::export()))))->save();
        print '... done!
';
    }
    /**
     * @return array<string, string>
     */
    private function getFileList()
    {
        $hhvm_dirs = array('quick' => 'quick', 'slow' => 'slow', 'zend/good/' => 'zend/good/');
        $hhvm_tests = Keyset\flatten(\array_map(function ($dir) {
            return $this->getFileListFromHHVMTestDirectory($dir);
        }, \array_map(function ($dir) {
            return $this->hhvmRoot . '/hphp/test/' . $dir;
        }, $hhvm_dirs)));
        $hack_tests = $this->getFileListFromHackTestDirectory($this->hhvmRoot . '/hphp/hack/test/typecheck');
        $systemlib = $this->getTestFilesInDirectory($this->hhvmRoot . '/hphp/system/php');
        return Keyset\flatten(array($hhvm_tests, $hack_tests, $systemlib));
    }
    /**
     * @return array<string, string>
     */
    private function getFileListFromHHVMTestDirectory(string $root)
    {
        return Keyset\filter($this->getTestFilesInDirectory($root), function ($path) use($expect, $out) {
            if (\file_exists($path . '.expect')) {
                $expect = $path . '.expect';
            } else {
                if (\file_exists($path . '.expectf')) {
                    $expect = $path . '.expectf';
                } else {
                    return false;
                }
            }
            $out = \file_get_contents($expect);
            if (Str\contains($out, 'Fatal error: syntax error')) {
                return false;
            }
            if (Str\contains($out, 'as it is reserved')) {
                return false;
            }
            return true;
        });
    }
    /**
     * @return array<string, string>
     */
    private function getFileListFromHackTestDirectory(string $root)
    {
        return Keyset\filter($this->getTestFilesInDirectory($root), function ($path) use($out) {
            if (!\file_exists($path . '.exp')) {
                return false;
            }
            $out = \file_get_contents($path . '.exp');
            return $out === 'No errors
';
        });
    }
    /**
     * @return Traversable<string>
     */
    private function getTestFilesInDirectory(string $root)
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
        foreach ($it as $info) {
            if (!$info->isFile()) {
                continue;
            }
            $ext = Str\lowercase($info->getExtension());
            if ($ext !== 'php' && $ext !== 'hh') {
                continue;
            }
            (yield $info->getPathname());
        }
    }
    /**
     * @return \Sabre\Event\Promise<array<string, array<string, string>>>
     */
    private function getRelationsInFileAsync(string $file)
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, array<string, array<string, string>>> */
            function () use($file) : \Generator {
                try {
                    $json = (yield HHAST\json_from_file_async($file));
                    $ast = $this->flatten($json['parse_tree']);
                } catch (\Exception $_) {
                    if (!Str\contains(\file_get_contents($file), '<?php')) {
                        \fprintf(\STDERR, 'Failed to parse %s
', $file);
                    }
                    return array();
                }
                $out = array();
                $schemas = Dict\pull($this->getSchema()['AST'], function ($schema) {
                    return $schema;
                }, function ($schema) {
                    return $schema['type_name'];
                });
                foreach ($ast as $node) {
                    $kind = (string) $node['kind'];
                    if (!C\contains_key($schemas, $kind)) {
                        continue;
                    }
                    $schema = $schemas[$kind];
                    foreach ($schema['fields'] as $field) {
                        $field = $schema['prefix'] . '_' . $field['field_name'];
                        if (C\contains_key($node, $field)) {
                            $key = $kind . '.' . $field;
                            if (!C\contains_key($out, $key)) {
                                $out[$key] = array();
                            }
                            $child = TypeAssert\matches_type_structure(type_structure(self::class, 'TNode'), $node[$field]);
                            $out[$key][] = self::getTypeString($child);
                        }
                    }
                }
                return $out;
            }
        );
    }
    /**
     * @param mixed $node
     *
     * @return string
     */
    public static function getTypeString($node)
    {
        $kind = $node['kind'];
        if ($kind === 'token') {
            return 'token:' . TypeAssert\not_null($node['token']['kind'] ?? null);
        }
        if ($kind !== 'list') {
            return $kind;
        }
        $ts = type_structure(self::class, 'TNode');
        $types = Keyset\sort(\array_map(function ($i) {
            return self::getTypeString($i);
        }, \array_map(function ($e) use($ts) {
            return TypeAssert\matches_type_structure($ts, $e['list_item'] ?? null);
        }, Vec\filter($node['elements'] ?? array(), function ($e) {
            return Shapes::keyExists($e, 'list_item');
        }))));
        return 'list<' . \implode('|', $types) . '>';
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return Traversable<array<string, mixed>>
     */
    public function flatten(array $json)
    {
        (yield $json);
        $kind = (string) $json['kind'];
        $schemas = Dict\pull($this->getSchema()['AST'], function ($schema) {
            return $schema;
        }, function ($schema) {
            return $schema['type_name'];
        });
        switch ($kind) {
            case 'token':
                (yield $json['token']);
                break;
            case 'list':
                foreach ($json['elements'] as $item) {
                    foreach ($this->flatten($item) as $inner) {
                        (yield $inner);
                    }
                }
                break;
            case 'missing':
                return;
            default:
                $schema = $schemas[$kind] ?? null;
                if ($schema === null) {
                    return;
                }
                foreach ($schema['fields'] as $field) {
                    $field = $schema['prefix'] . '_' . $field['field_name'];
                    $content = $json[$field] ?? null;
                    if ($content !== null) {
                        foreach ($this->flatten($content) as $inner) {
                            (yield $inner);
                        }
                    }
                }
        }
    }
}

