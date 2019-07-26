<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6d033e41d594f846e2e449896335258b>>
 */
namespace Facebook\HHAST;

final class ColonColonToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '::';
    /**
     * @var string
     */
    const TEXT = '::';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

