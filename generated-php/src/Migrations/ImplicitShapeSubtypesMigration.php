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
use HH\Lib\{C, Str};
use Facebook\TypeAssert;
final class ImplicitShapeSubtypesMigration extends StepBasedMigration
{
    // Required for adding ellipsis
    /**
     * @return HHAST\ShapeTypeSpecifier
     */
    private static function addTrailingCommaToFields(HHAST\ShapeTypeSpecifier $shape)
    {
        $fields = $shape->getFields();
        if ($fields === null) {
            return $shape;
        }
        $last_field = TypeAssert\instance_of(HHAST\ListItem::class, C\lastx($fields->getChildren()));
        if ($last_field->hasSeparator()) {
            return $shape;
        }
        return $shape->rewriteDescendants(function ($node, $_1) use($last_field) {
            if ($node !== $last_field) {
                return $node;
            }
            return $last_field->withSeparator(new HHAST\CommaToken(HHAST\Missing(), $last_field->getLastTokenx()->getTrailing()))->withItem($last_field->getItemx()->rewriteDescendants(function ($inner, $_1) use($last_field) {
                if ($inner !== $last_field->getLastTokenx()) {
                    return $inner;
                }
                return $last_field->getLastTokenx()->withTrailing(HHAST\Missing());
            }));
        });
    }
    /**
     * @return HHAST\ShapeTypeSpecifier
     */
    private static function allowImplicitSubtypes(HHAST\ShapeTypeSpecifier $shape)
    {
        if ($shape->hasEllipsis()) {
            return $shape;
        }
        $fields = $shape->getDescendantsOfType(HHAST\FieldSpecifier::class);
        $first_field = C\first($fields);
        if ($first_field === null) {
            return $shape->withEllipsis(new HHAST\DotDotDotToken(HHAST\Missing(), HHAST\Missing()));
        }
        return $shape->withEllipsis(new HHAST\DotDotDotToken(Str\contains($shape->getCode(), "\n") ? $first_field->getFirstTokenx()->getLeading() : new HHAST\WhiteSpace(' '), C\lastx($shape->getFieldsx()->getChildren())->getLastTokenx()->getTrailing()));
        return $shape;
    }
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public final function getSteps()
    {
        $make_step = function ($name, $impl) {
            return new TypedMigrationStep($name, HHAST\ShapeTypeSpecifier::class, HHAST\ShapeTypeSpecifier::class, $impl);
        };
        return [$make_step('add trailing commas to fields', function ($node) {
            return self::addTrailingCommaToFields($node);
        }), $make_step('allow implicit subtypes', function ($node) {
            return self::allowImplicitSubtypes($node);
        })];
    }
}

