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
 * @psalm-template TInput
 * @psalm-template TOutput
 * @psalm-template TAccumulation
 *
 * @param iterable<mixed, TInput> $items
 * @param \Closure(TInput, TAccumulation):TOutput $mapper
 * @param \Closure(TInput, TAccumulation):TAccumulation $accumulator
 * @param TAccumulation $initial
 *
 * @return array<int, TOutput>
 */
function fold_map(iterable $items, \Closure $mapper, \Closure $accumulator, $initial)
{
    $acc = $initial;
    $result = array();
    foreach ($items as $item) {
        $result[] = $mapper($item, $acc);
        $acc = $accumulator($item, $acc);
    }
    return $result;
}

