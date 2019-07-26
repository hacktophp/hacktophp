<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e282584d2d3a279ca27d617c32bd6ec1>>
 */
namespace Facebook\HHAST;

final class FloatToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'float';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'float', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

