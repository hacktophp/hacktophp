<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4dbac2d7f16a6a85b6b115c3536c3da5>>
 */
namespace Facebook\HHAST;

final class ProtectedToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'protected';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'protected', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

