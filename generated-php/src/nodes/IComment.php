<?php
namespace Facebook\HHAST;

interface IComment
{
    /**
     * @return static
     */
    public function withText(string $text);
}

