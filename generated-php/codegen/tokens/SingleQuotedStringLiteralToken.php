<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<69a8277fb9ff3a58957fbc7d73d7faa2>>
 */
namespace Facebook\HHAST;

final class SingleQuotedStringLiteralToken extends TokenWithVariableText implements IStringLiteral
{
    /**
     * @var string
     */
    const KIND = 'single_quoted_string_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

