<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<64ce97170d6edf4d99e65bad6a5317cc>>
 */
namespace Facebook\HHAST;

final class StringToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'string';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'string', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

