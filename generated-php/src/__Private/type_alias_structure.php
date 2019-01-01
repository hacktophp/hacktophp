<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

/**
 * @psalm-template T
 *
 * @param typename<T> $type
 *
 * @return TypeStructure<T>
 */
function type_alias_structure(typename $type) : TypeStructure
{
    return type_structure($type);
}

