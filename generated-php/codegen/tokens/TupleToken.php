<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<38d38cb4fcbc48bf76a373e8441a1670>>
 */
namespace Facebook\HHAST;

final class TupleToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'tuple';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'tuple', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

