<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<80a039bd23e4ccd9fe8b3116e6dbfa09>>
 */
namespace Facebook\HHAST;

final class CategoryToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'category';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'category', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

