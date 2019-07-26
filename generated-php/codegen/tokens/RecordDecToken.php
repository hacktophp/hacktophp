<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ee31085012cd7de051993e59330beadd>>
 */
namespace Facebook\HHAST;

final class RecordDecToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'record';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'record', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

