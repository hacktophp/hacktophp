<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fd3161af773003945237800c32fe5a7c>>
 */
namespace Facebook\HHAST;

final class ConstructToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = '__construct';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = '__construct', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

