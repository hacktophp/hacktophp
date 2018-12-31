<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST;
final class PHPLessThanGreaterThanOperatorMigration extends StepBasedMigration
{
    /**
     * @return HHAST\BinaryExpression
     */
    private final function replaceOperator(HHAST\BinaryExpression $in)
    {
        $op = $in->getOperator();
        if (!$op instanceof HHAST\LessThanGreaterThanToken) {
            return $in;
        }
        return $in->withOperator(new HHAST\ExclamationEqualToken($op->getLeading(), $op->getTrailing()));
    }
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public final function getSteps()
    {
        return [new TypedMigrationStep('replace the `<>` operator with `!=`', HHAST\BinaryExpression::class, HHAST\BinaryExpression::class, function ($node) {
            return $this->replaceOperator($node);
        })];
    }
}

