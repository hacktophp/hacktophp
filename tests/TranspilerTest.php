<?php

namespace HackToPhp\Test;

use Facebook;
use HackToPhp;
use PhpParser;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TranspilerTest extends BaseTestCase
{
    /**
     * @return array
     */
    public function providerValidCodeParse()
    {
        return [
            'strlenNoNamespace' => [
                '<?hh
$a = HH\Lib\Str\length("hello");',
                '<?php
$a = \strlen("hello");',
            ],
            'strlenNamespace' => [
                '<?hh
namespace Foo;

use HH\Lib\Str;

$a = Str\length("hello");',
                '<?php
namespace Foo;
use HH\Lib\Str;
$a = \strlen("hello");',
            ],
            'underscoreFunctionParams' => [
                '<?hh
function foo($_, $_) {}',
                '<?php
function foo($_0, $_1) {}',
            ],
            'templateAsNum' => [
                '<?hh
namespace Foo;
function maxva<T as num>(
  T $first
): ?T {}',
                '<?php
namespace Foo;
/**
 * @template T as numeric
 *
 * @param T $first
 *
 * @return null|T
 */
function maxva($first) {}',
            ],
            'newtypeAlias' => [
                '<?hh

newtype Point = (int, int);

function addPoints(Point $p1, Point $p2) : Point
{
    return tuple($p1[0] + $p2[0], $p1[1] + $p2[1]);
}',
                '<?php
/**
 * @param array{0:int, 1:int} $p1
 * @param array{0:int, 1:int} $p2
 *
 * @return array{0:int, 1:int}
 */
function addPoints(array $p1, array $p2) : array
{
    return [$p1[0] + $p2[0], $p1[1] + $p2[1]];
}',
            ],
            'classString' => [
                '<?hh
namespace Foo;
class A {}

function t(classname<A> $a_class) : void {}',
                '<?php

namespace Foo;
class A {}

/**
 * @param class-string<A> $a_class
 */
function t(string $a_class) : void {
}'
            ],
            'parameterisedClass' => [
                '<?hh

class Foo<T> {
  public function __construct(private T $t) {}
  public function get() : T {
    return $this->t;
  }
}',
                '<?php
/**
 * @template T
 */
class Foo
{
    /**
     * @var T
     */
    private $t;

    /**
     * @param T $t
     */
    public function __construct($t)
    {
        $this->t = $t;
    }
    /**
     * @return T
     */
    public function get()
    {
        return $this->t;
    }
}'
            ],
            'enums' => [
                '<?hh
enum RoadType : int
{
    ROAD = 0;
    STREET = 1;
    AVENUE = 2;
}

function getRoadType() : RoadType
{
    return RoadType::AVENUE;
}',
                '<?php
/**
 * Generated enum class, do not extend
 */
abstract class RoadType
{
    const ROAD = 0;
    const STREET = 1;
    const AVENUE = 2;
}
/**
 * @return RoadType::ROAD|RoadType::STREET|RoadType::AVENUE
 */
function getRoadType()
{
    return RoadType::AVENUE;
}',
            ],
            'asScalar' => [
                '<?hh
function foo(mixed $i, mixed $j) {
    $a = $i as int;
    $b = $j ?as string;
}',
                '<?php
/**
 * @param mixed $i
 * @param mixed $j
 */
function foo($i, $j) {
    $a = \is_int($i) ? $i : (function() { throw new \TypeError(\'Failed assertion\');})();
    $b = \is_string($j) ? $j : null;
}',
            ]
        ];
    }

    /**
     * @dataProvider providerValidCodeParse
     *
     * @return void
     */
    public function testValidCode(string $hack_code, string $php_code)
    {   
        $tmpfname = tempnam("/tmp", "hacktest");

        $handle = fopen($tmpfname, "w");
        fwrite($handle, $hack_code);
        fclose($handle);

        try {
            $ast = Facebook\HHAST\from_file($tmpfname);
        } catch (Throwable $t) {
            throw $t;
        } finally {
            unlink($tmpfname);
        }

        $project = new HackToPhp\Transform\Project();

        $project->use_php_return_types = true;

        HackToPhp\Transform\TypeCollector::collect(
            $ast,
            $project,
            new HackToPhp\Transform\HackFile(),
            new HackToPhp\Transform\Scope()
        );

        $transformed_stmts = HackToPhp\Transform\NodeTransformer::transform(
            $ast,
            $project,
            new HackToPhp\Transform\HackFile(),
            new HackToPhp\Transform\Scope()
        );

        $lexer = new PhpParser\Lexer([ 'usedAttributes' => ['comments'] ]);

        $php_parser = (new PhpParser\ParserFactory())->create(PhpParser\ParserFactory::PREFER_PHP7, $lexer);

        $parser_stmts = $php_parser->parse($php_code);

        $prettyPrinter = new \PhpParser\PrettyPrinter\Standard;

        $this->assertSame(
            str_replace('\'', '"', $prettyPrinter->prettyPrint($parser_stmts)),
            str_replace('\'', '"', rtrim($prettyPrinter->prettyPrint($transformed_stmts)))
        );
    }
}