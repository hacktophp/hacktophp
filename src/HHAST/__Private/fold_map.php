<?php // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HackToPhp\HHAST\__Private;

/**
 * @template TInput
 * @template TOutput
 * @template TAccumalation
 * @param Traversable<TInput> $items
 * @param (\Closure(TInput, TAccumulation): TOutput) $mapper
 * @param (\Closure(TInput, TAccumulation): TOutput) $accumalator
 * @param TAccumulator $initial
 * @return TOutput
 */
function fold_map(
  iterable $items,
  \Closure $mapper,
  \Closure $accumulator,
  $initial
): array {
  $acc = $initial;
  $result = [];
  foreach ($items as $item) {
    $result[] = $mapper($item, $acc);
    $acc = $accumulator($item, $acc);
  }
  return $result;
}
