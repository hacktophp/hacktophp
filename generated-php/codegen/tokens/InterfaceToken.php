<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d05c101310b179c0e8e8ff7d1544aabb>>
 */
namespace Facebook\HHAST;

final class InterfaceToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'interface';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'interface', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

