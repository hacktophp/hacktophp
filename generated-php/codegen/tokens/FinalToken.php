<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<34e991fccc10119e90da568d2f84ecc1>>
 */
namespace Facebook\HHAST;

final class FinalToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'final';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'final', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

