<?php
namespace Facebook\HHAST;

abstract class EditableTokenWithVariableText extends EditableToken
{
    public function __construct(EditableNode $leading, EditableNode $trailing, string $token_text)
    {
        parent::__construct(static::KIND, $leading, $trailing, $token_text);
    }
}

