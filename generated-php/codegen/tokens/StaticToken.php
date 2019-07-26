<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d78d3fea8932dc259406ea103943a964>>
 */
namespace Facebook\HHAST;

final class StaticToken extends TokenWithVariableText implements __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const KIND = 'static';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'static', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

