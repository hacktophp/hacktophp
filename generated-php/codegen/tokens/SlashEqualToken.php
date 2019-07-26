<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<39726f6700a063ae0978241ad9ff1d11>>
 */
namespace Facebook\HHAST;

final class SlashEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '/=';
    /**
     * @var string
     */
    const TEXT = '/=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

