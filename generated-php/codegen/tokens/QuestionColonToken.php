<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ceb817f0033516584be4e6bb0fe583bc>>
 */
namespace Facebook\HHAST;

final class QuestionColonToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '?:';
    /**
     * @var string
     */
    const TEXT = '?:';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

