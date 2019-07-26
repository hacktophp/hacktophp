<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<86d6b9d970d25ec9f21ed4e6703cfdfa>>
 */
namespace Facebook\HHAST;

final class DictToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'dict';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'dict', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

