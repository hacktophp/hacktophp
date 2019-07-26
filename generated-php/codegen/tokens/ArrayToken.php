<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8671fa4d36514faae420a6a8ad9139a3>>
 */
namespace Facebook\HHAST;

final class ArrayToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'array';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'array', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

