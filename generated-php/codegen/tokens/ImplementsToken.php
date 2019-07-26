<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8f9d90fd89595ae691a0cf3452150823>>
 */
namespace Facebook\HHAST;

final class ImplementsToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'implements';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'implements', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

