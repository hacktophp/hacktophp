<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cd07bb9e23876fac77db689ab61eae20>>
 */
namespace Facebook\HHAST;

final class SlashGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '/>';
    /**
     * @var string
     */
    const TEXT = '/>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

