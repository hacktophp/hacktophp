<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e3f04859b0c214800b8c33162b8f3056>>
 */
namespace Facebook\HHAST;

final class VarToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'var';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'var', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

