<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b7c1283342f104581a4a30c49e8c60df>>
 */
namespace Facebook\HHAST;

final class LessThanEqualGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '<=>';
    /**
     * @var string
     */
    const TEXT = '<=>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

