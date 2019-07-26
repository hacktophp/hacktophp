<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8082b0542d723458b7f78fb9678b87dd>>
 */
namespace Facebook\HHAST;

final class ChildrenToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'children';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'children', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

