<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c8bba14bb488569f782c63777bad8718>>
 */
namespace Facebook\HHAST;

final class AttributeToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'attribute';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'attribute', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

