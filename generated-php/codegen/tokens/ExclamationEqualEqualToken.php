<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<662e065d4eeecaccfc54a75faa292dd6>>
 */
namespace Facebook\HHAST;

final class ExclamationEqualEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '!==';
    /**
     * @var string
     */
    const TEXT = '!==';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

