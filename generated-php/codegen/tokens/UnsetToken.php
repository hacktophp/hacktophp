<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0549326cd9396df0002a6d00a72cc410>>
 */
namespace Facebook\HHAST;

final class UnsetToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'unset';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'unset', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

