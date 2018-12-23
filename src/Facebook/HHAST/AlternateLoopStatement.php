<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\HHAST;


final class AlternateLoopStatement extends AlternateLoopStatementGeneratedBase {
  public function getBody(): EditableNode {
    return $this->getStatements();
  }

  public function withBody(EditableNode $body): this {
    return $this->withStatements($body);
  }
}
