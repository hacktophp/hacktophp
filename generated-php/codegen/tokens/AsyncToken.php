<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e37ee71585dd9ec25dc133c1fdce7731>>
 */
namespace Facebook\HHAST;

final class AsyncToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'async';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'async', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

