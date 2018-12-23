<?php
namespace Facebook\HHAST;

final class UnsupportedTokenError extends ASTError
{
    public function __construct(string $file, int $offset, string $kind)
    {
        parent::__construct($file, $offset, 'Unsupported token kind: ' . $kind);
    }
}

