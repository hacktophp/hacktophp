<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<352eb48ed47621571832dbe60a09911e>>
 */
namespace Facebook\HHAST;

final class ExtendsToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'extends';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'extends', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

