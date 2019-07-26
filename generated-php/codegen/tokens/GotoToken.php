<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4082062d550028c03eff5aaf9f063a20>>
 */
namespace Facebook\HHAST;

final class GotoToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'goto';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'goto', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

