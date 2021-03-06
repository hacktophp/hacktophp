<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d7b4732c8b23309477c06e132b838c21>>
 */
namespace Facebook\HHAST;

final class ReturnToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'return';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'return', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

