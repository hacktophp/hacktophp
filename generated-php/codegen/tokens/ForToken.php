<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<22603dda78d06ea7b06337bea29a782d>>
 */
namespace Facebook\HHAST;

final class ForToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'for';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'for', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

