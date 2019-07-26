<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c6dbec9a1a3047c516ad6b4282aa96e2>>
 */
namespace Facebook\HHAST;

final class BackslashToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '\\';
    /**
     * @var string
     */
    const TEXT = '\\';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

