<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a80fdb492d1711fde1073f47c634aaac>>
 */
namespace Facebook\HHAST;

final class DestructToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = '__destruct';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = '__destruct', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

