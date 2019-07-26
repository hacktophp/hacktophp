<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8de99707312f17437df4abfa659f9c28>>
 */
namespace Facebook\HHAST;

final class DefaultToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'default';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'default', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

