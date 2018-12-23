<?php
namespace Facebook\HHAST\__Private;

/**
 * @psalm-template T
 *
 * @param typename<T> $type
 *
 * @return TypeStructure<T>
 */
function type_alias_structure(typename $type)
{
    return type_structure($type);
}

