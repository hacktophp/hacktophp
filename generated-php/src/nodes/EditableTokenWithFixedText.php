<?php
namespace Facebook\HHAST;

abstract class EditableTokenWithFixedText extends EditableToken
{
    public function __construct(EditableNode $leading, EditableNode $trailing)
    {
        parent::__construct(static::KIND, $leading, $trailing, static::TEXT);
    }
}

