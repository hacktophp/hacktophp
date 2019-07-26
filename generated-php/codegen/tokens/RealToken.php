<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1e78bb4d0c70b53293862e314fab39e7>>
 */
namespace Facebook\HHAST;

final class RealToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'real';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'real', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

