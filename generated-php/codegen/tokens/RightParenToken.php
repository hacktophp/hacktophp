<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0ac268d5570f59f303472000f93f582c>>
 */
namespace Facebook\HHAST;

final class RightParenToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ')';
    /**
     * @var string
     */
    const TEXT = ')';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

