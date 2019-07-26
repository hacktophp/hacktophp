<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<461e0affe78487ad7810599ffad9421b>>
 */
namespace Facebook\HHAST;

final class OctalLiteralToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'octal_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

