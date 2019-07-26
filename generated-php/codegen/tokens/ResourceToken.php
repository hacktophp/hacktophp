<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5ccfc65cbd475edbd2ac52a0477fa6d3>>
 */
namespace Facebook\HHAST;

final class ResourceToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'resource';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'resource', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

