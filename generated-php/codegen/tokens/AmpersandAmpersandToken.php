<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c7119868e8659c39fef5d43d53037e16>>
 */
namespace Facebook\HHAST;

final class AmpersandAmpersandToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '&&';
    /**
     * @var string
     */
    const TEXT = '&&';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

