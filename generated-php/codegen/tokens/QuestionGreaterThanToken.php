<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<df65bf490dd96e1b9b4efed51ef8332a>>
 */
namespace Facebook\HHAST;

final class QuestionGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '?>';
    /**
     * @var string
     */
    const TEXT = '?>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

