<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<34e681c9f89c4c5fe92f4c780b791d89>>
 */
namespace Facebook\HHAST;

final class HeredocStringLiteralToken extends TokenWithVariableText implements IStringLiteral
{
    /**
     * @var string
     */
    const KIND = 'heredoc_string_literal';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

