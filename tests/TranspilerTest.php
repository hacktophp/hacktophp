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