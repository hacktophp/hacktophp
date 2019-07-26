<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4e9e4ee68c83707bc5df0aae5b94d1e1>>
 */
namespace Facebook\HHAST;

final class ClassnameToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'classname';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'classname', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

