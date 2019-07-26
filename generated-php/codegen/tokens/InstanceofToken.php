<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7984fa5bc4ed5ae7b51acdc7d54cbbe9>>
 */
namespace Facebook\HHAST;

final class InstanceofToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'instanceof';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'instanceof', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

