<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<394b160a0d603fdffbd48616cf71d772>>
 */
namespace Facebook\HHAST;

final class DotDotDotToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '...';
    /**
     * @var string
     */
    const TEXT = '...';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

