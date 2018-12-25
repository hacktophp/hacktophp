<?php

namespace HackToPhp\Test;

use Facebook;
use HackToPhp;
use PhpParser;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ParsePhpTest extends BaseTestCase
{
    /**
     * @return array
     */
    public function providerValidCodeParse()
    {
        $codes = explode('<?php', file_get_contents(__DIR__ . '/psalm_php_testcases.php'));
        array_shift($codes);

        return array_map(
            function ($f) {
                return ['<?php' . $f];
            },
            $codes
        );
    }

    /**
     * @dataProvider providerValidCodeParse
     *
     * @param string $code
     *
     * @return void
     */
    public function testValidCode(string $code)
    {   
        $tmpfname = tempnam("/tmp", "hacktest");

        $handle = fopen($tmpfname, "w");
        fwrite($handle, $code);
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

        $parser_stmts = $php_parser->parse($code);

        $prettyPrinter = new \PhpParser\PrettyPrinter\Standard;

        $this->assertSame(
            str_replace('"', '\'', $prettyPrinter->prettyPrint($parser_stmts)),
            rtrim($prettyPrinter->prettyPrint($transformed_stmts))
        );
    }
}