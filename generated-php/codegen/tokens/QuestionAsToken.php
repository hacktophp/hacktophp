<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b37928403ae81266dbb8c9849a15159c>>
 */
namespace Facebook\HHAST;

final class QuestionAsToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = '?as';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = '?as', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

