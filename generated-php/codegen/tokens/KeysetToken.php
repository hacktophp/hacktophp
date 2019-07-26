<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c8101ff88a5d9ab91bc9159120ff1b6a>>
 */
namespace Facebook\HHAST;

final class KeysetToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'keyset';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'keyset', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

