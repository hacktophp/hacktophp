<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9e8d887ecfb7d55a6def2d24bfbbd6dc>>
 */
namespace Facebook\HHAST;

final class NewToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'new';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'new', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

