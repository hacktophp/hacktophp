<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bd51990541b9b1e33c03ec80a7577c6f>>
 */
namespace Facebook\HHAST;

final class BoolToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'bool';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'bool', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

