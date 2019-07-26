<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2262f4a872a1e1eae54b8dc715ece787>>
 */
namespace Facebook\HHAST;

final class EnumToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'enum';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'enum', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

