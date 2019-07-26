<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c1731776a50d4542886707686894b05d>>
 */
namespace Facebook\HHAST;

final class LeftParenToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '(';
    /**
     * @var string
     */
    const TEXT = '(';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

