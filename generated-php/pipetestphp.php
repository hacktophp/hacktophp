<?php
namespace Hack\UserDocumentation\Operators\Pipe\Examples\MapFilterCountPiped;

/**
 * @param array<mixed, int> $arr
 */
function piped_example(array $arr) : int
{
    return \count(\array_filter(\array_map(function ($x) {
        return $x * $x;
    }, $arr), function ($x) {
        return $x % 2 == 0;
    }));
}
var_dump(piped_example(range(1, 10)));

