<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST;

final class NamespaceDeclaration extends NamespaceDeclarationGeneratedBase {
  public function getQualifiedNameAsString(): string {
    $name = $this->getName();
    if ($name instanceof NameToken) {
      return $name->getText();
    }

    return implode(
    	"\\",
    	array_map(
    		function($t) { return $t->getText(); },
    		$this->getDescendantsOfType(NameToken::class)
    	)
    );
  }
}
