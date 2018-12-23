<?php
namespace Facebook\HHAST;

final class HHParseError extends ParseError
{
    public function __construct(string $file, string $message)
    {
        parent::__construct($file, null, $message);
    }
}

