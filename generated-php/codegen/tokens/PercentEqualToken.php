<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<90e72f47589ef6b3110526e95005d42a>>
 */
namespace Facebook\HHAST;

final class PercentEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '%=';
    /**
     * @var string
     */
    const TEXT = '%=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

