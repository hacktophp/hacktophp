<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b0c7aabff17b65677f12f5ed926dbf74>>
 */
namespace Facebook\HHAST;

final class BinaryLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'binary_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

