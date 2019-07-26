<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<252980dc4905128c487d6aba2fae20f9>>
 */
namespace Facebook\HHAST;

final class XHPElementNameToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'XHP_element_name';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

