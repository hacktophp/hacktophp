<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e6dec6398f8b5061c224ca04f2dbe798>>
 */
namespace Facebook\HHAST;

final class DoubleQuotedStringLiteralTailToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'double_quoted_string_literal_tail';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

