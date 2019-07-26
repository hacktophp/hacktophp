<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<eac7e1a09177396cb9b1d8c2ec633865>>
 */
namespace Facebook\HHAST;

final class DecimalLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'decimal_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

