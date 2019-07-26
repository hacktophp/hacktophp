<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<93e12602ac4ba01ceeb700774b4605c8>>
 */
namespace Facebook\HHAST;

final class ElseToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'else';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'else', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

