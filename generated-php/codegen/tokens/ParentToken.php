<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3e08c8ed3c80b3becc870dab6d82dcf5>>
 */
namespace Facebook\HHAST;

final class ParentToken extends TokenWithVariableText implements __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'parent';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'parent', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

