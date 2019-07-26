<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<28488a961b42a8bad37deb53776e77db>>
 */
namespace Facebook\HHAST;

final class BarGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '|>';
    /**
     * @var string
     */
    const TEXT = '|>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

