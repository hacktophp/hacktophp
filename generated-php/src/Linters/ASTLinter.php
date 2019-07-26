<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\Node;
use Facebook\HHAST;
use Facebook\HHAST\Linters\SuppressASTLinter;
/**
 * @template Tnode as HHAST\Node
 */
abstract class ASTLinter extends BaseLinter
{
    /**
     * @var null|HHAST\Node
     */
    private $ast;
    /**
     * @return \Amp\Promise<HHAST\Node>
     */
    private static function getASTFromFileAsync(File $file)
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, HHAST\Node> */
            function () use($file) : \Generator {
                static $cache = null;
                $hash = \sha1($file->getContents(), true);
                if ($cache !== null && $cache['hash'] === $hash) {
                    return $cache['ast'];
                }
                $ast = (yield HHAST\from_code_async($file->getContents()));
                $cache = ['hash' => $hash, 'ast' => $ast];
                return $ast;
            }
        );
    }
    /**
     * @return array<int, array{0:Node, 1:array<int, Node>}>
     */
    private function getASTWithParents()
    {
        static $cache = null;
        $ast = $this->getAST();
        if ($cache !== null && $cache[0][0] === $ast) {
            return $cache;
        }
        $cache = $ast->traverseWithParents();
        return $cache;
    }
    /**
     * @return Tnode::class
     */
    protected static abstract function getTargetType();
    /**
     * @param Tnode $node
     * @param array<int, Node> $parents
     *
     * @return ASTLintError<Tnode>|null
     */
    protected abstract function getLintErrorForNode($node, array $parents);
    /**
     * Some parts of the node may be irrelevant to the actual error; strip them
     * out here to display more concise messages to humans.
     */
    /**
     * @param Tnode $node
     *
     * @return string
     */
    public function getPrettyTextForNode($node)
    {
        return $node->getCode();
    }
    /**
     * @return \Amp\Promise<array<int, ASTLintError<Tnode>>>
     */
    public final function getLintErrorsAsync()
    {
        return \Amp\call(
            /** @return \Generator<int, mixed, void, array<int, ASTLintError<Tnode>>> */
            function () : \Generator {
                $this->ast = (yield self::getASTFromFileAsync($this->getFile()));
                $target = static::getTargetType();
                $errors = [];
                foreach ($this->getASTWithParents() as list($node, $parents)) {
                    if ($node instanceof $target) {
                        try {
                            $error = $this->getLintErrorForNode($node, $parents);
                        } catch (LinterException $e) {
                            if ($e->getPosition() !== null) {
                                throw $e;
                            }
                            try {
                                $position = HHAST\find_position($this->getAST(), $node);
                            } catch (\Throwable $_) {
                                throw $e;
                            }
                            throw new LinterException($e->getLinterClass(), $e->getFileBeingLinted(), $e->getRawMessage(), $position, $e->getPrevious());
                        } catch (\Throwable $t) {
                            try {
                                $position = HHAST\find_position($this->getAST(), $node);
                            } catch (\Throwable $_) {
                                throw $t;
                            }
                            throw new LinterException(static::class, $this->getFile()->getPath(), $t->getMessage(), $position, $t);
                        }
                        if ($error !== null && !SuppressASTLinter\is_linter_error_suppressed($this, $node, $parents, $error)) {
                            $errors[] = $error;
                        }
                    }
                }
                return $errors;
            }
        );
    }
    /**
     * @return HHAST\Node
     */
    public final function getAST()
    {
        $ast = $this->ast;
        invariant($ast !== null, "Calling getAST before it was initialized");
        return $ast;
    }
}

