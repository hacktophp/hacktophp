<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e92c8f1555cd8c2f5b569d1622767767>>
 */
namespace Facebook\HHAST;

final class EmptyToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'empty';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'empty', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

