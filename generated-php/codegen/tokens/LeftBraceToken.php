<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<62d279b05c6c8b2ea1e225b872637155>>
 */
namespace Facebook\HHAST;

final class LeftBraceToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '{';
    /**
     * @var string
     */
    const TEXT = '{';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

