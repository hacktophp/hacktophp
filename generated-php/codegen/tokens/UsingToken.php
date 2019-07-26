<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d2d4a70a3c3027a9710c37bdabdafe26>>
 */
namespace Facebook\HHAST;

final class UsingToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'using';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'using', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

