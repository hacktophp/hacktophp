<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

abstract class TokenWithVariableText extends Token
{
    public function __construct(EditableNode $leading, EditableNode $trailing, string $token_text)
    {
        parent::__construct(static::KIND, $leading, $trailing, $token_text);
    }
}

