<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a9af26bac73bf291222b5228692a6c9e>>
 */
namespace Facebook\HHAST;

final class FileToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'file';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'file', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

