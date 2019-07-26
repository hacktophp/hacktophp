<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<162e94229170479823889988672619ae>>
 */
namespace Facebook\HHAST;

final class XHPCategoryNameToken extends TokenWithVariableText implements INameishNode
{
    /**
     * @var string
     */
    const KIND = 'XHP_category_name';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $text, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $text, $source_ref);
    }
}

