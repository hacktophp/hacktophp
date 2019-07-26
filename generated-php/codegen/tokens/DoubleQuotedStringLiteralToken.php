<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<24b7354c05dd66df29eda67c190b8b9e>>
 */
namespace Facebook\HHAST;

final class DoubleQuotedStringLiteralToken extends TokenWithVariableText implements IStringLiteral
{
    /**
     * @var string
     */
    const KIND = 'double_quoted_string_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

