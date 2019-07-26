<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<57aa4d49250aeb04bd697c924426b1d2>>
 */
namespace Facebook\HHAST;

final class IssetToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'isset';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'isset', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

