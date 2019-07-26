<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3cb9138540246c5eff123f7bfae1765c>>
 */
namespace Facebook\HHAST;

final class EndwhileToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'endwhile';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'endwhile', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

