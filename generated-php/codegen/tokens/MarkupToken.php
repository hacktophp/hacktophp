<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<52342d7f0e8b7f3341cfe1e6ba64bfb4>>
 */
namespace Facebook\HHAST;

final class MarkupToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'markup';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

