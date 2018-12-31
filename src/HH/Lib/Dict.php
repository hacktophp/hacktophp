<?php

namespace HH\Lib\Dict;

/**
 * @template Tk1
 * @template Tk2
 * @template Tv1
 * @template Tv2
 * @param iterable<TK1, Tv1> $traversable
 * @param function(TK1, Tv1):Tv2 $value_func
 * @param function(TK1, Tv1):Tk2 $key_func
 * @return array<Tk2, Tv2>
 */
function pull_with_key(
   	iterable $traversable,
   	\Closure $value_func,
  	\Closure $key_func
): array {
	$arr = [];

	foreach ($traversable as $key => $value) {
		$arr[$key_func($key, $value)] = $value_func($key, $value);
	}

	return $arr;
}