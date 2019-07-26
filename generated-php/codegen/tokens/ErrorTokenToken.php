<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<043bf655dc81b975d35c7fddc9d5c308>>
 */
namespace Facebook\HHAST;

final class ErrorTokenToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'error_token';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

