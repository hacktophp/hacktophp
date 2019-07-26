<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a9a0ad9dfcf6661ac555b006596c771c>>
 */
namespace Facebook\HHAST;

final class DoubleQuotedStringLiteralHeadToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'double_quoted_string_literal_head';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

