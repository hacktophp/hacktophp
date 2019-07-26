<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<86ab3afa11b130a91aa38a468720c4b6>>
 */
namespace Facebook\HHAST;

final class RecordToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'recordname';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'recordname', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

