<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4758c51a6f647fbdb56e3f4aa819c59c>>
 */
namespace Facebook\HHAST;

final class XHPCommentToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'XHP_comment';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

