<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<324fcd2fefcb3f2996e5f2d27e418ab1>>
 */
namespace Facebook\HHAST;

final class EqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '=';
    /**
     * @var string
     */
    const TEXT = '=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

