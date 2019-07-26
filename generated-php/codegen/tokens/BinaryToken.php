<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<465c124dd0db7f73f5b04b88ad84fa13>>
 */
namespace Facebook\HHAST;

final class BinaryToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'binary';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'binary', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

