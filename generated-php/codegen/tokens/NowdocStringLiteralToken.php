<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a943cbb18fdcd387b6745d51808add3f>>
 */
namespace Facebook\HHAST;

final class NowdocStringLiteralToken extends TokenWithVariableText implements IStringLiteral
{
    /**
     * @var string
     */
    const KIND = 'nowdoc_string_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

