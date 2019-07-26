<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<196543e489b894fd12452dfab72942c9>>
 */
namespace Facebook\HHAST;

final class MinusGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '->';
    /**
     * @var string
     */
    const TEXT = '->';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

