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

function trim(
  string $string
): string {
	return trim($string);
}

function contains(
  string $haystack,
  string $needle
): bool {
	return strpos($haystack, $needle) !== false;
}