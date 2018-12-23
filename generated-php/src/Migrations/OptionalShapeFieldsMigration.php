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

use Facebook\HHAST as HHAST;
final class OptionalShapeFieldsMigration extends StepBasedMigration
{
    /**
     * @return HHAST\ListItem
     */
    private static function makeNullableFieldsOptional(HHAST\ListItem $node)
    {
        $field = $node->getItem();
        if (!$field instanceof HHAST\FieldSpecifier) {
            return $node;
        }
        if ($field->hasQuestion()) {
            return $node;
        }
        $type = $field->getType();
        if (!$type instanceof HHAST\NullableTypeSpecifier) {
            return $node;
        }
        $name = $field->getName()->getLastTokenx();
        $field = $field->withQuestion(new HHAST\QuestionToken($name->getLeading(), HHAST\Missing()))->withName($name->withLeading(HHAST\Missing()));
        return $node->withItem($field);
    }
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public final function getSteps()
    {
        return array(new TypedMigrationStep('make nullable fields optional', HHAST\ListItem::class, HHAST\ListItem::class, function ($node) {
            return self::makeNullableFieldsOptional($node);
        }));
    }
}

