<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6cb3526a1036c99b690ba4729d98e78e>>
 */
namespace Facebook\HHAST;

final class EqualEqualEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '===';
    /**
     * @var string
     */
    const TEXT = '===';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

