<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<11034ac617ad47c19676b34318d64edb>>
 */
namespace Facebook\HHAST;

final class XHPClassNameToken extends TokenWithVariableText implements INameishNode, __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'XHP_class_name';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

