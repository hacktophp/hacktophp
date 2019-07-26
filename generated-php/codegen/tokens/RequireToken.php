<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3342c7cb6d5f2539cf2cec83b9db5175>>
 */
namespace Facebook\HHAST;

final class RequireToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'require';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'require', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

