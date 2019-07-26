<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bab371d6d071f08b064852f207469a25>>
 */
namespace Facebook\HHAST;

final class GreaterThanEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '>=';
    /**
     * @var string
     */
    const TEXT = '>=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

