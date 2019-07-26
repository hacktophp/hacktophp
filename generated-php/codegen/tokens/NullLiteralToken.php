<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<13ebe764e9c41dff819d4f4f773a45fa>>
 */
namespace Facebook\HHAST;

final class NullLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'null';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'null', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

