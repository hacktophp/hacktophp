<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8f20386f2ca2432e9eaffc0aaacb79aa>>
 */
namespace Facebook\HHAST;

final class VecToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'vec';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'vec', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

