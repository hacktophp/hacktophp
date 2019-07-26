<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b176b60c9fbf40de98fc4ddb3d4a450f>>
 */
namespace Facebook\HHAST;

final class TryToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'try';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'try', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

