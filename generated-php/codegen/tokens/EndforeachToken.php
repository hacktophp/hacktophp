<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<81960eec89b6d741a7be5df556e41875>>
 */
namespace Facebook\HHAST;

final class EndforeachToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'endforeach';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'endforeach', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

