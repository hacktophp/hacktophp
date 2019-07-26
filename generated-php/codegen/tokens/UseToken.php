<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d934bd831a4a9a89939f9c00b44d7dc7>>
 */
namespace Facebook\HHAST;

final class UseToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'use';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'use', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

