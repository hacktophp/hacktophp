<?php

namespace HH\Lib\Str;

function slice(
  string $string,
  int $offset,
  ?int $length = NULL
): string {
	$r = \substr($string, $offset, $length);

	if ($r === false) {
		throw new \ViolationException('Bad string');
	}

	return $r;
}