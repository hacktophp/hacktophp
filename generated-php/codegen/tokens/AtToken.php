<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<89f4a9564e5f5344043f865259e73bb5>>
 */
namespace Facebook\HHAST;

final class AtToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '@';
    /**
     * @var string
     */
    const TEXT = '@';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

