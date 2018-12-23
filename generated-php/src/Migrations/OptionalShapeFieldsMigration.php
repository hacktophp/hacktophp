<?php
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
     * @return Traversable<IMigrationStep>
     */
    public final function getSteps()
    {
        return array(new TypedMigrationStep('make nullable fields optional', HHAST\ListItem::class, HHAST\ListItem::class, function ($node) {
            return self::makeNullableFieldsOptional($node);
        }));
    }
}

