<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use Facebook\HHAST;
use HH\Lib\{C, Dict, Str};
use Facebook\CLILib\CLIWithRequiredArguments;
use Facebook\CLILib\CLIOptions;
final class InspectorCLI extends CLIWithRequiredArguments
{
    /**
     * @var null|string
     */
    private $outputPath = null;
    /**
     * @var bool
     */
    private $open = false;
    /**
     * @return array<int, string>
     */
    public static function getHelpTextForRequiredArguments()
    {
        return ['FILE'];
    }
    /**
     * @return array<int, CLIOptions\CLIOption>
     */
    protected function getSupportedOptions()
    {
        return [CLIOptions\with_required_string(function ($path) {
            $this->outputPath = $path;
        }, 'File path to use for output', '--output', '-o'), CLIOptions\flag(function () {
            $this->open = true;
        }, 'Automatically open the generated file', '--open')];
    }
    /**
     * @return \Sabre\Event\Promise<int>
     */
    public function mainAsync()
    {
        return \Sabre\Event\coroutine(
            /** @return \Generator<int, mixed, void, int> */
            function () : \Generator {
                $err = $this->getStderr();
                if (\count($this->getArguments()) !== 1) {
                    (yield $err->writeAsync("Provide exactly one file name\n"));
                    return 1;
                }
                $input = C\onlyx($this->getArguments());
                if (!\is_file($input)) {
                    (yield $err->writeAsync("Provided path is not a file.\n"));
                    return 1;
                }
                $ast = HHAST\from_file($input);
                // No XHP as XHP currently doesn't support namespaces
                $output = $this->outputPath ?? Str\format('%s/hhast-inspect-%s.html', Str\strip_suffix(\sys_get_temp_dir(), '/'), \bin2hex(\random_bytes(16)));
                \file_put_contents($output, $this->getHTMLHeader() . $this->getHTMLForNode($ast) . $this->getHTMLFooter());
                print $output . "\n";
                if ($this->open) {
                    \pcntl_exec('/usr/bin/open', [$output]);
                }
                return 0;
            }
        );
    }
    /**
     * @return string
     */
    private function getHTMLHeader()
    {
        return "<html><head><style>" . \file_get_contents(__DIR__ . '/syntax.css') . \file_get_contents(__DIR__ . '/inspector.css') . '</style></head><body>' . '<div class="info">Click on some code to get started.</div>' . '<pre><code class="language-hack">';
    }
    /**
     * @return string
     */
    private function getHTMLFooter()
    {
        return '</code></pre>' . '<script>' . \file_get_contents(__DIR__ . '/inspector.js') . '</script>' . "</body></html>\n";
    }
    /**
     * @return string
     */
    private function getHTMLForNode(HHAST\EditableNode $node)
    {
        if ($node instanceof HHAST\Missing) {
            return '';
        }
        if ($node->isTrivia()) {
            $inner = \htmlspecialchars($node->getCode());
        } else {
            if ($node instanceof HHAST\EditableToken) {
                $inner = '';
                $leading = $node->getLeading();
                if (!$leading instanceof HHAST\Missing) {
                    $inner .= '<span data-field="leading">' . $this->getHTMLForNode($leading) . '</span>';
                }
                $inner .= \htmlspecialchars($node->getText());
                $trailing = $node->getTrailing();
                if (!$trailing instanceof HHAST\Missing) {
                    $inner .= '<span data-field="trailing">' . $this->getHTMLForNode($trailing) . '</span>';
                }
            } else {
                $inner = \implode('', Dict\map_with_key($node->getChildren(), function ($key, $child) {
                    return Str\format('<span data-field="%s">%s</span>', $key, $this->getHTMLForNode($child));
                }));
            }
        }
        $class = C\lastx(\explode("\\", \get_class($node)));
        return Str\format('<span class="hs-%s" data-node="%s">%s</span>', Str\strip_prefix($class, 'Editable'), $class, $inner);
    }
}

