<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fd67773a75288ab700ee0afca887d04d>>
 */
namespace Facebook\HHAST;

final class QuestionToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '?';
    /**
     * @var string
     */
    const TEXT = '?';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

