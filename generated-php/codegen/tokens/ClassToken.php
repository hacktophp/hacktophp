<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f1cd7d9f6bd35aeebd4e1ff2b2ffee5b>>
 */
namespace Facebook\HHAST;

final class ClassToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'class';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'class', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

