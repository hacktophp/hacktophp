<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dd4f80063eb71366c69a968cf94609be>>
 */
namespace Facebook\HHAST;

final class BooleanLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'boolean_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

