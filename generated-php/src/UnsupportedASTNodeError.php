<?php
namespace Facebook\HHAST;

final class UnsupportedASTNodeError extends ASTError
{
    public function __construct(string $file, int $offset, string $kind)
    {
        parent::__construct($file, $offset, 'Unsupported AST node kind: ' . $kind);
    }
}

