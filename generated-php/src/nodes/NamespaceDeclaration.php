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

use HH\Lib\{Str, Vec};
final class NamespaceDeclaration extends NamespaceDeclarationGeneratedBase
{
    /**
     * @return string
     */
    public function getQualifiedNameAsString()
    {
        $name = $this->getName();
        if ($name instanceof NameToken) {
            return $name->getText();
        }

        if (!$name) {
            return '';
        }

        return \implode("\\", \array_map(function ($t) {
            return $t->getText();
        }, $name->getDescendantsOfType(NameToken::class)));
    }
}

