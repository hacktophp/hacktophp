<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9e86114327a8c75642ce5086ca613aa6>>
 */
namespace Facebook\HHAST;

final class DoToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'do';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'do', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

