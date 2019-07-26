<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<898063f1e09b020d58e5915296b28502>>
 */
namespace Facebook\HHAST;

final class TypeToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'type';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'type', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

