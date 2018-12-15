<?hh

function piped_example(array<int> $arr, int $y): int {
  return $arr
    |> \array_map($x ==> $x * $x, $$)
    |> \array_filter($$, $x ==> $x % $y == 0)
    |> \count($$);
}

var_dump(piped_example(range(1, 10), 3));