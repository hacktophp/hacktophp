<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<078cc5da3dc2884ec367d3adeea268f4>>
 */
namespace Facebook\HHAST;

final class ExclamationToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '!';
    /**
     * @var string
     */
    const TEXT = '!';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

