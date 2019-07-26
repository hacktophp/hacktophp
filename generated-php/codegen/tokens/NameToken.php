<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5f91cc9b0eb7b319df6d8118854d35af>>
 */
namespace Facebook\HHAST;

final class NameToken extends TokenWithVariableText implements INameishNode, __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'name';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

