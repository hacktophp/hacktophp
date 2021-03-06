<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<57d5dab1aeac0ed98fd831363ea34dfc>>
 */
namespace Facebook\HHAST;

final class BooleanToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'boolean';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'boolean', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

