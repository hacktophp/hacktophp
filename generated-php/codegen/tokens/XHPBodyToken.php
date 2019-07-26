<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<03b56d2b9f13f0dec033630f428fc041>>
 */
namespace Facebook\HHAST;

final class XHPBodyToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'XHP_body';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

