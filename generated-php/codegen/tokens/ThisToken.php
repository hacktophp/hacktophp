<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8fd534b7a9345c484c5302179aac5a1d>>
 */
namespace Facebook\HHAST;

final class ThisToken extends TokenWithVariableText implements __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'this';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'this', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

