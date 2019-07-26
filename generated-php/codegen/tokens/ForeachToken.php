<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2d98694c3c08c8fcad0af88e98ee61be>>
 */
namespace Facebook\HHAST;

final class ForeachToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'foreach';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'foreach', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

