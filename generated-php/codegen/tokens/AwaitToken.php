<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c8a8670af3463ab03d142957bccbfe8f>>
 */
namespace Facebook\HHAST;

final class AwaitToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'await';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'await', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

