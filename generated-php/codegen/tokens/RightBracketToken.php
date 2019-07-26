<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e57b2fc6678f8cf0000a3a45149cfa19>>
 */
namespace Facebook\HHAST;

final class RightBracketToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ']';
    /**
     * @var string
     */
    const TEXT = ']';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

