<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<29c5db3372605466181a216318288fc9>>
 */
namespace Facebook\HHAST;

final class BreakToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'break';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'break', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

