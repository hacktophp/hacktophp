<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9393662147a461e489a34faa9ea583ed>>
 */
namespace Facebook\HHAST;

final class HexadecimalLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'hexadecimal_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

