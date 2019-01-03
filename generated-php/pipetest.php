<?php
/**
 * @param array<mixed, int> $arr
 */
function piped_example(array $arr, int $y) : int
{
    return \count(\array_filter(\array_map(function ($x) {
        return $x * $x;
    }, $arr), function ($x) use($y) {
        return $x % $y == 0;
    }));
}
var_dump(piped_example(range(1, 10), 3));
"\nDeclare_(\nDeclareDeclare(\n\nHaltCompiler(\nInlineHTML(\n\nError(\n";
$a = ['a' => 4, 'b' => 6, 8];
unset($a);
if (empty($a)) {
}
if (isset($a)) {
}
$b = function ($x) use($b) {
    echo A::$bar;
};
function foo()
{
    global $b;
    static $c = 5;
}
(yield @foo());
(yield 5 => @foo());
yield from @foo();
eval('echo 5;');
// a thing
/** a single line doc comment */
/*
another thing
*/
/**
 * foo
 */
class C
{
    use T1;
    use A\T2;
    use \B\T2;
    use T3 {
        bar as bat;
    }
    use T4 {
        bar as bat;
        far as fat;
    }
    /** @return Bar */
    /**
     * @return EditableList<Foo>
     */
    public function bart()
    {
        echo 'hello';
    }
}
$c =& $b;
exit;
exit;
exit(2);
die;
die;
die('bad');
$a = (include "bar.php");
include "foo.php";
include_once "foo.php";
require "foo.php";
require_once "foo.php";
if ($a instanceof $b) {
}
if ($a instanceof A) {
}
if ($a instanceof A\B) {
}
if ($a instanceof \A\B) {
}
list(, $a, $b) = $c;
$a++;
$c--;
print 4;
`foo {$bar}`;
echo "vcxv {$a[0]} hello";
