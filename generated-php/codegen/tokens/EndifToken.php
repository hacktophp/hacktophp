<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<87fce02349f6d90b674948b899e7e18f>>
 */
namespace Facebook\HHAST;

final class EndifToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'endif';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'endif', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

