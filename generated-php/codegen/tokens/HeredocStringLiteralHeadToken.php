<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cfee78a109c0803e475311fa5304bd28>>
 */
namespace Facebook\HHAST;

final class HeredocStringLiteralHeadToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'heredoc_string_literal_head';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

