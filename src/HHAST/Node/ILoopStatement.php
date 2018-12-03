<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST\Node;

interface ILoopStatement extends IControlFlowStatement {
  public function getBody(): EditableNode;
  /**
   * @return static
   */
  public function withBody(EditableNode $body);
}
