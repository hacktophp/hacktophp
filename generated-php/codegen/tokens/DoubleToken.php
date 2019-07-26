<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3d3f27bada939c60691e161935a86ba3>>
 */
namespace Facebook\HHAST;

final class DoubleToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'double';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'double', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

