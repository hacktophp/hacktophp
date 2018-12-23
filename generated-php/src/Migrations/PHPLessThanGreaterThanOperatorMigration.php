<?php
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST as HHAST;
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
     * @return Traversable<IMigrationStep>
     */
    public final function getSteps()
    {
        return array(new TypedMigrationStep('replace the `<>` operator with `!=`', HHAST\BinaryExpression::class, HHAST\BinaryExpression::class, function ($node) {
            return $this->replaceOperator($node);
        }));
    }
}

