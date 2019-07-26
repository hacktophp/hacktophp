<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c05bf88ba5d87572d4c23139b1709057>>
 */
namespace Facebook\HHAST;

final class XHPStringLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'XHP_string_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

