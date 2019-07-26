<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f32a7bddd6662bf06af7687088ee2ef1>>
 */
namespace Facebook\HHAST;

final class StarToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '*';
    /**
     * @var string
     */
    const TEXT = '*';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

