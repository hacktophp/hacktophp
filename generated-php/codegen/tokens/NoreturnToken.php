<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e9450f4ede1ead827cc2a3b53aa1729b>>
 */
namespace Facebook\HHAST;

final class NoreturnToken extends TokenWithVariableText implements __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'noreturn';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'noreturn', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

