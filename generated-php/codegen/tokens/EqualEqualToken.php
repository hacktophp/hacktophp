<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a8a2cd57d2c9e1665ad88f8dd0873a7f>>
 */
namespace Facebook\HHAST;

final class EqualEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '==';
    /**
     * @var string
     */
    const TEXT = '==';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

