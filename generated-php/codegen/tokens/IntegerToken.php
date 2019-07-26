<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<37216cd1b3d60627e114231ec89cce47>>
 */
namespace Facebook\HHAST;

final class IntegerToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'integer';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'integer', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

