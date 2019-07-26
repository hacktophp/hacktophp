<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cfaa4f774cb09479dbe9afb13323c9a6>>
 */
namespace Facebook\HHAST;

final class PlusEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '+=';
    /**
     * @var string
     */
    const TEXT = '+=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

