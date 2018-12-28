<?php
interface I {
    /**
     * @return $thus
     */
    public static function barBar();
}
<?php
interface I {
    /**
     * @return 1
     */
    public static function barBar();
}
<?php
interface I {
    /**
     * @return []
     */
    public static function barBar();
}
<?php
class A {
    /**
     * @var 1
     */
    public $bar;
}
<?php
class A {
    /**
     * @var []
     */
    public $bar;
}
<?php
interface I {
    /**
     * @return 1,
     */
    public static function barBar();
}
<?php
interface I {
    /**
     * @return a,
     */
    public static function barBar();
}
<?php
/**
 * @param string $bar
 */
function fooBar(): void {
}

fooBar("hello");
<?php
/**
 * @param string
 */
function fooBar(): void {
}
<?php
/**
 * @return [bad]
 */
function fooBar() {
}
<?php
/**
 * @return string
 */
function fooFoo(): int {
    return 5;
}
<?php
function fooFoo($a): void {
    echo substr($a, 4, 2);
}
<?php
function fooFoo($a): void {
    echo $a . "foo";
}
<?php
function fooFoo($a): void {
    echo $a + 5;
}
<?php
function fooFoo($a): void {
    echo $a / 5;
}
<?php
function fooFoo($a): void {
    echo "$a";
}
<?php
function fooFoo($a): void {
    if (is_string($a)) {
        echo substr($a, 4, 2);
    } else {
        echo substr("hello", $a, 2);
    }
}
<?php
class A {
    public function foo(int $a): void {}
}

class B extends A {
    public function foo($a): void {}
}
<?php
function takesString(string $s): void {}

function shouldTakeString($s): void {
  if (is_string($s)) takesString($s);
}
<?php
function takesString(string $s): void {}

/** @return mixed */
function returnsMixed() {}

function shouldTakeString($s): void {
  $s = returnsMixed();
  takesString($s);
}
<?php
class A
{
    /** @psalm-var array<int, string> */
    public $foo = [];

    public function updateFoo(): void {
        $this->foo["boof"] = "hello";
    }
}
<?php
class MyClass {
    /**
     * Comment
     * @var $fooPropTypo string
     */
    public $fooProp = "/tmp/file.txt";
}
<?php
/**
 * @return string[]
 */
function returns_strings() {
    /** @var array(string) $result */
    $result = ["example"];
    return $result;
}
<?php
/** @param mixed $x */
function myvalue($x): void {
    /** @var $myVar MyNS\OtherClass */
    $myVar = $x->conn()->method();
    $myVar->otherMethod();
}
<?php
class A {
    /** @return ?int */
    public function foo(): ?int {
        if (rand(0, 1)) return 5;
    }
}
<?php
class A {}

/**
 * @return A
 * @psalm-suppress MismatchingDocblockReturnType
 */
function foo(): B {
  return new A;
}
<?php
function foo(): boolean {
    return true;
}
<?php
/**
 * @param array{} $arr
 */
function bar(array $arr): void {}
<?php
/** @param ArrayIterator|string[] $i */
function takesArrayIteratorOfString(ArrayIterator $i): void {}
<?php
/** @param ArrayIterator|string[] $i */
function takesArrayIteratorOfString($i): void {
    $s = $i->offsetGet("a");
}
<?php
/** @var static */
$a = new stdClass();
<?php
/** @param PDO||Closure|numeric $a */
function foo($a) : void {}
<?php
/** @var string; */
$a = "hello";
<?php
/** @return Closure(int): */
function foo() : callable {
    return function () : void {};
}
<?php
/**
 * @return - Description
 */
function example() {
    return "placeholder";
}
<?php
/** @return &array */
function foo() : array {
    return [];
}
<?php
/**
 * @psalm-type CoolType = A|B>
 */

class A {}
<?php
/**
 * @psalm-type aType null|"a"|"b"|"c"|"d"
 */

/** @psalm-return array{0:bool,1:aType} */
function f(): array {
    return [(bool)rand(0,1), rand(0,1) ? "z" : null];
}
<?php
$a = "hello";

/** @var int $a */
<?php
/**
 * @return string
 */
function fooFoo(): string {
    return "boop";
}

/**
 * @return array<int, string>
 */
function foo2(): array {
    return ["hello"];
}

/**
 * @return array<int, string>
 */
function foo3(): array {
    return ["hello"];
}
<?php
/** @param array $a */
function foo($a): void {
    if (is_array($a)) {
        // do something
    }
}
<?php
/** @param mixed $b */
function foo($b): void {
    /** @var array */
    $a = (array)$b;
    if (is_array($a)) {
        // do something
    }
}
<?php
/** @param array<mixed, array<mixed, mixed>> $data */
function foo($data): void {
    foreach ($data as $key => $val) {
        if (!\is_array($data)) {
            $data = [$key => null];
        } else {
            $data[$key] = !empty($val);
        }
    }
}
<?php
class A {
    /**
     * @param A $a
     * @param bool $b
     */
    public function g(A $a, $b): void {
    }
}
<?php
namespace Foo;

class A {
    /**
     * @param \Foo\A $a
     * @param bool $b
     */
    public function g(A $a, $b): void {
    }
}
<?php
class A {
    /** @var int */
    public $bar = 5;
    public function foo(): void {}
}

/**
 * @return ?A
 * @psalm-ignore-nullable-return
 */
function makeA() {
    return rand(0, 1) ? new A(): null;
}

function takeA(A $a): void { }

$a = makeA();
$a->foo();
$a->bar = 7;
takeA($a);
<?php
/**
 * @param int $bar
 * @psalm-suppress MismatchingDocblockParamType
 */
function fooFoo(array $bar): void {
}
<?php
class A {}
class B {}

/**
 * @param B $bar
 * @psalm-suppress MismatchingDocblockParamType
 */
function fooFoo(A $bar): void {
}
<?php
/** @var array<Exception> */
$a = [];

$a[0]->getMessage();
<?php
class A {
    /** @param mixed $a */
    public function foo($a): void {}
}

class B extends A {
    public function foo($a): void {}
}
<?php
class A {
    /** @param int $a */
    public function foo($a): void {}
}

class B extends A {
    public function foo($a): void {}
}
<?php
class A
{
    public function foo(): void {}

    public function getMeAgain(): void {
        /** @var self */
        $me = $this;
        $me->foo();
    }
}
<?php
class A
{
    /** @psalm-var array<int, string> */
    public $foo = [];

    public function updateFoo(): void {
        $this->foo[5] = "hello";
    }
}
<?php
function takesInt(int $a): void {}

/**
 * @psalm-param  array<int, string> $a
 * @param string[] $a
 */
function foo(array $a): void {
    foreach ($a as $key => $value) {
        takesInt($key);
    }
}
<?php
function foo(int $i): int {
    /** @var int */
    return $i;
}
<?php
function foo() : array {
    return ["hello" => new stdClass, "goodbye" => new stdClass];
}

$a = null;
$b = null;

/**
 * @var string $key
 * @var stdClass $value
 */
foreach (foo() as $key => $value) {
    $a = $key;
    $b = $value;
}
<?php
/** @param array{b?: int, c?: string} $a */
function foo(array $a = []) : void {}
<?php
/**
 * @param $x
 */
function example(array $x) : void {}
<?php
namespace Foo;

/**
 * @param String $x
 */
function example(string $x) : void {}
<?php
/** @var array{a:Closure():(array<mixed, mixed>|null), b?:Closure():array<mixed, mixed>, c?:Closure():array<mixed, mixed>, d?:Closure():array<mixed, mixed>, e?:Closure():(array{f:null|string, g:null|string, h:null|string, i:string, j:mixed, k:mixed, l:mixed, m:mixed, n:bool, o?:array{0:string}}|null), p?:Closure():(array{f:null|string, g:null|string, h:null|string, q:string, i:string, j:mixed, k:mixed, l:mixed, m:mixed, n:bool, o?:array{0:string}}|null), r?:Closure():(array<mixed, mixed>|null), s:array<mixed, mixed>} */
$arr = [];

$arr["a"]();
<?php
/** @var array{
  a: Closure() : (array<mixed, mixed>|null),
  b?: Closure() : array<mixed, mixed>,
  c?: Closure() : array<mixed, mixed>,
  d?: Closure() : array<mixed, mixed>,
  e?: Closure() : (array{
    f: null|string,
    g: null|string,
    h: null|string,
    i: string,
    j: mixed,
    k: mixed,
    l: mixed,
    m: mixed,
    n: bool,
    o?: array{0:string}
  }|null),
  p?: Closure() : (array{
    f: null|string,
    g: null|string,
    h: null|string,
    q: string,
    i: string,
    j: mixed,
    k: mixed,
    l: mixed,
    m: mixed,
    n: bool,
    o?: array{0:string}
  }|null),
  r?: Closure() : (array<mixed, mixed>|null),
  s: array<mixed, mixed>
} */
$arr = [];

$arr["a"]();
<?php
namespace ns;

/** @param ?\stdClass $s */
function foo($s) : void {
}

foo(null);
foo(new \stdClass);
<?php
/** @return Generator<int, stdClass> */
function g():Generator { yield new stdClass; }

$g = g();
<?php
/**
 * @return stdClass
 */
function foo() : ?stdClass {
    return rand(0, 1) ? new stdClass : null;
}

$f = foo();
if ($f) {}
<?php
/** @param string[] $s */
function foo(string ...$s) : void {}
<?php
/**
 * @param "a"|"b" $_p
 */
function acceptsLiteral($_p): void {}

/**
 * @return "a"|"b"
 */
function returnsLiteral(): string {
    return rand(0,1) ? "a" : "b";
}

acceptsLiteral(returnsLiteral());
<?php
/**
 * @psalm-type CoolType = A|B|null
 */

class A {}
class B {}

/** @return CoolType */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type A_OR_B = A|B
 * @psalm-type CoolType = A_OR_B|null
 * @return CoolType
 */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

class A {}
class B {}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type CoolType = A|B|null
 */
/**
 * @return CoolType
 */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

class A {}
class B {}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type CoolType = A|B|null
 */

// this breaks up the line

class A {}
class B {}

/** @return CoolType */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/** @psalm-type TA = array<int, string> */

class Bar {
    public function foo() : void {
        $bar =
            /** @return TA */
            function() {
                return ["hello"];
        };

        /** @var array<int, TA> */
        $bat = [$bar(), $bar()];

        foreach ($bat as $b) {
            echo $b[0];
        }
    }
}

/**
  * @psalm-type _A=array{elt:int}
  * @param _A $p
  * @return _A
  */
function f($p) {
    /** @var _A */
    $r = $p;
    return $r;
}
<?php
interface I {}

class A implements I {
    public function bar() : void {}
}

/** @return I[] */
function foo() : array {
    return [new A()];
}

/** @var A $a1 */
[$a1, $a2] = foo();

$a1->bar();
<?php
/** @return string | null */
function foo(string $s = null) {
    return $s;
}
<?php
/**
 * @return [bad]
 */
function fooBar() {
}
<?php
$foo = [
    "a",
    ["b"],
];

$a = array_map(
    function (string $uuid): string {
        return $uuid;
    },
    $foo[rand(0, 1)]
);
<?php
class A {}
class B {}
class C {}

$foo = rand(0, 1) ? new A : new B;

/** @param B|C $b */
function bar($b) : void {}

bar($foo);
<?php
$m = new ReflectionMethod("hello", "goodbye");
$m->invoke(null, "cool");
<?php
$a = ["b" => 5, "a" => 8];
ksort($a);
$b = ["b" => 5, "a" => 8];
sort($b);

<?php
$a = ["b" => 5, "a" => 8];
array_unshift($a, (bool)rand(0, 1));
$b = ["b" => 5, "a" => 8];
array_push($b, (bool)rand(0, 1));

<?php
$a = ["hello", "goodbye"];
shuffle($a);
$a = [0, 1];
<?php
function getString(int $i) : string {
    return rand(0, 1) ? "hello" : "";
}

function takesInt(int $i) : void {}

$i = rand(0, 10);

if (!($i = getString($i))) {}
<?php
/**
 * @param string|null|object $b
 */
function foo($b) : void {}
foo(null);
<?php
$a = 5;
echo $a[0];
<?php
$x = ["a"];
$y = $x["b"];
<?php
$x = rand(0, 5) > 2 ? ["a" => 5] : "hello";
$y = $x[0];
<?php
$x = rand(0, 5) > 2 ? ["a" => 5] : "hello";
$y = $x["a"];
<?php
/**
 * @return array<int,array<string,float>>|string
 * @return string
 */
function return_array() {
    return rand() % 5 > 3 ? [["key" => 3.5]] : "key:3.5";
}
$result = return_array();
$v = $result[0]["key"];
<?php
$a = rand(0, 10) > 5 ? 5 : ["hello"];
echo $a[0];
<?php
/** @var mixed */
$a = [];
echo $a[0];
<?php
/** @var mixed */
$a = 5;
echo [1, 2, 3, 4][$a];
<?php
$a = null;
echo $a[0];
<?php
$a = rand(0, 1) ? [1, 2] : null;
echo $a[0];
<?php
$params = ["key" => "value"];
echo $params["fieldName"];
<?php
$x = ["a" => "value", "b" => "value"];
unset($x["a"]);
echo $x["a"];
<?php
function foo(string $s) : void {
    echo $s[0][1];
}
<?php
function example(array $y) : void {
    echo $y[new stdClass()];
}
<?php
class Foo {
    public function __toString() {
        return "Foo";
    }
}

$a = ["Foo" => "bar"];
echo $a[new Foo];
<?php
/** @var array{0?:string} */
$entry = ["a"];

[$elt] = $entry;
<?php
/** @var array{a?:string} */
$entry = ["a"];

["a" => $elt] = $entry;
<?php
/**
 * @param string|array $key
 */
function foo(array $a, $key) : void {
    echo $a[$key];
}
<?php
function foo(?array $index): void {
    if (!$index) {
        $index = ["foo", []];
    }
    $index[1][] = "bar";
}
<?php
class A {
    public function fooFoo(): void { }
}
function bar (array $a): void {
    if ($a["a"] instanceof A) {
        $a["a"]->fooFoo();
    }
}
<?php
class A {
    public function fooFoo(): void { }
}
function bar (array $a): void {
    if ($a[0] instanceof A) {
        $a[0]->fooFoo();
    }
}
<?php
/**
 * @param  array<string>  $a
 */
function bar (array $a): string {
    if ($a["bat"]) {
        return $a["bat"];
    }

    return "blah";
}
<?php
class A {
    /** @var array<string, string> */
    public $arr = [];
}
$a = new A();
if (!isset($a->arr["bat"]) || strlen($a->arr["bat"])) { }
<?php
/** @psalm-suppress UndefinedClass */
$a = new A();
/** @psalm-suppress UndefinedClass */
if (!isset($a->arr["bat"]) || strlen($a->arr["bat"])) { }
<?php
/**
 * @param  array<string>  $a
 */
function bar (array $a): string {
    if ($a[0]) {
        return $a[0];
    }

    return "blah";
}
<?php
$a = rand(0, 1) ? [1, 2] : null;
echo $a[0];
<?php
$arr = [];
$x = $arr[0];
if (isset($arr[0]) && $arr[0]) { }
<?php
function takesInt(int $i): void {}
function takesString(string $s): void {}
function takesBool(bool $b): void {}

/**
 * @param array{int, string, bool} $b
 */
function a(array $b): void {
    takesInt($b[0]);
    takesString($b[1]);
    takesBool($b[2]);
}
<?php
$array = ["01" => "01", "02" => "02"];

foreach ($array as $key => $value) {
    $len = strlen($key);
}
<?php
$a = [];
list($a["foo"]) = explode("+", "a+b");
echo $a["foo"];
<?php
namespace N;

/**
 * @psalm-param array{key?:string} $p
 */
function f(array $p): void
{
    echo isset($p["key"]) ? $p["key"] : "";
}
<?php
function takesInt(int $i) : void {}
$x = ["a" => "value"];
unset($x["a"]);
$x[] = 5;
takesInt($x[0]);
<?php
$doc = new DOMDocument();
$doc->loadXML("<node key=\"value\"/>");
$doc->getElementsByTagName("node")[0];
<?php
function foo(ArrayAccess $a) : void {
    echo $a[0];
}
<?php
function example(array $x, $y) : void {
    echo $x[$y];
}
<?php
/** @var array{a?:string} */
$entry = ["a"];

["a" => $elt] = $entry;
strlen($elt);
strlen($entry["a"]);
<?php
/** @var array<int, int> */
$b = [];

/** @var array<int, int> */
$c = [];

/** @var array<int, mixed> */
$d = [];

if (!empty($d[0]) && !isset($c[$d[0]])) {
    if (isset($b[$d[0]])) {}
}
<?php
/**
 * @psalm-suppress MixedAssignment
 * @psalm-suppress MixedArrayAccess
 * @psalm-suppress MixedOperand
 * @param mixed[] $line
 */
function _renderCells(array $line): void {
  foreach ($line as $cell) {
    $cellOptions = [];
    if (is_array($cell)) {
      $cellOptions = $cell[1];
    }
    if (isset($cellOptions[0])) {
      $cellOptions[0] = $cellOptions[0] . "b";
    } else {
      $cellOptions[0] = "b";
    }
  }
}
<?php
class A {}
class B extends A {
    /** @var array<int, string> */
    public $arr = [];
}

/** @var array<A> */
$as = [];

if (!$as
    || !$as[0] instanceof B
    || !$as[0]->arr
) {
    return null;
}

$b = $as[0]->arr;
<?php
class Arr {
    /**
     * @param mixed $c
     * @return mixed
     */
    public static function pull(array &$a, string $b, $c = null) {
        return $a[$b] ?? $c;
    }
}

function _renderButton(array $settings): void {
    Arr::pull($settings, "a", true);

    if (isset($settings["b"])) {
        Arr::pull($settings, "b");
    }

    if (isset($settings["c"])) {}
}
<?php
class A {}
(new A)["b"] = 1;
<?php
$a = 5;
$a[0] = 5;
<?php
if (rand(0,1)) {
  $a = ["a" => 1];
} else {
  $a = [2, 3];
}

echo $a[0];
<?php
/** @var mixed */
$a = 5;
"hello"[0] = $a;
<?php
/** @param array<mixed, int|string> $foo */
function fooFoo(array $foo): void { }

function barBar(array $bar): void {
    fooFoo($bar);
}

barBar([1, "2"]);
<?php
class A {
    /** @var string[] */
    public $strs = ["a", "b", "c"];

    /** @return void */
    public function bar() {
        $this->strs = [new stdClass()]; // no issue emitted
    }
}
<?php
class A {
    /** @var string[] */
    public $strs = ["a", "b", "c"];

    /** @return void */
    public function bar() {
        $this->strs[] = new stdClass(); // no issue emitted
    }
}
<?php
if (rand(0,1)) {
  $a = ["a" => 1];
} else {
  $a = [2, 3];
}

if (array_key_exists("a", $a)) {
    echo $a[0];
}
<?php
if (rand(0,1)) {
  $a = ["a" => 1];
} else {
  $a = [2, 3];
}

if (array_key_exists("b", $a)) {
    echo $a[0];
}
<?php
$arr = [
    "a" => 1,
    "b" => 2,
    "c" => 3,
    "c" => 4,
];
<?php
$arr = [
    0 => 1,
    1 => 2,
    2 => 3,
    2 => 4,
];
<?php
$arr = [
    1,
    2,
    3,
    2 => 4,
];
<?php
$_GET["foo"][0] = "5";
<?php
$out = [];

$out[] = 4;
<?php
$out = [];

foreach ([1, 2, 3, 4, 5] as $value) {
    $out[] = 4;
}
<?php
$out = [];

foreach ([1, 2, 3, 4, 5] as $value) {
    $out[] = [4];
}
<?php
$out = [];

$bits = [];

foreach ([1, 2, 3, 4, 5] as $value) {
    if (rand(0,100) > 50) {
        $out[] = $bits;
        $bits = [];
    }

    $bits[] = 4;
}

$out[] = $bits;
<?php
class B {}

$out = [];

if (rand(0,10) === 10) {
    $out[] = new B();
}
<?php
$out = [];

switch (rand(0,10)) {
    case 5:
        $out[] = 4;
        break;

    case 6:
        // do nothing
}
<?php
$out = [];

switch (rand(0,10)) {
    case 5:
        $out[] = 4;
        break;

    case 6:
        $out[] = "hello";
        break;
}
<?php
$out = [];

switch (rand(0,10)) {
    case 5:
        $out[] = 4;
        break;

    case 6:
        $out[] = "hello";
        break;

    case 7:
        // do nothing
}
<?php
$foo = [];
$foo[] = "hello";
<?php
$foo = [];
$foo[][] = "hello";
<?php
$foo = [];
$foo[][][] = "hello";
<?php
$foo = [];
$foo[][][][] = "hello";
<?php
$foo = [];
$foo[0] = "hello";
$foo[1] = "hello";
$foo[2] = "hello";

$bar = [0, 1, 2];

$bat = [];

foreach ($foo as $i => $text) {
    $bat[$text] = $bar[$i];
}
<?php
$foo = [];
$foo["bar"] = "hello";
<?php
$foo = [];
$foo["bar"]["baz"] = "hello";
<?php
$foo = [];
$foo["bar"]["baz"]["bat"] = "hello";
<?php
$foo = [];
$foo["bar"]["baz"]["bat"]["bap"] = "hello";
<?php
$foo = ["bar" => []];
$foo["bar"]["baz"] = "hello";
<?php
$foo = ["bar" => []];
$foo["bar"]["baz"]["bat"] = "hello";
<?php
$foo = [
    "bar" => ["a" => "b"],
    "baz" => [1]
];
<?php
$foo = [
    "bar" => 1,
];
$foo["baz"] = "a";
<?php
$foo = [
    "bar" => ["a" => "b"],
    "baz" => [1]
];
$foo["bar"]["bam"]["baz"] = "hello";
<?php
$foo = [];
$foo["a"] = "hello";
$foo["b"][] = "goodbye";
$bar = $foo["a"];
<?php
$foo = [];
$foo["a"] = "hello";
$foo["b"]["c"]["d"] = "goodbye";
<?php
$foo = [];
$foo["a"]["b"] = "hello";
$foo["a"]["c"] = 1;
<?php
$foo = ["a" => "hello"];
if (rand(0, 10) === 5) {
    $foo["b"] = 1;
}
else {
    $foo["b"] = 2;
}
<?php
$a = ["foo", "bar"];
$b = $a[0];

$c = ["a" => "foo", "b"=> "bar"];
$d = "a";
$e = $c[$d];
<?php
/**
 * @param  array{b:string} $a
 * @return null|string
 */
function fooFoo($a) {
    if ($a["b"]) {
        return $a["b"];
    }
}
<?php
$a = [];
$b = "boop";
$a[$b][] = "bam";

$c = [];
$c[$b][$b][] = "bam";
<?php
/** @var array<string, array<string, string>> */
$a = [];
$a["foo"] = ["bar" => "baz"];
<?php
$a = [];
$a += ["bar"];

$b = [] + ["bar"];
<?php
$a = ["bar"];
$a += [1];

$b = ["bar"] + [1];
<?php
/** @var array<string, array<int, string>> */
$a = [];

$foo = "foo";

$a[$foo][] = "bat";
<?php
/** @var array<string, array<string, array<int, string>>> */
$b = [];

$foo = "foo";
$bar = "bar";

$b[$foo][$bar][] = "bat";
<?php
/** @var array{0: string, 1: int} **/
$a = ["hello", 5];
$b = $a[0]; // string
$c = $a[1]; // int
list($d, $e) = $a; // $d is string, $e is int
<?php
$foo = [];
$foo["a"] = 1;
$foo += ["b" => [2, 3]];
<?php
$foo = [];
$foo["root"]["a"] = 1;
$foo["root"] += ["b" => [2, 3]];
<?php
$a = [];

$a["a"] = 5;
$a[0] = 3;
<?php
$string = "c";

$b = [];

$b[$string] = 5;
$b[0] = 3;
<?php
$string = "c";

$c = [];

$c[0] = 3;
$c[$string] = 5;
<?php
$int = 5;

$d = [];

$d[$int] = 3;
$d["a"] = 5;
<?php
$string = "c";
$int = 5;

$e = [];

$e[$int] = 3;
$e[$string] = 5;
<?php
$string = "c";
$int = 5;

$a = [];

$a[0]["a"] = 5;
$a[0][0] = 3;
<?php
$string = "c";
$int = 5;

$b = [];

$b[0][$string] = 5;
$b[0][0] = 3;

$c = [];

$c[0][0] = 3;
$c[0][$string] = 5;

$d = [];

$d[0][$int] = 3;
$d[0]["a"] = 5;

$e = [];

$e[0][$int] = 3;
$e[0][$string] = 5;
<?php
$string = "c";
$int = 5;

$a = [];

$a["root"]["a"] = 5;
$a["root"][0] = 3;
<?php
$string = "c";
$int = 5;

$b = [];

$b["root"][$string] = 5;
$b["root"][0] = 3;

$c = [];

$c["root"][0] = 3;
$c["root"][$string] = 5;

$d = [];

$d["root"][$int] = 3;
$d["root"]["a"] = 5;

$e = [];

$e["root"][$int] = 3;
$e["root"][$string] = 5;
<?php
function foo(array $a) : array {
    $a["b"]["c"] = 5;
    echo $a["b"]["d"];
    echo $a["a"];
    return $a;
}
<?php
/** @param int[] $arg */
function expect_int_array($arg): void { }
/** @return array */
function generic_array() { return []; }

expect_int_array(generic_array());

function expect_int(int $arg): void {}
/** @return mixed */
function return_mixed() { return 2; }
expect_int(return_mixed());
<?php
function getThings(): array {
  return [];
}

$arr = [];

foreach (getThings() as $a) {
  $arr[$a->id] = $a;
}

echo $arr[0];
<?php
$a = ["b" => "c"];
$a["d"] = ["e" => "f"];
$a["b"] = 4;
$a["d"]["e"] = 5;
<?php
$a = [];

if (rand(0, 5) > 3) {
  $a["b"] = new stdClass;
} else {
  $a["b"] = ["e" => "f"];
}

if ($a["b"] instanceof stdClass) {
  $a["b"] = [];
}

$a["b"]["e"] = "d";
<?php
class A implements \ArrayAccess {
    /**
     * @param  string|int $offset
     * @param  mixed $value
     */
    public function offsetSet($offset, $value): void {}

    /** @param string|int $offset */
    public function offsetExists($offset): bool {
        return true;
    }

    /** @param string|int $offset */
    public function offsetUnset($offset): void {}

    /**
     * @param  string $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        return 1;
    }
}

$a = new A();
$a["bar"] = "cool";
$a["bar"]->foo();
<?php
$a = null;
$a[0][] = 1;
<?php
$str = "hello";
$str[0] = "i";
<?php
$a = [
    "b" => [],
];

$a["b"]["c"] = 0;

foreach ([1, 2, 3] as $i) {
    /**
     * @psalm-suppress InvalidArrayOffset
     * @psalm-suppress MixedOperand
     * @psalm-suppress PossiblyUndefinedArrayOffset
     */
    $a["b"]["d"] += $a["b"][$i];
}
<?php
$a = ["hello", 5];
$a_values = array_values($a);
$a_keys = array_keys($a);
<?php
$b = ["hello", 5];
$b[0] = 3;
<?php
$b = ["hello", 5];
$c = $b;
$c[0] = 3;
<?php
$d = array_merge(["hello", 5], []);
$e = array_merge(["hello", 5], ["hello again"]);
<?php
$f = [];
$f[0] = "hello";
<?php
$a = [];

if (rand(0, 1)) {
    $a[] = 4;
}

if (!$a) {
    $a = null;
}
<?php
$a = [];

if (rand(0, 1)) {
    $a[] = 4;
}

if ($a) {
} elseif (rand(0, 1)) {
    $a = null;
}
<?php
$a = [];

if (rand(0, 1)) {
    $a[] = 4;
}

if ($a) {
} else {
    $a = null;
}
<?php
function foo(object $obj) : array {
    $ret = [];
    $ret["a"][$obj->foo()] = 1;
    return $ret["a"];
}
<?php
function takesString(string $s) : void {}
function updateArray(array $arr) : array {
    foreach ($arr as $i => $item) {
        $arr[$i]["a"]["b"] = 5;
        $arr[$i]["a"]["c"] = takesString($arr[$i]["a"]["c"]);
    }

    return $arr;
}
<?php
if (rand(0,1)) {
  $a = ["a" => 1];
} else {
  $a = [2, 3];
}

if (isset($a[0])) {
    echo $a[0];
}
<?php
if (rand(0,1)) {
  $a = ["a" => 1];
} else {
  $a = [2, 3];
}

if (array_key_exists(0, $a)) {
    echo $a[0];
}
<?php
class MyCollection {
    /**
     * @param int $commenter
     * @param int $numToGet
     * @return int[]
     */
    public function getPosters($commenter, $numToGet=10) {
        $posters = array();
        $count = 0;
        $a = new ArrayObject([[1234]]);
        $iter = $a->getIterator();
        while ($iter->valid() && $count < $numToGet) {
            $value = $iter->current();
            if ($value[0] != $commenter) {
                if (!array_key_exists($value[0], $posters)) {
                    $posters[$value[0]] = 1;
                    $count++;
                }
            }
            $iter->next();
        }
        return array_keys($posters);
    }
}
<?php
$a = [];

foreach (["one", "two", "three"] as $key) {
  /**
   * @psalm-suppress EmptyArrayAccess
   * @psalm-suppress InvalidOperand
   * @psalm-suppress MixedOperand
   */
  $a[$key] += 5;
}

$a["four"] = true;

if ($a["one"]) {}
<?php
$arr = [1 => 0, 1, 2, 3];
$arr = [1 => "one", 2 => "two", "three"];
<?php
const BAR = 2;
$arr = [1 => 2];
$arr[BAR] = [6];
$bar = $arr[BAR][0];
<?php
$a = (array) (rand(0, 1) ? [1 => "one"] : 0);
$b = (array) null;
<?php
function getArray() : array {
    return rand(0, 1) ? ["attr" => []] : [];
}

$out = getArray();
$out["attr"] = (array) ($out["attr"] ?? []);
$out["attr"]["bar"] = 1;
<?php
function foo(array $arr) : void {
    $arr["a"] = 1;

    foreach ($arr["b"] as $b) {}
}
<?php
class A {}
class B extends A {
    public function foo(): void {}
}

function assertInstanceOfB(A $var): void {
    if (!$var instanceof B) {
        throw new \Exception();
    }
}

function takesA(A $a): void {
    assertInstanceOfB($a);
    $a->foo();
}
<?php
class A {
    public function bar() : void {}
}
interface I {
    public function foo(): void;
}
class B extends A implements I {
    public function foo(): void {}
}

function assertInstanceOfI(A $var): void {
    if (!$var instanceof I) {
        throw new \Exception();
    }
}

function takesA(A $a): void {
    assertInstanceOfI($a);
    $a->bar();
    $a->foo();
}
<?php
class A {
    public function bar() : void {}
}
interface I1 {
    public function foo1(): void;
}
interface I2 {
    public function foo2(): void;
}
class B extends A implements I1, I2 {
    public function foo1(): void {}
    public function foo2(): void {}
}

function assertInstanceOfInterfaces(A $var): void {
    if (!$var instanceof I1 || !$var instanceof I2) {
        throw new \Exception();
    }
}

function takesA(A $a): void {
    assertInstanceOfInterfaces($a);
    $a->bar();
    $a->foo1();
}
<?php
class A {}
class B extends A {
    public function foo(): void {}
}

class C {
    private function assertInstanceOfB(A $var): void {
        if (!$var instanceof B) {
            throw new \Exception();
        }
    }

    private function takesA(A $a): void {
        $this->assertInstanceOfB($a);
        $a->foo();
    }
}
<?php
class A {
    public function foo(): void {}
}

class B {
    /** @var A|null */
    public $a;

    private function assertNotNullProperty(): void {
        if (!$this->a) {
            throw new \Exception();
        }
    }

    public function takesA(A $a): void {
        $this->assertNotNullProperty();
        $a->foo();
    }
}
<?php
/**
 * @param mixed $data
 * @throws \Exception
 */
function assertIsLongString($data): void {
    if (!is_string($data)) {
        throw new Exception;
    }
    if (strlen($data) < 100) {
        throw new Exception;
    }
}

/**
 * @throws Exception
 */
function f(string $s): void {
    assertIsLongString($s);
}
<?php
class A {}
class B extends A {
    public function foo(): void {}
}

/** @psalm-assert B $var */
function myAssertInstanceOfB(A $var): void {
    if (!$var instanceof B) {
        throw new \Exception();
    }
}

function takesA(A $a): void {
    myAssertInstanceOfB($a);
    $a->foo();
}
<?php
/** @psalm-assert-if-true string $myVar */
function isValidString(?string $myVar) : bool {
    return $myVar !== null && $myVar[0] === "a";
}

$myString = rand(0, 1) ? "abacus" : null;

if (isValidString($myString)) {
    echo "Ma chaine " . $myString;
}
<?php
/** @psalm-assert-if-false string $myVar */
function isInvalidString(?string $myVar) : bool {
    return $myVar === null || $myVar[0] !== "a";
}

$myString = rand(0, 1) ? "abacus" : null;

if (isInvalidString($myString)) {
    // do something
} else {
    echo "Ma chaine " . $myString;
}
<?php
/**
 * @psalm-assert-if-true string $a
 * @param mixed $a
 */
function my_is_string($a) : bool
{
    return is_string($a);
}

if (my_is_string($_SERVER["abc"])) {
    $i = substr($_SERVER["abc"], 1, 2);
}
<?php
interface Foo {}

class Bar implements Foo {
    public function sayHello(): void {
        echo "Hello";
    }
}

/**
 * @param mixed $value
 * @param class-string $type
 * @template T
 * @template-typeof T $type
 * @psalm-assert T $value
 */
function assertInstanceOf($value, string $type): void {
    // some code
}

// Returns concreate implmenetation of Foo, which in this case is Bar
function getImplementationOfFoo(): Foo {
    return new Bar();
}

$bar = getImplementationOfFoo();
assertInstanceOf($bar, Bar::class);

$bar->sayHello();
<?php
class A {
    public function foo() : bool {
        return (bool) rand(0, 1);
    }
    public function bar() : bool {
        return (bool) rand(0, 1);
    }
}

/**
 * Asserts that a condition is false.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @psalm-assert false $actual
 */
function assertFalse($condition, $message = "") : void {}

function takesA(A $a) : void {
    assertFalse($a->foo());
    assertFalse($a->bar());
}
<?php
class A {}

/**
 * @param class-string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @template T
 * @template-typeof T $expected
 * @psalm-assert T $actual
 */
function assertInstanceOf($expected, $actual) : void {
}

/**
 * @psalm-suppress RedundantCondition
 */
function takesA(A $a) : void {
    assertInstanceOf(A::class, $a);
}
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert =T $actual
 */
function assertSame($expected, $actual) : void {}

$a = rand(0, 1) ? "goodbye" : "hello";
$b = rand(0, 1) ? "hello" : "goodbye";
assertSame($a, $b);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertSame($c, $d);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertSame($d, $c);

$c = 4;
$d = rand(0, 1) ? 4 : 5;
assertSame($d, $c);

$d = rand(0, 1) ? 4 : null;
assertSame(null, $d);

function foo(string $a, string $b) : void {
    assertSame($a, $b);
}
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert !=T $actual
 */
function assertNotSame($expected, $actual) : void {}

$a = rand(0, 1) ? "goodbye" : "hello";
$b = rand(0, 1) ? "hello" : "goodbye";
assertNotSame($a, $b);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertNotSame($c, $d);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertNotSame($d, $c);

$c = 4;
$d = rand(0, 1) ? 4 : 5;
assertNotSame($d, $c);

function foo(string $a, string $b) : void {
    assertNotSame($a, $b);
}
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert ~T $actual
 */
function assertEqual($expected, $actual) : void {}

$a = rand(0, 1) ? "goodbye" : "hello";
$b = rand(0, 1) ? "hello" : "goodbye";
assertEqual($a, $b);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertEqual($c, $d);

$c = "hello";
$d = rand(0, 1) ? "hello" : "goodbye";
assertEqual($d, $c);

$c = 4;
$d = rand(0, 1) ? 3.0 : 4.0;
assertEqual($d, $c);

$c = 4.0;
$d = rand(0, 1) ? 3 : 4;
assertEqual($d, $c);

function foo(string $a, string $b) : void {
    assertEqual($a, $b);
}
<?php
class A {
    public function bar() : void {}
}
interface I1 {
    public function foo1(): void;
}
interface I2 {
    public function foo2(): void;
}
class B extends A implements I1, I2 {
    public function foo1(): void {}
    public function foo2(): void {}
}

function assertInstanceOfInterfaces(A $var): void {
    if (!$var instanceof I1 && !$var instanceof I2) {
        throw new \Exception();
    }
}

function takesA(A $a): void {
    assertInstanceOfInterfaces($a);
    $a->bar();
    $a->foo1();
}
<?php
function isValidString(?string $myVar) : bool {
    return $myVar !== null && $myVar[0] === "a";
}

$myString = rand(0, 1) ? "abacus" : null;

if (isValidString($myString)) {
    echo "Ma chaine " . $myString;
}
<?php
function isInvalidString(?string $myVar) : bool {
    return $myVar === null || $myVar[0] !== "a";
}

$myString = rand(0, 1) ? "abacus" : null;

if (isInvalidString($myString)) {
    // do something
} else {
    echo "Ma chaine " . $myString;
}
<?php
class C {
    /**
     * @param mixed $p
     * @psalm-assert-if-true int $p
     */
    public function isInt($p): bool {
        return is_int($p);
    }
    /**
     * @param mixed $p
     */
    public function doWork($p): void {
        if ($this->isInt($p)) {
            strlen($p);
        }
    }
}
<?php
class C {
    /**
     * @param mixed $p
     * @psalm-assert-if-true int $p
     */
    public static function isInt($p): bool {
        return is_int($p);
    }
    /**
     * @param mixed $p
     */
    public function doWork($p): void {
        if ($this->isInt($p)) {
            strlen($p);
        }
    }
}
<?php
interface Foo {}

class Bar implements Foo {
    public function sayHello(): void {
        echo "Hello";
    }
}

/**
 * @param mixed $value
 * @param class-string $type
 * @psalm-assert SomeUndefinedClass $value
 */
function assertInstanceOf($value, string $type): void {
    // some code
}

// Returns concreate implmenetation of Foo, which in this case is Bar
function getImplementationOfFoo(): Foo {
    return new Bar();
}

$bar = getImplementationOfFoo();
assertInstanceOf($bar, Bar::class);

$bar->sayHello();
<?php
class A {}

/**
 * @param class-string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @template T
 * @template-typeof T $expected
 * @psalm-assert T $actual
 */
function assertInstanceOf($expected, $actual) : void {
}

function takesA(A $a) : void {
    assertInstanceOf(A::class, $a);
}
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert =T $actual
 */
function assertSame($expected, $actual) : void {}

$a = 5;
$b = "hello";
assertSame($a, $b);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert =T $actual
 */
function assertSame($expected, $actual) : void {}

$a = 5;
$b = 5;
assertSame($a, $b);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert =T $actual
 */
function assertSame($expected, $actual) : void {}

$c = "helloa";
$d = rand(0, 1) ? "hello" : "goodbye";
assertSame($c, $d);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert !=T $actual
 */
function assertNotSame($expected, $actual) : void {}

$c = "helloa";
$d = rand(0, 1) ? "hello" : "goodbye";
assertNotSame($c, $d);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert ~T $actual
 */
function assertEqual($expected, $actual) : void {}

$c = "helloa";
$d = rand(0, 1) ? "hello" : "goodbye";
assertEqual($c, $d);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert ~T $actual
 */
function assertEqual($expected, $actual) : void {}

$c = 4;
$d = rand(0, 1) ? 5.0 : 6.0;
assertEqual($c, $d);
<?php

/**
 * Asserts that two variables are the same.
 *
 * @template T
 * @param T      $expected
 * @param mixed  $actual
 * @psalm-assert ~T $actual
 */
function assertEqual($expected, $actual) : void {}

$c = 4.0;
$d = rand(0, 1) ? 5 : 6;
assertEqual($c, $d);
<?php
/** @var mixed */
$a = 5;
$b = $a;
<?php
$a = $b = $c = 5;
<?php
$a = "b" + 5;
<?php
$a = 5 + 4.1;
<?php
$a = "hi" . 5;
<?php
$a = [1] + 1;
<?php
$a = "hi" + (new stdClass);
<?php
$b = rand(0, 1) ? [] : 4;
echo $b + 5;
<?php
$b = rand(0, 1) ? [] : "hello";
echo $b . "goodbye";
<?php
$a = gmp_init(2);
$b = "a" + $a;
<?php
$a = "hello";
$a++;
<?php
$a = false;
$a++;
<?php
$a = true;
$a++;
<?php
$a = 5 / (rand(0, 1) ? 2 : null);
<?php
$a = 5 + 4;
<?php
$a = 5 + 4.1;
<?php
$a = 25 % 2;
$b = 25.4 % 2;
$c = 25 % 2.5;
$d = 25.5 % 2.5;
<?php
$a = "5";

if (is_numeric($a)) {
    $b = $a + 4;
}
<?php
$a = "Hey " . "Jude,";
<?php
$a = "hi" . 5;
<?php
function foo(string $s) : int {
    return strpos($s, "a") + strpos($s, "b");
}
<?php
$a = 4 & 5;
$b = 2 | 3;
$c = 4 ^ 3;
$d = 1 << 2;
$e = 15 >> 2;
$f = "a" & "b";
<?php
$a = true ^ false;
$b = false ^ false;
$c = (true xor false);
$d = (false xor false);
<?php
rand(0, 1) ? $a = 1 : $a = 2;
echo $a;
<?php
$name = rand(0, 1) ? "hello" : null;
if ($name !== null || ($name = rand(0, 1) ? "hello" : null) !== null) {}
<?php
$a = 1.1;
$a++;
$b = 1.1;
$b += 1;
<?php
$bar = ["foo", "bar"];

$bam = array_map(
    function(int $a): int {
        return $a + 1;
    },
    $bar
);
<?php
$bar = ["foo", "bar"];

$bam = array_map(
    function(string $a): string {
    },
    $bar
);
<?php
class A {
    public function getFoo(): Foo
    {
        return new Foo([]);
    }

    /**
     * @param  mixed $argOne
     * @param  mixed $argTwo
     * @return void
     */
    public function bar($argOne, $argTwo)
    {
        $this->getFoo()($argOne, $argTwo);
    }
}
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo("A::barr");
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo(A::class . "::barr");
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo([A::class, "::barr"]);
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo(["A", "::barr"]);
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo("B::bar");
<?php
function foo(callable $c): void {}

foo("trime");
<?php
/**
 * @var Closure|null $foo
 */
$foo = null;


$foo =
    /** @param mixed $bar */
    function ($bar) use (&$foo): string
    {
        if (is_array($bar)) {
            return $foo($bar);
        }

        return $bar;
    };
<?php
$bad_one = "hello";
$a = $bad_one(1);
<?php
$take_string = function(string $s): string { return $s; };
$take_string(42);
<?php
$a = function() {
    return "foo";
};
<?php
$add_one = function(int $a): int {
    return $a + 1;
};

/**
 * @param callable(int) : int $c
 */
function bar(callable $c) : string {
    return $c(1);
}

bar($add_one);
<?php
/**
 * @param Closure(int):int $f
 * @param Closure(int):int $g
 *
 * @return Closure(int):string
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
/**
 * @param Closure(int):int $f
 * @param Closure(int):int $g
 *
 * @return callable(int):string
 */
function foo(Closure $f, Closure $g) : callable {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
/**
 * @param Closure(int):int $f
 * @param Closure(int):int $g
 *
 * @return Closure(string):int
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
/**
 * @param Closure(int):int $f
 * @param Closure(int):int $g
 *
 * @return callable(string):int
 */
function foo(Closure $f, Closure $g) : callable {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
class A {}
class B {}
class C {}
class D {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
class A {}
class B {}
class C {}
class C2 extends C {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C2):A
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (C $x) use ($f, $g) : A {
        return $f($g($x));
    };
}
<?php
class A {}
class B {}
class C {}
class A2 extends A {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A2
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (C $x) use ($f, $g) : A {
        return $f($g($x));
    };
}
<?php
class A {}
class B {}
class C {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return callable(C):A
 */
function foo(Closure $f, Closure $g) : callable {
    return function (C $x) use ($f, $g) : A {
        return $f($g($x));
    };
}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A
 */
function bar(Closure $f, Closure $g) : Closure {
    return foo($f, $g);
}
<?php
$a = function() use ($i) {};
<?php
$arr = array_map(
    function(int $i) : void {
        echo $i;
    },
    [1, 2, 3]
);

foreach ($arr as $a) {
    if ($a) {}
}
<?php
/** @return void */
function run_function(\Closure $fnc) {
    $fnc();
}

// here we have to make sure $data exists as a side-effect of calling `run_function`
// because it could exist depending on how run_function is implemented
/**
 * @return void
 * @psalm-suppress MixedArgument
 */
function fn() {
    run_function(
        /**
         * @return void
         */
        function() use(&$data) {
            $data = 1;
        }
    );
    echo $data;
}

fn();
<?php
$bar = ["foo", "bar"];

$bam = array_map(
    /**
     * @psalm-suppress MissingClosureReturnType
     */
    function(string $a) {
        return $a . "blah";
    },
    $bar
);
<?php
$add_one = function(int $a): int {
    return $a + 1;
};

$a = $add_one(1);
<?php
$add_one = function(int $a): int {
    return $a + 1;
};

/**
 * @param  callable(int) : int $c
 */
function bar(callable $c) : int {
    return $c(1);
}

bar($add_one);
<?php
/**
 * @return callable
 */
function foo() {
    return function(string $a): string {
        return $a . "blah";
    };
}
<?php
function foo(callable $c): void {
    echo (string)$c();
}
<?php
class C {
    public function __invoke(): string {
        return "You ran?";
    }
}

function foo(callable $c): void {
    echo (string)$c();
}

foo(new C());

$c2 = new C();
$c2();
<?php
$take_string = function(string $s): string { return $s; };
$take_string("string");
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo("A::bar");
foo(A::class . "::bar");
foo(["A", "bar"]);
foo([A::class, "bar"]);
$a = new A();
foo([$a, "bar"]);
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function baz(string $a): string {
    return $a . "b";
}

$a = array_map("A::bar", ["one", "two"]);
$b = array_map(["A", "bar"], ["one", "two"]);
$c = array_map([A::class, "bar"], ["one", "two"]);
$d = array_map([new A(), "bar"], ["one", "two"]);
$a_instance = new A();
$e = array_map([$a_instance, "bar"], ["one", "two"]);
$f = array_map("baz", ["one", "two"]);
<?php
$mirror = function(int $i) : int { return $i; };
$a = array_map($mirror, [1, 2, 3]);
<?php
class A {
    public static function bar(string $a): string {
        return $a . "b";
    }
}

function foo(callable $c): void {}

foo(["A", "bar"]);
<?php
function foo(callable $c): void {}

foo("trim");
<?php
class A {
    function bar(): void {
        function foobar(int $a, int $b): int {
            return $a > $b ? 1 : 0;
        }

        $arr = [5, 4, 3, 1, 2];

        usort($arr, "fooBar");
    }
}
<?php
class A
{
    /**
     * @var self[]
     */
    private $subitems;

    /**
     * @param self[] $in
     */
    public function __construct(array $in = [])
    {
        array_map(function(self $i): self { return $i; }, $in);

        $this->subitems = array_map(
          function(self $i): self {
            return $i;
          },
          $in
        );
    }
}

new A([new A, new A]);
<?php
  /**
   * @param string|callable $middlewareOrPath
   */
  function pipe($middlewareOrPath, ?callable $middleware = null): void {  }

pipe("zzzz", function() : void {});
<?php
function asd(): void {}
class B {}

/**
 * @param callable|B $p
 */
function passes($p): void {}

passes("asd");
<?php
function asd(): void {}
class A { public function __invoke(): void {} }

/**
 * @param callable|A $p
 */
function fails($p): void {}

fails("asd");
<?php
class A
{
    public function callMeMaybe(string $method): void
    {
        $handleMethod = [$this, $method];

        if (is_callable($handleMethod)) {
            $handleMethod();
        }
    }

    public function foo(): void {}
}
$a = new A();
$a->callMeMaybe("foo");
<?php
function foo(): void {}

function callMeMaybe(string $method): void {
    if (is_callable($method)) {
        $method();
    }
}

callMeMaybe("foo");
<?php
$a = array_map(
    function(int $type, string ...$args):string {
        return "hello";
    },
    [1, 2, 3]
);
<?php
/**
 * @param Closure(int):int $f
 * @param Closure(int):int $g
 *
 * @return Closure(int):int
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (int $x) use ($f, $g) : int {
        return $f($g($x));
    };
}
<?php
class A {}
class B {}
class C {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (C $x) use ($f, $g) : A {
        return $f($g($x));
    };
}

$a = foo(
    function(B $b) : A { return new A;},
    function(C $c) : B { return new B;}
)(new C);
<?php
class A {}
class B {}
class C {}
class C2 extends C {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (C2 $x) use ($f, $g) : A {
        return $f($g($x));
    };
}

$a = foo(
    function(B $b) : A { return new A;},
    function(C $c) : B { return new B;}
)(new C2);
<?php
class A {}
class B {}
class C {}
class A2 extends A {}

/**
 * @param Closure(B):A2 $f
 * @param Closure(C):B $g
 *
 * @return Closure(C):A
 */
function foo(Closure $f, Closure $g) : Closure {
    return function (C $x) use ($f, $g) : A2 {
        return $f($g($x));
    };
}

$a = foo(
    function(B $b) : A2 { return new A2;},
    function(C $c) : B { return new B;}
)(new C);
<?php
class A {}
class B {}
class C {}

/**
 * @param Closure(B):A $f
 * @param Closure(C):B $g
 *
 * @return callable(C):A
 */
function foo(Closure $f, Closure $g) : callable {
    return function (C $x) use ($f, $g) : A {
        return $f($g($x));
    };
}

$a = foo(
    function(B $b) : A { return new A;},
    function(C $c) : B { return new B;}
)(new C);
<?php
$adder1 = function(int $i) : callable {
  return function(int $j) use ($i) : int {
    return $i + $j;
  };
};
$adder2 = function(int $i) {
  return function(int $j) use ($i) : int {
    return $i + $j;
  };
};
<?php
/**
 * @param array{0:string,1:string}[] $ret
 * @return array{0:string,1:int}[]
 */
function f(array $ret) : array
{
    return array_map(
        /**
         * @param array{0:string,1:string} $row
         */
        function (array $row) {
            return [
                strval($row[0]),
                intval($row[1]),
            ];
        },
        $ret
    );
}
<?php
/**
 * @param array{0:string,1:string}[] $ret
 * @return array{0:string,1:int}[]
 */
function f(array $ret): array
{
    return array_map(
        /**
         * @param array{0:string,1:string} $row
         */
        function (array $row): array {
            return [
                strval($row[0]),
                intval($row[1]),
            ];
        },
        $ret
    );
}
<?php
/**
 * @param callable():void $p
 */
function doSomething($p): void {}
doSomething(function(): bool { return false; });
<?php
class C {
    /** @psalm-var callable():bool */
    private $callable;

    /**
     * @psalm-param callable():bool $callable
     */
    public function __construct(callable $callable) {
        $this->callable = $callable;
    }

    public function callTheCallableDirectly(): bool {
        return ($this->callable)();
    }

    public function callTheCallableIndirectly(): bool {
        $r = $this->callable;
        return $r();
    }
}
<?php
class A {
    public function __invoke(): bool { return true; }
}

class C {
    /** @var A $invokable */
    private $invokable;

    public function __construct(A $invokable) {
        $this->invokable = $invokable;
    }

    public function callTheInvokableDirectly(): bool {
        return ($this->invokable)();
    }

    public function callTheInvokableIndirectly(): bool {
        $r = $this->invokable;
        return $r();
    }
}
<?php
namespace NS;
use Closure;
/** @param Closure(int):bool $c */
function acceptsIntToBool(Closure $c): void {}

acceptsIntToBool(Closure::fromCallable(function(int $n): bool { return $n > 0; }));
<?php
$a = function() : Closure { return function() : string { return "hello"; }; };
$b = $a()();
<?php
/** @param callable(mixed):?A $a */
function foo(callable $a): void {}
<?php
array_map(
    function(int $i) : void {
        echo $i;
    },
    [1, 2, 3]
);
<?php
class C extends C {}
<?php
class E extends F {}
class F extends E {}
<?php
class G extends H {}
class H extends I {}
class I extends G {}
<?php
class A extends B {}

class B {
    public function fooFoo(): void {
        $a = new A();
        $a->barBar();
    }

    protected function barBar(): void {
        echo "hello";
    }
}
<?php
class A { const B = 42;}
$a = A::B;
class C {}
<?php
class B extends C {
    public function d(): A {
        return new A;
    }
}
class C {
    /** @var string */
    public $p = A::class;
    public static function e(): void {}
}
class A extends B {
    private function f(): void {
        self::e();
    }
}
<?php
class A {
    public function b(B $b): void {

    }

    public function c(): void {

    }
}

class B extends A {
    public function d(): void {
        $this->c();
    }
}
<?php
class A {
    public function b(A $b): void {
        $b->b(new A());
    }
}
<?php
namespace Foo;

class A {
    /** @var string */
    protected $foo = C::DOPE;

    /** @return string */
    public function __get() {
        return "foo";
    }
}

class B extends A {
    /** @return void */
    public function foo() {
        echo (string)(new C)->bar;
    }
}

class C extends B {
    const DOPE = "dope";
}
<?php
class A {
    private function fooFoo(): void {

    }
}

(new A())->fooFoo();
<?php
class A {
    protected function fooFoo(): void {

    }
}

(new A())->fooFoo();
<?php
class A {
    private function fooFoo(): void {

    }
}

class B extends A {
    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    protected function fooFoo(): void {
    }
}

class B {
    use T;
}

class C {
    use T;

    public function doFoo(): void {
        (new B)->fooFoo();
    }
}
<?php
class A {
    /** @var string */
    private $fooFoo;
}

echo (new A())->fooFoo;
<?php
class A {
    /** @var string */
    protected $fooFoo;
}

echo (new A())->fooFoo;
<?php
class A {
    /** @var string */
    private $fooFoo = "";
}

class B extends A {
    public function doFoo(): void {
        echo $this->fooFoo;
    }
}
<?php
class A {
    /** @var string */
    private static $fooFoo;
}

echo A::$fooFoo;
<?php
class A {
    /** @var string */
    protected static $fooFoo;
}

echo A::$fooFoo;
<?php
class A {
    /** @var string */
    private static $fooFoo;
}

class B extends A {
    public function doFoo(): void {
        echo A::$fooFoo;
    }
}
<?php
class A {
    private function __construct() { }
}
class B extends A {}
new B();
<?php
class A {
    private function __construct() { }
}
class B extends A {
    public function __construct() {
        parent::__construct();
    }
}
<?php
class A {
    private function fooFoo(): void {

    }

    private function barBar(): void {
        $this->fooFoo();
    }
}
<?php
class A {
    protected function fooFoo(): void {
    }
}

class B extends A {
    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
class A {
    protected function fooFoo(): void {
    }
}

class B extends A { }

class C extends A {
    public function doFoo(): void {
        (new B)->fooFoo();
    }
}
<?php
class A {
    /** @var string */
    protected $fooFoo = "";
}

class B extends A {
    public function doFoo(): void {
        echo $this->fooFoo;
    }
}
<?php
class A {
    /** @var string */
    protected $fooFoo = "";
}

class B extends A { }

class C extends B { }

class D extends C {
    public function doFoo(): void {
        echo $this->fooFoo;
    }
}
<?php
class A {
    /** @var string */
    protected $fooFoo = "";
}

class B extends A {
}

class C extends A {
    public function fooFoo(): void {
        $b = new B();
        $b->fooFoo = "hello";
    }
}
<?php
class A {
    /** @var string */
    protected static $fooFoo = "";

    public function barBar(): void {
        echo self::$fooFoo;
    }
}

class B extends A {
    public function doFoo(): void {
        echo A::$fooFoo;
    }
}
<?php
class A {
    public function foo(): void {
        if ($this instanceof B) {
            $this->boop();
        }
    }

    private function boop(): void {}
}

class B extends A {
    private function boop(): void {}
}
<?php
/**
 * @param array<class-string> $arr
 */
function takesClassConstants(array $arr) : void {}

class A {}
class B {}

takesClassConstants(["A", "B"]);
<?php
/**
 * @param array<class-string> $arr
 */
function takesClassConstants(array $arr) : void {}
takesClassConstants(["A", "B"]);
<?php
/**
 * @param clas-string $s
 */
function takesClassConstants(string $s) : void {}
<?php
class A {}

/**
 * @return class-string
 */
function takesClassConstants() : string {
    return "A";
}
<?php
class A {}

/**
 * @return array<class-string>
 */
function takesClassConstants() : array {
    return ["A", "B"];
}
<?php
class A {}

/**
 * @return array<class-string>
 */
function takesClassConstants() : array {
    return ["A", "B"];
}
<?php
/**
 * @param array<class-string> $arr
 */
function takesClassConstants(array $arr) : void {}

class A {}
class B {}

takesClassConstants([A::class, B::class]);
<?php
/**
 * @param array<class-string> $arr
 */
function takesClassConstants(array $arr) : void {}

class A {}
class B {}

takesClassConstants(["A", "B"]);
<?php
/**
 * @param class-string $s
 */
function takesClassConstants(string $s) : void {}

class A {}

takesClassConstants(A::class);
<?php
/**
 * @param class-string $s
 */
function takesClassConstants(string $s) : void {}

class A {}

takesClassConstants("A");
<?php
class A {}

/**
 * @return class-string
 */
function takesClassConstants() : string {
    return A::class;
}
<?php
class A {}

/**
 * @return class-string
 */
function takesClassConstants() : string {
    return "A";
}
<?php
class A {}
class B {}

/**
 * @return array<class-string>
 */
function takesClassConstants() : array {
    return [A::class, B::class];
}
<?php
class A {}
class B {}

/**
 * @return array<class-string>
 */
function takesClassConstants() : array {
    return ["A", "B"];
}
<?php
class A {}
class B {}

/** @param class-string $class */
function foo(string $class) : void {
    if ($class === A::class) {}
    if ($class === A::class || $class === B::class) {}
}
<?php
class A {}

/** @return class-string */
function foo() : string {
    return A::class;
}

/** @param class-string $a */
function bar(string $a) : void {}

bar(rand(0, 1) ? foo() : A::class);
bar(rand(0, 1) ? A::class : foo());
<?php
class A {}

function foo(string $s) : void {
    if ($s === A::class) {
        bar($s);
    }
}

/** @param class-string $s */
function bar(string $s) : void {
    new $s();
}
<?php
class A {
    const FOO = [
        B::class => "bar",
    ];
}
class B {}

/** @param class-string $s */
function bar(string $s) : void {}

foreach (A::FOO as $class => $_) {
    bar($class);
}
<?php
class A {}
class B {}

$foo = [
    A::class,
    B::class
];

foreach ($foo as $class) {
    if ($class === A::class) {}
}
<?php
class A {}
class B {}
class C {}

/** @param mixed $a */
function foo($a) : void {
    switch ($a) {
        case A::class:
            return;

        case B::class:
        case C::class:
            return;
    }
}
<?php
/** @psalm-param ?class-string $s */
function bar(?string $s) : void {}

class A {}

/** @psalm-return ?class-string */
function bat() {
    if (rand(0, 1)) return null;
    return A::class;
}

$a = bat();
$a ? 1 : 0;
bar($a);
<?php
(new Foo());
<?php
class Foo {}
(new foo());
<?php
class A {}
needsA(new A);
function needsA(a $x): void {}
<?php
echo $this;
<?php
$this = "hello";
<?php
echo HELLO;
<?php
class A {}
echo A::HELLO;
<?php
class A {
    public function fooFoo(): void {}
}

class B extends A {
    private function fooFoo(): void {}
}
<?php
class A {
    public function fooFoo(): void {}
}

class B extends A {
    protected function fooFoo(): void {}
}
<?php
class A {
    protected function fooFoo(): void {}
}

class B extends A {
    private function fooFoo(): void {}
}
<?php
class A {
    /** @var string|null */
    public $foo;
}

class B extends A {
    /** @var string|null */
    private $foo;
}
<?php
class A {
    /** @var string|null */
    public $foo;
}

class B extends A {
    /** @var string|null */
    protected $foo;
}
<?php
class A {
    /** @var string|null */
    protected $foo;
}

class B extends A {
    /** @var string|null */
    private $foo;
}
<?php
class Foo {}
class Foo {}
<?php
namespace Aye {
    class Foo {}
    class Foo {}
}
<?php
namespace Aye {
    class Foo {}
}
namespace Aye {
    class Foo {}
}
<?php
abstract class A {}
new A();
<?php
abstract class A {
    abstract public function foo();
}

class B extends A { }
<?php
class DedupeIterator extends FilterIterator {
    public function __construct(Iterator $i) {
        parent::__construct($i);
    }
}
<?php
class A extends B { }
<?php
class A {}
class B extends A {}

function foo(A $a): B {
    return $a;
}
<?php
class A extends A {}
<?php
class A {
    protected function fooFoo(): void {}
}

class B extends A {
    public function fooFoo(): void {}
}
<?php
$e = rand(0, 10)
  ? new RuntimeException("m")
  : null;

if ($e instanceof Exception) {
  echo "good";
}
<?php
namespace Aye {
    class Foo {}
}
namespace Bee {
    use Aye as A;

    new A\Foo();
}
<?php
abstract class A {
    /** @return void */
    abstract public function foo();
}

abstract class B extends A {
    /** @return void */
    public function bar() {
        $this->foo();
    }
}
<?php
class B extends C {
    public function fooA() { }
}
<?php
class A {}
class B extends A {}

class E1 {
    /**
     * @param A|B|null $a
     */
    public function __construct($a) {
    }
}

class E2 extends E1 {
    /**
     * @param A|null $a
     */
    public function __construct($a) {
        parent::__construct($a);
    }
}
<?php
class A extends InvalidArgumentException {
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous_exception
     */
    public function __construct($message, $code, $previous_exception) {
        parent::__construct($message, $code, $previous_exception);
    }
}
<?php
class Foo {}
class Bar {}
$class = mt_rand(0, 1) === 1 ? Foo::class : Bar::class;
$object = new $class();
<?php
class Foo {
    public function bar() : void{}
}

/**
 * @return string|null
 */
function getFooClass() {
    return mt_rand(0, 1) === 1 ? Foo::class : null;
}

$foo_class = getFooClass();

if (is_string($foo_class) && is_a($foo_class, Foo::class, true)) {
    $foo = new $foo_class();
    $foo->bar();
}
<?php
class Foo{}
function bar(string $maybeBaz) : string {
  if (!is_a($maybeBaz, Foo::class, true)) {
    throw new Exception("not Foo");
  }
  return $maybeBaz;
}
<?php
class Foo{}
function bar(string $maybeBaz) : string {
  if (!is_a($maybeBaz, "Foo", true)) {
    throw new Exception("not Foo");
  }
  return $maybeBaz;
}
<?php
/**
 * @param array<string, object> $array
 * @psalm-suppress MixedAssignment
 */
function foo(array $array, string $key) : void {
    foreach ($array as $i => $item) {
        $array[$key] = new class() {};

        if ($array[$i] === $array[$key]) {}
    }
}
<?php
class C {
    public function work(object $obj): string {
        if (get_class($obj) === self::class) {
            return $obj->baz();
        }
        return "";
    }

    public function baz(): string {
        return "baz";
    }
}
<?php
class C {
    public function foo1(): string {
        if (static::class === D::class) {
            return $this->baz();
        }
        return "";
    }

    public static function foo2(): string {
        if (static::class === D::class) {
            return static::bat();
        }
        return "";
    }
}

class D extends C {
    public function baz(): string {
        return "baz";
    }

    public static function bat(): string {
        return "baz";
    }
}
<?php
class C {
    public function foo1(): string {
        if (is_a(static::class, D::class, true)) {
            return $this->baz();
        }
        return "";
    }

    public static function foo2(): string {
        if (is_a(static::class, D::class, true)) {
            return static::bat();
        }
        return "";
    }
}

class D extends C {
    public function baz(): string {
        return "baz";
    }

    public static function bat(): string {
        return "baz";
    }
}
<?php
class B {
    public function __call(string $methodName, array $args) : string {
        return __METHOD__;
    }
}
class A {
    public function __call(string $methodName, array $args) : B {
        return new B;
    }
}
$a = (new A)->zugzug();
$b = (new A)->bar()->baz();
<?php
interface I {
    public function fooBar(): array;
}

abstract class A implements I
{
    public function g(): array {
        return $this->fooBar();
    }
}
<?php
/**
 * @return void
 */
function defineConstant() {
    define("CONSTANT", 1);
}

echo CONSTANT;
<?php
class A {
    public function doSomething(int $howManyTimes = self::DEFAULT_TIMES): void {}
}
<?php
class A {
    const KEYS = ["one", "two", "three", "four"];
    const ARR = [
        "one" => 1,
        "two" => 2
    ];

    const ARR2 = [
        "three" => 3,
        "four" => 4
    ];
}

foreach (A::KEYS as $key) {
    if (isset(A::ARR[$key])) {
        echo A::ARR2[$key];
    }
}
<?php
class C {
    const A = 0;
    const B = 1;

    const ARR = [
        self::A => "zero",
        self::B => "two",
    ];
}

if (C::ARR[C::A] === "two") {}
<?php
class A {
    const B = 1;
    const C = [B];
}
<?php
interface I {
    public const C = "a";

    public function getC(): string;
}

class A implements I {
    public function getC(): string {
        return self::C;
    }
}

class B extends A {
    public const C = [5];

    public function getC(): string {
        return self::C;
    }
}
<?php
useTest();
const TEST = 2;

function useTest(): int {
    return TEST;
}
<?php
const TEST = 2;

$useTest = function(): int {
    return TEST;
};
$useTest();
<?php
/**
 * @return void
 */
function defineConstant() {
    define("CONSTANT", 1);
}

defineConstant();

echo CONSTANT;
<?php
$a = __LINE__;
$b = __file__;
<?php
class A {
    const B = [0, 1, 2];
}

$a = A::B[1];
<?php
abstract class Enum {
    /**
     * @var string[]
     */
    protected const VALUES = [];
    public static function export(): string
    {
        assert(!empty(static::VALUES));
        $values = array_map(
            function(string $val): string {
                return "'" . $val . "'";
            },
            static::VALUES
        );
        return join(",", $values);
    }
}
<?php
switch (rand(0, 50)) {
    case FORTY: // Observed a valid UndeclaredConstant warning
        $x = "value";
        break;
    default:
        $x = "other";
    }

    echo $x;
<?php
class C {}

/** @psalm-suppress UndefinedConstant */
$a = POTATO;

/** @psalm-suppress UndefinedConstant */
$a = C::POTATO;
<?php
class A {
    const C = [
        self::B => 4,
        "name" => 3
    ];

    const B = 4;
}

echo A::C[4];
<?php
class B {
    const B = 4;
}
class A {
    const B = "four";
    const C = [
        B::B => "one",
    ];
}

echo A::C[4];
<?php
class A {
    const KEYS = ["one", "two", "three"];
    const ARR = [
        "one" => 1,
        "two" => 2
    ];
}

foreach (A::KEYS as $key) {
    if (isset(A::ARR[$key])) {
        echo A::ARR[$key];
    }
}
<?php
function finder(string $id) : ?object {
  if (rand(0, 1)) {
    return new A();
  }

  if (rand(0, 1)) {
    return new B();
  }

  return null;
}
class A {}
class B {}
class Foo
{
    private const TYPES = [
        "type1" => A::class,
        "type2" => B::class,
    ];

    public function bar(array $data): void
    {
        if (!isset(self::TYPES[$data["type"]])) {
            throw new \InvalidArgumentException("Unknown type");
        }

        $class = self::TYPES[$data["type"]];

        $ret = finder($data["id"]);

        if (!$ret || !$ret instanceof $class) {
            throw new \InvalidArgumentException;
        }
    }
}
<?php
class A {
    const FOO = "foo";
}

class B {
    const BAR = [
        A::FOO
    ];
    const BAR2 = A::FOO;
}

$a = B::BAR[0];
$b = B::BAR2;
<?php
if ("phpdbg" === \PHP_SAPI) {}
<?php
echo fread(STDIN, 100);
fwrite(STDOUT, "asd");
fwrite(STDERR, "zcx");
<?php
class A {}
class B {}

const C = [
    A::class => 1,
    B::class => 2,
];

/**
 * @param class-string $s
 */
function foo(string $s) : void {
    if (isset(C[$s])) {}
}
<?php
interface I {
    public const C = "a";

    public function getC(): string;
}

class A implements I {
    public function getC(): string {
        return self::C;
    }
}

class B extends A {
    public const C = [5];

    public function getA(): array {
        return self::C;
    }
}
<?php
class Foo {
    /**
     * @deprecated
     */
    public static function barBar(): void {
    }
}

Foo::barBar();
<?php
/**
 * @deprecated
 */
class Foo {
    public static function barBar(): void {
    }
}

Foo::barBar();
<?php
/**
 * @deprecated
 */
class Foo { }

$a = new Foo();
<?php
/**
 * @deprecated
 */
class Foo { }

class Bar extends Foo {}
<?php
class A{
  /**
   * @deprecated
   * @var ?int
   */
  public $foo;
}
echo (new A)->foo;
<?php
class A{
  /**
   * @deprecated
   * @var ?int
   */
  public $foo;
}
$a = new A;
$a->foo = 5;
<?php
class Foo {
    /**
     * @deprecated
     */
    public static function barBar(): void {
    }
}
<?php
function foo(array $arr) : void {
    if (empty($ar)) {
        // do something
    }
}
<?php
function foo(array $arr) : void {
    $a = empty($arr["a"]) ? "" : $arr["a"];

    if ($a) {
        if ($a) {}
    }
}
<?php
$a = !empty($b) ? $b : null;
<?php
function a(array $in): void
{
    $r = [];
    foreach ($in as $entry) {
        if (!empty($entry["a"])) {
            $r[] = [];
        }
        if (empty($entry["a"])) {
            $r[] = [];
        }
    }
}

function b(array $in): void
{
    $i = 0;
    foreach ($in as $entry) {
        if (!empty($entry["a"])) {
            $i--;
        }
        if (empty($entry["a"])) {
            $i++;
        }
    }
}

function c(array $in): void
{
    foreach ($in as $entry) {
        if (!empty($entry["a"])) {}
    }
    foreach ($in as $entry) {
        if (empty($entry["a"])) {}
    }
}
<?php
$arr_or_string = [];

if (rand(0, 1)) {
  $arr_or_string = "hello";
}

/** @return void **/
function foo(string $s) {}

if (!empty($arr_or_string)) {
    foo($arr_or_string);
}
<?php
/**
 * @param string|string[] $a
 */
function foo($a): string {
    if (is_string($a)) {
        return $a;
    } elseif (empty($a)) {
        return "goodbye";
    }

    if (isset($a[0])) {
        return $a[0];
    };

    return "not found";
}
<?php
/**
 * @param Exception|string|string[] $a
 */
function foo($a): string {
    if (is_array($a)) {
        return "hello";
    } elseif (empty($a)) {
        return "goodbye";
    }

    if (is_string($a)) {
        return $a;
    };

    return "an exception";
}
<?php
/**
 * @param Exception|null $a
 */
function foo($a): string {
    if ($a && $a->getMessage() === "hello") {
        return "hello";
    } elseif (empty($a)) {
        return "goodbye";
    }

    return $a->getMessage();
}
<?php
function foo(string $s): void {
  if (empty($s) || $s === "hello") {}
}
<?php
function testarray(array $data): void {
    foreach ($data as $item) {
        if (!empty($item["a"]) && !empty($item["b"]["c"])) {
            echo "Found\n";
        }
    }
}
<?php
function foo(array $args): void {
  extract($args);
  if ((empty($arr) && empty($a)) || $c === 0) {
  } else {
    foreach ($arr as $b) {}
  }
}
<?php
$arr = [
    "profile" => [
        "foo" => "bar",
    ],
    "groups" => [
        "foo" => "bar",
        "hide"  => rand(0, 5),
    ],
];

foreach ($arr as $item) {
    if (empty($item["hide"]) || $item["hide"] === 3) {}
}
<?php
function takesBool(bool $p): void {}
takesBool(empty($q));
<?php
function foo(int $t) : void {
    if (!$t) {
        foreach ([0, 1, 2] as $a) {
            if (!$t) {
                $t = $a;
            }
        }
    }
}
<?php
function foo($t) : void {
    if (empty($t)) {
        foreach ($_GET["u"] as $a) {
            if (empty($t)) {
                $t = $a;
            }
        }
    }
}
<?php
function _processScopes($scopes) : void {
    if (!is_array($scopes) && !empty($scopes)) {
        $scopes = explode(" ", trim($scopes));
    } else {
        // false is allowed here
    }

    if (empty($scopes)){}
}
<?php
/** @param array<int, int> $o */
function foo(array $o) : void {
    if (empty($o[0]) && empty($o[1])) {}
}
<?php
/** @param array $o */
function foo(array $o) : void {
    if (empty($o[0]) && empty($o[1])) {}
}
<?php
function foo(array $n): void {
    if (empty($n)) {
        return;
    }
    while (!empty($n)) {
        unset($n[rand(0, 10)]);
    }
}
<?php
function contains(array $data, array $needle): bool {
    if (empty($data) || empty($needle)) {
        return false;
    }
    $stack = [];

    while (!empty($needle)) {
        $key = key($needle);
        $val = $needle[$key];
        unset($needle[$key]);

        if (array_key_exists($key, $data) && is_array($val)) {
            $next = $data[$key];
            unset($data[$key]);

            if (!empty($val)) {
                $stack[] = [$val, $next];
            }
        } elseif (!array_key_exists($key, $data) || $data[$key] != $val) {
            return false;
        }

        if (empty($needle) && !empty($stack)) {
            list($needle, $data) = array_pop($stack);
        }
    }

    return true;
}
<?php
namespace Ns;

/** @psalm-param ( "foo" | "bar" | 1 | 2 | 3 ) $s */
function foo($s) : void {}
foo("bat");
<?php
namespace Ns;

/** @psalm-param ( "foo" | "bar" | 1 | 2 | 3 ) $s */
function foo($s) : void {}
foo(4);
<?php
namespace Ns;

/** @psalm-param "foo\"with"|"bar"|1|2|3 $s */
function foo($s) : void {}
foo(4);
<?php
namespace Ns;

class C {
    const A = "bat";
    const B = "baz";
}
/** @psalm-param "foo"|"bar"|C::A|C::B $s */
function foo($s) : void {}
foo("for");
<?php
namespace Ns;

/** @psalm-param "foo"|"bar"|C::A|C::B $s */
function foo($s) : void {}
<?php
class A {
    const FOO = "foo";
    const BAR = "bar";

    /**
     * @param (self::FOO | self::BAR) $s
     */
    public static function foo(string $s) : void {}
}

A::foo("for");
<?php
class A {
    const FOO = "foo";
    const BAR = "bar";

    /**
     * @param (self::1FOO | self::BAR) $s
     */
    public static function foo(string $s) : void {}
}
<?php
namespace NS {
    use OtherNS\C as E;
    class C {}
    class D {};
    class F {};
    /** @psalm-param C::class|D::class|E::class $s */
    function foo(string $s) : void {}
    foo(F::class);
}

namespace OtherNS {
    class C {}
}
<?php
namespace Ns;

/** @psalm-param ( "foo\"with" | "bar" | 1 | 2 | 3 ) $s */
function foo($s) : void {}
foo("foo\"with");
foo("bar");
foo(1);
foo(2);
foo(3);
<?php
namespace Ns;

/** @psalm-param "foo\"with"|"bar"|1|2|3 $s */
function foo($s) : void {}
foo("foo\"with");
foo("bar");
foo(1);
foo(2);
foo(3);
<?php
namespace Ns;

/**
 * @psalm-param ( "foo" | "bar") $s
 */
function foo(string $s) : void {
    switch ($s) {
      case "foo":
        break;
      case "bar":
        break;
    }
}
<?php
namespace Ns;

class C {
    const A1 = "bat";
    const B = "baz";
}
/** @psalm-param "foo"|"bar"|C::A1|C::B $s */
function foo($s) : void {}
foo("foo");
foo("bar");
foo("bat");
foo("baz");
<?php
class A {
    const FOO = "foo";
    const BAR = "bar";

    /**
     * @param (self::FOO | self::BAR) $s
     */
    public static function foo(string $s) : void {}
}

A::foo("foo");
<?php
namespace NS {
    use OtherNS\C as E;
    class C {}
    class D {};
    /** @psalm-param C::class|D::class|E::class $s */
    function foo(string $s) : void {}
    foo(C::class);
    foo(D::class);
    foo(E::class);
    foo(\OtherNS\C::class);
}

namespace OtherNS {
    class C {}
}
<?php
var_dump("hello");
<?php
`rm -rf`;
<?php
shell_exec("rm -rf");
<?php
@exec("pwd 2>&1", $output, $returnValue);
if ($returnValue === 0) {
    echo "success";
}
<?php
exec("pwd 2>&1", $output, $returnValue);
if ($returnValue === 0) {
    echo "success";
}
<?php
$e = array_filter(
    ["a" => 5, "b" => 12, "c" => null],
    function(?int $i) {
        return $_GET["a"];
    }
);
<?php
function fooFoo(int $a): void {}
fooFoo("string");
<?php declare(strict_types=1);
function fooFoo(int $a): void {}
fooFoo("string");
<?php
$s = substr(5, 4);
<?php declare(strict_types=1);
$s = substr(5, 4);
<?php declare(strict_types=1);
class A {
    public function foo() : void {
        $s = substr(5, 4);
    }
}
<?php
function fooFoo(int $a): void {}
/** @var mixed */
$a = "hello";
fooFoo($a);
<?php
function fooFoo(int $a): void {}
fooFoo(null);
<?php
function fooFoo(int $a): void {}
fooFoo();
<?php
function fooFoo(int $a): void {}
fooFoo(5, "dfd");
<?php
class A { }
new A("hello");
<?php
class A {}
class B extends A{}

function fooFoo(B $b): void {}
fooFoo(new A());
<?php
class A {}
class B extends A{}

/**
 * @param  B[]  $b
 * @return void
 */
function fooFoo(array $b) {}
fooFoo([new A()]);
<?php
/**
 * @return void
 */
function f($p, $p) {}
<?php
function f(int $p = false) {}
<?php
/**
 * @param  int $p
 * @return void
 */
function f($p = false) {}
<?php
function fooFoo(string &$v): void {}
fooFoo("a");
<?php
function fooFoo(array &$a): void {}
fooFoo([1, 2, 3]);
<?php
/**
 * @param callable $callback
 * @return void
 */
function route($callback) {
  if (!is_callable($callback)) {  }
  takes_int("string");
}

function takes_int(int $i) {}
<?php
array_map(
    "undefined_function",
    [1, 2, 3]
);
<?php
/**
 * @param array<string, int> $b
 */
function a($b): int
{
  return $b["a"];
}

a(["a" => "hello"]);
<?php
/**
 * @param array{a: int} $b
 */
function a($b): int
{
  return $b["a"];
}

a(["a" => "hello"]);
<?php
$a = rand(0, 1) ? function(): void {} : null;
$a();
<?php
$a = rand(0, 1) ? function(): void {} : 23515;
$a();
<?php
function foo(int $i) : bool {
  return true;
}

array_filter(["hello"], "foo");
<?php
function foo(int $i, string $s) : bool {
  return true;
}

array_filter([1, 2, 3], "foo");
<?php
function foo(int $i) : bool {
  return true;
}

array_map("foo", ["hello"]);
<?php
function foo(int $i, string $s) : bool {
  return true;
}

array_map("foo", [1, 2, 3]);
<?php
function foo() : bool {
  return true;
}

array_map("foo", [1, 2, 3]);
<?php
$a = var_export(["a"]);
<?php
function exploder(string $s) : array {
    return explode("", $s);
}
<?php
class A {}
class B {}
/**
 * @param iterable<mixed,A> $p
 */
function takesIterableOfA(iterable $p): void {}

takesIterableOfA([new B]); // should complain
<?php
class A {}
class B {}
/**
 * @param iterable<A> $p
 */
function takesIterableOfA(iterable $p): void {}

takesIterableOfA([new B]); // should complain
<?php
$q = rand(0,1) ? new stdClass : false;
strlen($q);
<?php
$arr = [2, 3, 4, 5];

$direct_closure_result = array_reduce(
    $arr,
    function (int $carry) : int {
        return 5;
    },
    1
);
<?php
$arr = [2, 3, 4, 5];

$direct_closure_result = array_reduce(
    $arr,
    function (int $carry, stdClass $item) {
        return $_GET["boo"];
    },
    1
);
<?php
$arr = [2, 3, 4, 5];

$direct_closure_result = array_reduce(
    $arr,
    function (stdClass $carry, int $item) {
        return $_GET["boo"];
    },
    1
);
<?php
$arr = [2, 3, 4, 5];

$direct_closure_result = array_reduce(
    $arr,
    function (int $carry, int $item) : stdClass {
        return new stdClass;
    },
    1
);
<?php
function expectsInt(int $a) : void {}

/**
 * @param array<mixed, array{item:int}> $list
 */
function test(array $list) : void
{
    while (!empty($list)) {
        $tmp = array_pop($list);
        if ($tmp === null) {}
    }
}
<?php
$d = array_filter(["a" => 5, "b" => 12, "c" => null]);
$e = array_filter(
    ["a" => 5, "b" => 12, "c" => null],
    function(?int $i): bool {
        return true;
    }
);
<?php
$f = array_filter(["a" => 5, "b" => 12, "c" => null], function(?int $val, string $key): bool {
    return true;
}, ARRAY_FILTER_USE_BOTH);
$g = array_filter(["a" => 5, "b" => 12, "c" => null], function(string $val): bool {
    return true;
}, ARRAY_FILTER_USE_KEY);

$bar = "bar";

$foo = [
    $bar => function (): string {
        return "baz";
    },
];

$foo = array_filter(
    $foo,
    function (string $key): bool {
        return $key === "bar";
    },
    ARRAY_FILTER_USE_KEY
);
<?php
class A {
    /**
     * @return array<int, self|null>
     */
    public function getRows() : array {
        return [new self, null];
    }

    public function filter() : void {
        $arr = array_filter(
            static::getRows(),
            function (self $row) : bool {
                return is_a($row, static::class);
            }
        );
    }
}
<?php
class A {}

/** @param array<A> $a */
function fooFoo(array $a = []): void {

}
<?php
$a = abs(-5);
$b = abs(-7.5);
$c = $_GET["c"];
$c = is_numeric($c) ? abs($c) : null;
<?php
/**
 * @param  int|false $p
 * @return void
 */
function f($p = false) {}
<?php
function fooFoo(string &$v): void {}
fooFoo($a);
<?php
$arr = [];
function fooFoo(array &$v): void {}
$function = "fooFoo";
$function($arr);
if ($arr) {}
<?php
class A {
    /** @var string */
    public $foo = "hello";
}

$a = new A();

function fooFoo(string &$v): void {}

fooFoo($a->foo);
<?php
namespace A;

/** @return void */
function f(int $p) {}
f(5);
<?php
namespace {
    /** @return void */
    function foo() { }
}
namespace A\B\C {
    foo();
}
<?php
namespace Aye {
    /** @return void */
    function foo() { }
}
namespace Bee {
    use Aye as A;

    A\foo();
}
<?php
$a = array_keys(["a" => 1, "b" => 2]);
<?php
/** @var array */
$b = ["a" => 5];
$a = array_keys($b);
<?php
$b = array_values(["a" => 1, "b" => 2]);
<?php
$c = array_combine(["a", "b", "c"], [1, 2, 3]);
<?php
$d = array_merge(["a", "b", "c"], [1, 2, 3]);
<?php
$d = array_reverse(["a", "b", 1]);
<?php
$d = array_reverse(["a", "b", 1], true);
<?php
$d = array_diff(["a" => 5, "b" => 12], [5]);
<?php
/** @var mixed */
$b = ["a" => 5, "c" => 6];
$a = array_pop($b);
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if ($a) {
    $b = array_pop($a);
}
$c = array_pop($a);
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (isset($a["a"])) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (count($a)) {
    $b = array_pop($a);
}
<?php
/** @var ArrayObject<int, int> */
$a = [];
$b = 5;
if (count($a)) {}
<?php
function foo(string $s) : void {
    $a = json_decode($s) ?: [];
    if (count($a)) {}
    if (!count($a)) {}
}
<?php
$a = [];

if (rand(0, 1)) {
    $a["a"] = 5;
}

if (count($a)) {}
if (!count($a)) {}
<?php
/** @var string */
$s = "hello";
$segments = explode(".", $s);
if (count($segments) === 1) {}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (count($a) === 1) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (count($a) == 1) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (count($a) > 0) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (count($a) >= 1) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (1 === count($a)) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (1 == count($a)) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (0 < count($a)) {
    $b = array_pop($a);
}
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$b = 5;
if (1 <= count($a)) {
    $b = array_pop($a);
}
<?php
class A {}
class B extends A {
    /** @var array<int, string> */
    public $arr = [];
}

/** @var array<A> */
$replacement_stmts = [];

if (!$replacement_stmts
    || !$replacement_stmts[0] instanceof B
    || count($replacement_stmts[0]->arr) > 1
) {
    return null;
}

$b = $replacement_stmts[0]->arr;
<?php
/** @var array<string, int> */
$a = ["a" => 5, "b" => 6, "c" => 7];
$a["foo"] = 10;
$b = array_pop($a);
<?php
/** @var array */
$a = ["a" => 5, "b" => 6, "c" => 7];
$a[] = "hello";
$b = array_pop($a);
<?php
uasort(
  $manifest,
  function ($a, $b) {
    return strcmp($a["parent"],$b["parent"]);
  }
);
<?php
/**
 * @param callable $callback
 * @return void
 */
function route($callback) {
  if (!is_callable($callback)) {  }
  $a = preg_match("", "", $b);
  if ($b[0]) {}
}
<?php
function foo(string $s): string {
    $s = preg_replace("/hello/", "", $s);
    if ($s === null) {
        return "hello";
    }
    return $s;
}
function bar(string $s): string {
    $s = preg_replace("/hello/", "", $s);
    return $s;
}
function bat(string $s): ?string {
    $s = preg_replace("/hello/", "", $s);
    return $s;
}
<?php
function takesString(string $str): void {}

$foo = null;
$a = ["$foo" => "bar"];
extract($a);
takesString($foo);
<?php
/**
 * @param array<string, int> $a
 * @return array<string, int>
 */
function foo($a)
{
    return $a;
}

$a1 = ["hi" => 3];
$a2 = ["bye" => 5];
$a3 = array_merge($a1, $a2);

foo($a3);
<?php
$vars = ["x" => "a", "y" => "b"];
$c = array_rand($vars);
$d = $vars[$c];
$more_vars = ["a", "b"];
$e = array_rand($more_vars);
<?php
$vars = ["x" => "a", "y" => "b"];
$b = 3;
$c = array_rand($vars, 1);
$d = array_rand($vars, 2);
$e = array_rand($vars, 3);
$f = array_rand($vars, $b);
<?php
function expect_string(string $x): void {
    echo $x;
}

function test(): void {
    foreach (array_keys([]) as $key) {
        expect_string($key);
    }
}
<?php
function test(): array {
    return compact(["val"]);
}
<?php
/**
 * @param array<string, string> $b
 */
function a($b): string
{
  return $b["a"];
}

a(["a" => "hello"]);
<?php
/**
 * @param array{a: string} $b
 */
function a($b): string
{
  return $b["a"];
}

a(["a" => "hello"]);
<?php
$a = getenv();
$b = getenv("some_key");
<?php
function expectsInt(int $a) : void {}

/**
 * @param array<mixed, array{item:int}> $list
 */
function test(array $list) : void
{
    while (!empty($list)) {
        $tmp = array_pop($list);
        expectsInt($tmp["item"]);
    }
}
<?php
$a = array_filter(
    [1, "hello", 6, "goodbye"],
    function ($s): bool {
        return is_string($s);
    }
);
<?php
$bar = "bar";

$foo = [
    $bar => function (): string {
        return "baz";
    },
];

$foo = array_filter(
    $foo,
    function (string $key): bool {
        return $key === "bar";
    },
    ARRAY_FILTER_USE_KEY
);
<?php
/** @param string[] $arr */
function foo(array $arr): string {
    return current($arr);
}
/** @param string[] $arr */
function bar(array $arr): string {
    $a = current($arr);
    if ($a === false) {
        return "hello";
    }
    return $a;
}
/**
 * @param string[] $arr
 * @return string|false
 */
function bat(array $arr) {
    return current($arr);
}
<?php
function foo(string $s): string {
    return file_get_contents($s);
}
function bar(string $s): string {
    $a = file_get_contents($s);
    if ($a === false) {
        return "hello";
    }
    return $a;
}
/**
 * @return string|false
 */
function bat(string $s) {
    return file_get_contents($s);
}
<?php
$foo = array_sum([]) + 1;
<?php
/**
 * @psalm-return array{key1:int,key2:int}
 */
function foo(): array {
  $v = ["key1"=> 1, "key2"=> "2"];
  $r = array_map("intval", $v);
  return $r;
}
<?php
/**
 * @psalm-return array{key1:int,key2:int}
 */
function foo(): array {
  $v = ["key1"=> 1, "key2"=> "2"];
  $r = array_map(function($i) : int { return intval($i);}, $v);
  return $r;
}
<?php
function fooFoo(int $i) : bool {
  return true;
}

class A {
    public static function barBar(int $i) : bool {
        return true;
    }
}

array_filter([1, 2, 3], "fooFoo");
array_filter([1, 2, 3], "foofoo");
array_filter([1, 2, 3], "FOOFOO");
array_filter([1, 2, 3], "A::barBar");
array_filter([1, 2, 3], "A::BARBAR");
array_filter([1, 2, 3], "A::barbar");
<?php
array_filter([1, 2, 3], "A::bar");
<?php
class A {
    public static function bar(int $i) : bool {
        return true;
    }
}

array_filter([1, 2, 3], "A::foo");
<?php
class A {
    public static function b() : void {}
}

function c() : void {}

["a", "b"]();
"A::b"();
"c"();
<?php
$arr = ["a", "b"];
array_map("mapdef", $arr, array_fill(0, count($arr), 1));
function mapdef(string $_a, int $_b = 0): string {
    return "a";
}
<?php
function foo(string $a, string $b) : int {
    $aTime = strtotime($a);
    $bTime = strtotime($b);

    return $aTime - $bTime;
}
<?php
function hasZeroByteOffset(string $s) : bool {
    return strpos($s, 0) !== false;
}
<?php
$a = function() use ($argv) : void {};
<?php
$urls = array_map("implode", [["a", "b"]]);
<?php
$a = var_export(["a"], true);
<?php
$a = ["one" => 1, "two" => 3];
$b = key($a);
$c = $a[$b];
<?php
/** @return array<int, string> */
function exploder(string $s) : array {
    return explode(" ", $s);
}
<?php
if (class_exists(Foo::class)) {}
<?php
function foo(string $s) : void {
    if (class_exists($s)) {
        new $s();
    }
}
<?php
$arr = ["one", "two", "three"];
$n = next($arr);
<?php
/**
 * @return Generator<stdClass>
 */
function generator(): Generator {
    yield new stdClass;
}

/**
 * @return array<stdClass>
 */
function foo(callable $filter): array {
    return array_filter(iterator_to_array(generator()), $filter);
}
<?php
function makeMixedArray(): array { return []; }
/** @return array<array<int,bool>> */
function makeGenericArray(): array { return []; }
/** @return array<array{0:string}> */
function makeShapeArray(): array { return []; }
/** @return array<array{0:string}|int> */
function makeUnionArray(): array { return []; }
$a = array_column([[1], [2], [3]], 0);
$b = array_column([["a" => 1], ["a" => 2], ["a" => 3]], "a");
$c = array_column([["k" => "a", "v" => 1], ["k" => "b", "v" => 2]], "v", "k");
$d = array_column([], 0);
$e = array_column(makeMixedArray(), 0);
$f = array_column(makeGenericArray(), 0);
$g = array_column(makeShapeArray(), 0);
$h = array_column(makeUnionArray(), 0);

<?php
/**
 * @param string|false $str
 * @param array<string, string> $replace_pairs
 * @return string
 */
function strtr_wrapper($str, array $replace_pairs) {
    /** @psalm-suppress PossiblyFalseArgument */
    return strtr($str, $replace_pairs);
}
<?php
$foo = [
    [1, 2, 3],
    [1, 2],
];

$bar = array_intersect(... $foo);
<?php
$arr = [2, 3, 4, 5];

function multiply (int $carry, int $item) : int {
    return $carry * $item;
}

$f2 = function (int $carry, int $item) : int {
    return $carry * $item;
};

$direct_closure_result = array_reduce(
    $arr,
    function (int $carry, int $item) : int {
        return $carry * $item;
    },
    1
);

$passed_closure_result = array_reduce(
    $arr,
    $f2,
    1
);

$function_call_result = array_reduce(
    $arr,
    "multiply",
    1
);
<?php
$arr = [2, 3, 4, 5];

$direct_closure_result = array_reduce(
    $arr,
    function (int $carry, int $item) {
        return $_GET["boo"];
    },
    1
);
<?php
function getString() : string {
    return rand(0, 1) ? "===" : "==";
}

$a = version_compare("5.0.0", "7.0.0");
$b = version_compare("5.0.0", "7.0.0", "==");
$c = version_compare("5.0.0", "7.0.0", getString());

<?php
$a = gettimeofday(true) - gettimeofday(true);
$b = gettimeofday();
$c = gettimeofday(false);
<?php
function foo(string $s) : string {
    return parse_url($s)["host"] ?? "";
}

function bar(string $s) : string {
    $parsed = parse_url($s);

    return $parsed["host"];
}

function baz(string $s) : string {
    $parsed = parse_url($s);

    return $parsed["host"];
}

function bag(string $s) : string {
    $parsed = parse_url($s);

    if (is_string($parsed["host"] ?? false)) {
        return $parsed["host"];
    }

    return "";
}


function hereisanotherone(string $s) : string {
    $parsed = parse_url($s);

    if (isset($parsed["host"]) && is_string($parsed["host"])) {
        return $parsed["host"];
    }

    return "";
}

function hereisthelastone(string $s) : string {
    $parsed = parse_url($s);

    if (isset($parsed["host"]) && is_string($parsed["host"])) {
        return $parsed["host"];
    }

    return "";
}

function portisint(string $s) : int {
    $parsed = parse_url($s);

    if (isset($parsed["port"])) {
        return $parsed["port"];
    }

    return 80;
}

function portismaybeint(string $s) : ? int {
    $parsed = parse_url($s);

    return $parsed["port"] ?? null;
}

$porta = parse_url("", PHP_URL_PORT);
$porte = parse_url("localhost:443", PHP_URL_PORT);
<?php
function foo(string $s) : string {
    return parse_url($s, PHP_URL_HOST) ?? "";
}

function bar(string $s) : string {
    return parse_url($s, PHP_URL_HOST);
}

function bag(string $s) : string {
    $host = parse_url($s, PHP_URL_HOST);

    if (is_string($host)) {
        return $host;
    }

    return "";
}
<?php
function mightLeave() : string {
    if (rand(0, 1)) {
        trigger_error("bad", E_USER_ERROR);
    } else {
        return "here";
    }
}
<?php
class A {}
class B extends A {}

$b = get_parent_class(new A());
if ($b === false) {}
$c = new $b();
<?php
$a = [1, 2, 3];
$c = $a;
$b = ["a", "b", "c"];
array_splice($a, -1, 1, $b);
$d = [1, 2, 3];
array_splice($d, -1, 1);
<?php
$d = [["red"], ["green"], ["blue"]];
array_splice($d, -1, 1, "foo");
<?php
$a = ["a" => 3, "b" => 4];
ksort($a);
acceptsAShape($a);

/**
 * @param array{a:int,b:int} $a
 */
function acceptsAShape(array $a): void {}
<?php
$a = @file_get_contents("foo");
<?php
$a = ["a" => 1, "b" => 2, "c" => 3];
$b = array_slice($a, 1, 2, true);
$c = array_slice($a, 1, 2, false);
$d = array_slice($a, 1, 2);
<?php
function foo(string $s) : void {
    echo $s;
}

foo(print_r(1, true));
<?php
$a = microtime(true);
$b = microtime();
/** @psalm-suppress InvalidScalarArgument */
$c = microtime(1);
$d = microtime(false);
<?php
function filterInt(string $s) : int {
    $filtered = filter_var($s, FILTER_VALIDATE_INT);
    if ($filtered === false) {
        return 0;
    }
    return $filtered;
}
function filterNullableInt(string $s) : ?int {
    return filter_var($s, FILTER_VALIDATE_INT, ["default" => null]);
}
function filterIntWithDefault(string $s) : int {
    return filter_var($s, FILTER_VALIDATE_INT, ["default" => 5]);
}
function filterBool(string $s) : bool {
    return filter_var($s, FILTER_VALIDATE_BOOLEAN);
}
function filterNullableBool(string $s) : ?bool {
    return filter_var($s, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
}
function filterNullableBoolWithFlagsArray(string $s) : ?bool {
    return filter_var($s, FILTER_VALIDATE_BOOLEAN, ["flags" => FILTER_NULL_ON_FAILURE]);
}
function filterFloat(string $s) : float {
    $filtered = filter_var($s, FILTER_VALIDATE_FLOAT);
    if ($filtered === false) {
        return 0.0;
    }
    return $filtered;
}
function filterFloatWithDefault(string $s) : float {
    return filter_var($s, FILTER_VALIDATE_FLOAT, ["default" => 5.0]);
}
<?php
class C2 implements A { }
<?php
interface A { }

function fooFoo(A $a): void {
    if ($a->bar) {

    }
}
<?php
interface A { }

function fooFoo(A $a): void {
    $a->bar = 5;
}
<?php
interface A {
    public function fooFoo();
}

class B implements A { }
<?php
interface A {
    public function fooFoo(int $a): void;
}

class B implements A {
    public function fooFoo(string $a): void {

    }
}
<?php
interface A {
    public function fooFoo(int $a, int $b): void;
}

trait T {
    public function fooFoo(int $a): void {
    }
}

class B implements A {
    use T;
}
<?php
interface A {
    public function fooFoo(int $a, int $b): void;
}

trait T {
    public function fooFoo(int $a, int $b): void {
    }
}

class B implements A {
    use T;

    public function fooFoo(int $a): void {
    }
}
<?php
interface I1 {
  public function foo(): string;
}
interface I2 {
  public function foo(): int;
}
class A implements I1, I2 {
  public function foo(): string {
    return "hello";
  }
}
<?php
interface I1 {
  /** @return string */
  public function foo();
}
interface I2 {
  /** @return int */
  public function foo();
}
class A implements I1, I2 {
  /** @return string */
  public function foo() {
    return "hello";
  }
}
<?php
interface I {
    public function foo();
}

abstract class A implements I {
    public function bar(): void {
        $this->foo2();
    }
}
<?php
interface I {
    public function fnc();
}

abstract class A implements I {}

class B extends A {}
<?php
interface A {}
interface B extends A {}

function foo(A $a): B {
    return $a;
}
<?php
interface A {}
interface B {}

class C implements A, B {}

function foo(A $i): B {
    if ($i instanceof B) {
        return $i;
    }

    return $i;
}

foo(new C);
<?php
/** @deprecated */
interface Container {}

class A implements Container {}
<?php
interface I1 {
  /** @return string */
  public function foo();
}
interface I2 {
  /** @return int */
  public function foo();
}
class A implements I1, I2 {
  public function foo() {
    return "hello";
  }
}
<?php
interface myInterface{}
new myInterface();
<?php
interface A
{
    /**
     * @return string
     */
    public function fooFoo();
}

interface B
{
    /**
     * @return string
     */
    public function barBar();
}

interface C extends A, B
{
    /**
     * @return string
     */
    public function baz();
}

class D implements C
{
    /**
     * @return string
     */
    public function fooFoo()
    {
        return "hello";
    }

    /**
     * @return string
     */
    public function barBar()
    {
        return "goodbye";
    }

    /**
     * @return string
     */
    public function baz()
    {
        return "hello again";
    }
}

$cee = (new D())->baz();
$dee = (new D())->fooFoo();
<?php
interface A {}
class B implements A {}

/**
 * @param  A      $a
 * @return void
 */
function qux(A $a) { }

qux(new B());
<?php
interface A {}
interface B extends A {}
class C implements B {}

/**
 * @param  A      $a
 * @return void
 */
function qux(A $a) {
}

qux(new C());
<?php
interface A
{
    /**
     * @return string
     */
    public function fooFoo();
}

interface B extends A
{
    public function barBar();
}

/** @return void */
function mux(B $b) {
    $b->fooFoo();
}
<?php
interface A {
    public function fooFoo(int $a): void;
}

class B implements A {
    public function fooFoo(int $a): void {

    }
}
<?php
interface MyInterface {
    public function fooFoo(int $a): void;
}

class B {
    public function fooFoo(int $a): void {

    }
}

class C extends B implements MyInterface { }
<?php
interface A {
    public function fooFoo(int $a, int $b): void;
}

trait T {
    public function fooFoo(int $a, int $b): void {
    }
}

class B implements A {
    use T;
}
<?php
// fails in PHP, whatcha gonna do
$c = new C;

class A { }

interface B { }

class C extends A implements B { }
<?php
interface A { }
interface B {
    function foo();
}
function bar(A $a): void {
    if ($a instanceof B) {
        $a->foo();
    }
}
<?php
interface I {
    public function fnc();
}

abstract class A implements I {}
<?php
interface I {
    public function foo();
}

abstract class A implements I {
    public function bar(): void {
        $this->foo();
    }
}
<?php
namespace Bat;

interface I  {
  public function foo();
  public function bar();
}
abstract class A implements I {
  public function foo() {
    return "hello";
  }
}
class B extends A {
  public function bar() {
    return "goodbye";
  }
}
<?php
interface I1 {
    const A = 5;
    const B = "two";
    const C = 3.0;
}

interface I2 extends I1 {
    const D = 5;
    const E = "two";
}

class A implements I2 {
    /** @var int */
    public $foo = I1::A;

    /** @var string */
    public $bar = self::B;

    /** @var float */
    public $bar2 = I2::C;

    /** @var int */
    public $foo2 = I2::D;

    /** @var string */
    public $bar3 = self::E;
}
<?php
interface A {}
interface B extends A {}

function foo(B $a): A {
    return $a;
}
<?php
interface A {}
interface B {}

class C implements A, B {}

function takesB(B $b): void {}

function foo(A $i): A {
    if ($i instanceof B) {
        takesB($i);
        return $i;
    }
    return $i;
}

foo(new C);
<?php
interface A {}
interface B {}

class C implements A, B {}

function foo(A $i): B {
    if ($i instanceof B) {
        return $i;
    }
    throw new \Exception("bad");
}

foo(new C);
<?php
class SomeIterator extends IteratorIterator {}
<?php
interface I {
    /**
     * @return int
     */
    public function check();
}

class C implements I
{
    /**
     * @psalm-suppress ImplementedReturnTypeMismatch
     */
    public function check(): bool
    {
        return false;
    }
}
<?php
class A {}
interface I {
  /** @return A */
  public function foo();
}

class B extends A implements I {
  /** @return static */
  public function foo() {
    return $this;
  }
}
<?php
class A {}
interface I {
  /** @return A */
  public function foo();
}

class B extends A implements I {
  /** @return $this */
  public function foo() {
    return $this;
  }
}
<?php
interface I1 {
  /** @return string */
  public function foo();
}
interface I2 {
  /** @return string */
  public function bar();
}
class A implements I1, I2 {
  public function foo() {
    return "hello";
  }
  public function bar() {
    return "goodbye";
  }
}
<?php
interface A {
    /** @return string|null */
    public function blah();
}

class B implements A {
    public function blah() {
        return rand(0, 10) === 4 ? "blah" : null;
    }
}

$blah = (new B())->blah();
<?php
interface Collection extends Countable, IteratorAggregate, ArrayAccess {}

function takesCollection(Collection $c): void {
    takesIterable($c);
}

function takesIterable(iterable $i): void {}
<?php
interface A {}
class B extends Exception {}

function foo(Throwable $e): void {
    if ($e instanceof A || $e instanceof B) {
        return;
    }

    return;
}

class C extends Exception {}
interface D {}

function bar(Throwable $e): void {
    if ($e instanceof C || $e instanceof D) {
        return;
    }

    return;
}
<?php
interface I2 extends Iterator {}

class DedupeIterator extends FilterIterator {
    public function __construct(I2 $i) {
        parent::__construct($i);
    }

    public function accept() : bool {
        return true;
    }
}
<?php
interface I1 {}
interface I2 {}
class C implements I1,I2 {}

function f(I1 $a, I2 $b): bool {
    return $a === $b;
}

/**
 * @param  array<I1> $a
 * @param  array<I2> $b
 */
function g(array $a, array $b): bool {
    return $a === $b;
}

$o = new C;
f($o, $o);
<?php
class A {
    /** @var ?string */
    public $a;
}

class B extends A implements I {}

interface I {}

function takeI(I $i) : void {
    if ($i instanceof A) {
        echo $i->a;
        $i->a = "hello";
    }
}
<?php
class A {
    /** @var ?string */
    private $a;
}

/** @psalm-override-property-visibility */
interface I {}

function takeI(I $i) : void {
    if ($i instanceof A) {
        echo $i->a;
        $i->a = "hello";
    }
}
<?php
class A {
    private function foo() : void {}
}

/** @psalm-override-method-visibility */
interface I {}

function takeI(I $i) : void {
    if ($i instanceof A) {
        $i->foo();
    }
}
<?php
interface I {
    /** @param string[] $f */
    function foo(array $f) : void {}
}

class C implements I {
    /** @var string[] */
    private $f = [];

    /**
     * {@inheritdoc}
     */
    public function foo(array $f) : void {
        $this->f = $f;
    }
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         */
        public static function barBar(): void {
        }
    }
}

namespace B {
    class Bat {
        public function batBat() {
            \A\Foo::barBar();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo {
        public static function barBar(): void {
        }
    }
}

namespace B {
    class Bat {
        public function batBat() {
            \A\Foo::barBar();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo { }
}

namespace B {
    class Bat {
        public function batBat() {
            $a = new \A\Foo();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo { }
}

namespace B {
    class Bar extends \A\Foo {}
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         * @var ?int
         */
        public $foo;
    }
}

namespace B {
    class Bat {
        public function batBat() : void {
            echo (new \A\Foo)->foo;
        }
    }
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         * @var ?int
         */
        public $foo;
    }
}
namespace B {
    class Bat {
        public function batBat() : void {
            $a = new \A\Foo;
            $a->foo = 5;
        }
    }
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         */
        public static function barBar(): void {
        }
    }
}

namespace A\B {
    class Bat {
        public function batBat() : void {
            \A\Foo::barBar();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo {
        public static function barBar(): void {
        }
    }
}

namespace A\B {
    class Bat {
        public function batBat() : void {
            \A\Foo::barBar();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo extends \B\Foo {
        public function __construct() {
            parent::__construct();
        }
        public static function barBar(): void {
        }
    }
}

namespace B {
    class Foo {
        public function __construct() {
            static::barBar();
        }

        public static function barBar(): void {
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo { }
}

namespace A\B {
    class Bat {
        public function batBat() : void {
            $a = new \A\Foo();
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    class Foo { }
}

namespace A\B {
    class Bar extends \A\Foo {}
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         * @var ?int
         */
        public $foo;
    }
}

namespace A\B {
    class Bat {
        public function batBat() : void {
            echo (new \A\Foo)->foo;
        }
    }
}
<?php
namespace A {
    class Foo {
        /**
         * @internal
         * @var ?int
         */
        public $foo;
    }
}
namespace A\B {
    class Bat {
        public function batBat() : void {
            $a = new \A\Foo;
            $a->foo = 5;
        }
    }
}
<?php
namespace A {
    /**
     * @internal
     */
    trait T {
        public static function barBar(): void {
        }
    }

    class Foo {
        use T;

    }
}

namespace B {
    class Bat {
        public function batBat() : void {
            \A\Foo::barBar();
        }
    }
}
<?php
$array = [];

if (isset($array[$a = 5])) {
    print "hello";
}

print $a;
<?php
if (rand(0, 4) > 2) {
    $arr = [5 => [3 => "hello"]];
}

if (isset($arr[$a = 5][$b = 3])) {

}

echo $a;
echo $b;
<?php
$a = isset($b) ? $b : null;
<?php
$a = $b ?? null;
<?php
$b = rand(0, 10) > 5 ? "hello" : null;
$a = $b ?? null;
<?php
if (!isset($foo["a"])) {
    $foo["a"] = "hello";
}
<?php
/** @return void */
function takesString(string $str) {}

$bar = rand(0, 1) ? ["foo" => "bar"] : false;

if (isset($bar["foo"])) {
    takesString($bar["foo"]);
}
<?php
$foo["a"] = $foo["a"] ?? "hello";
<?php
function testarray(array $data): void {
    foreach ($data as $item) {
        if (isset($item["a"]) && isset($item["b"]["c"])) {
            echo "Found\n";
        }
    }
}
<?php
$foo = ["a", "b", "c"];
foreach ($foo as $bar) {}
unset($foo, $bar);

function foo(): void {
    $foo = ["a", "b", "c"];
    foreach ($foo as $bar) {}
    unset($foo, $bar);
}
<?php
$arr = [
    "profile" => [
        "foo" => "bar",
    ],
    "groups" => [
        "foo" => "bar",
        "hide"  => rand() % 2 > 0,
    ],
];

foreach ($arr as $item) {
    if (!isset($item["hide"]) || !$item["hide"]) {}
}
<?php
class A {
    /** @var ?int */
    public $id;
}

function takesA(?A $a): A {
    if (isset($a->id)) {
        return $a;
    }

    return new A();
}
<?php
$arr = [[1, 2, 3], null, [1, 2, 3], null];
$b = 2;
$c = 0;
if (isset($arr[$b][$c])) {
    echo $arr[$b][$c];
}
<?php
/**
 * @param  array<int, int> $arr
 */
function foo(array $arr) : int {
    $b = rand(0, 3);
    if (!isset($arr[$b])) {
        throw new \Exception("bad");
    }
    return $arr[$b];
}
<?php
/** @param array<int, string> $arr */
function foo(array $arr) : string {
    if (!isset($arr[0])) {
        $arr[0] = "hello";
    }

    return $arr[0];
}
<?php
/** @param array<int, string> $arr */
function foo(array $arr) : string {
    $b = 5;

    if (!isset($arr[$b])) {
        $arr[$b] = "hello";
    }

    return $arr[$b];
}
<?php
if (isset($foo["bar[]"])) {}
<?php
class A {
    /** @var ?B */
    public $b;
}
class B {}

/**
 * @param A[] $arr
 */
function takesAList(array $arr) : B {
    if (isset($arr[1]->b)) {
        return $arr[1]->b;
    }
    throw new \Exception("bad");
}
<?php
$arr = [1, 1, 1, 1, 2, 5, 3, 2];
$cumulative = [];

foreach ($arr as $val) {
    if (isset($cumulative[$val])) {
        $cumulative[$val] = $cumulative[$val] + 1;
    } else {
        $cumulative[$val] = 1;
    }
}
<?php
$arr = [1, 1, 1, 1, 2, 5, 3, 2];
$cumulative = [];

foreach ($arr as $val) {
    if (isset($cumulative[$val])) {
        $cumulative[$val] = array_merge($cumulative[$val], [$val]);
    } else {
        $cumulative[$val] = [$val];
    }
}

foreach ($cumulative as $arr) {
    foreach ($arr as $val) {
        takesInt($val);
    }
}

function takesInt(int $i) : void {}
<?php
/**
 * @param array{bar?: int, foo: int|string} $arr
 * @return array{bar: int, foo: string}|null
 */
function foo(array $arr) : ?array {
    if (!isset($arr["bar"])) {
        return null;
    }

    if (is_int($arr["foo"])) {
        return null;
    }

    return $arr;
}
<?php
$arr = [];

foreach ([1, 2, 3] as $foo) {
    if (!isset($arr["bar"])) {
        $arr["bar"] = 0;
    }

    echo $arr["bar"];
}
<?php
$arr = [];

foreach ([1, 2, 3] as $foo) {
    if (!isset($arr["foo"])) {
        $arr["foo"] = 0;
    }

    if (!isset($arr["bar"])) {
        $arr["bar"] = 0;
    }

    echo $arr["bar"];
}
<?php
class Example {
    const FOO = "foo";
    /**
     * @param array{bar:string} $params
     */
    public function test(array $params) : bool {
        if (isset($params[self::FOO])) {
            return true;
        }

        if (isset($params["bat"])) {
            return true;
        }

        return false;
    }
}
<?php
/** @param array<string, array<int, string>> $arr */
function foo(array $arr, string $k) : void {
    if (!isset($arr[$k])) {
        return;
    }

    if ($arr[$k][0]) {}
}
<?php
$a = isset($_GET["a"]) ? $_GET["a"] : "";
if ($a) {}
<?php
if (isset($_GET["b"]) && is_string($_GET["b"])) {
    echo $_GET["b"];
}
<?php
$arr = [];
while (rand(0, 1)) {
    if (rand(0, 1)) {
        if (!isset($arr["a"]["b"])) {
            $arr["a"]["b"] = "foo";
        }
        echo $arr["a"]["b"];
    } else {
        $arr["c"] = "foo";
    }
}
<?php
function foo() : void {
    while (rand(0, 1)) {
        if (!isset($foo)) {
            $foo = 1;
        }
    }
}
<?php
function foo(ArrayAccess $arr) : void {
    $a = isset($arr["a"]) ? $arr["a"] : "a";
    takesInt($a);
}
function takesInt(int $i) : void {}
<?php
/** @var array */
$array = [];
function sameString(string $string): string {
    return $string;
}

if (isset($array[sameString("key1")]) || isset($array[sameString("key2")])) {
    throw new \InvalidArgumentException();
}

if (!isset($array[sameString("key3")]) || !isset($array[sameString("key4")])) {
    throw new \InvalidArgumentException();
}
<?php
$foo = [
    "one" => rand(0,1) ? new DateTime : null,
    "two" => rand(0,1) ? new DateTime : null,
    "three" => new DateTime
];

if (!(isset($foo["one"]) || isset($foo["two"]))) {
    exit;
}

echo $foo["one"]->format("Y");
<?php
$foo = [
    "one" => rand(0,1) ? new DateTime : null,
    "two" => rand(0,1) ? new DateTime : null,
    "three" => new DateTime
];

isset($foo["one"]) || isset($foo["two"]);

echo $foo["one"]->format("Y");
<?php
$foo = [
    "one" => rand(0,1) ? new DateTime : null,
    "two" => rand(0,1) ? new DateTime : null,
    "three" => new DateTime
];

assert(isset($foo["one"]) || isset($foo["two"]));

echo $foo["one"]->format("Y");
<?php
/**
 * @param string|array $a
 */
function _renderInput($a) : array {
    if (isset($a["foo"], $a["bar"])) {
        return $a;
    }

    return [];
}
<?php
/**
 * @param string|int $val
 * @param string|array $text
 * @param array $data
 */
function _renderInput($val, $text, $data) : array {
    if (is_int($val) && isset($text["foo"], $text["bar"])) {
        $radio = $text;
    } else {
        $radio = ["value" => $val, "text" => $text];
    }
    return $radio;
}
<?php
/**
 * @param mixed $arr
 */
function foo($arr) : void {
    if (empty($arr)) {
        return;
    }

    if (isset($arr["a"]) && isset($arr["b"])) {}
}
<?php
/**
 * @param string[] $columns
 * @param mixed[]  $options
 */
function foo(array $columns, array $options) : void {
    $arr = $options["b"];

    foreach ($arr as $a) {
        if (isset($columns[$a]["c"])) {
            return;
        }
    }
}
<?php
class A {}
$a = isset(A::foo()[0]);
<?php
$arr = [[1, 2, 3], null, [1, 2, 3], null];
$b = 2;
$c = 0;
if (isset($arr[$b][$c])) {
    $b = 1;
    echo $arr[$b][$c];
}
<?php
class Example {
    const FOO = "foo";
    public function test() : bool {
        $params = ["bar" => "bat"];

        if (isset($params[self::FOO])) {
            return true;
        }

        return false;
    }
}
<?php
class A {
    /**
     * @psalm-suppress UndefinedClass
     * @psalm-suppress MixedMethodCall
     * @psalm-suppress MissingReturnType
     */
    public function b() {
        B::fooFoo()->barBar()->bat()->baz()->bam()->bas()->bee()->bet()->bes()->bis();
    }
}
<?php
class A {
    public function b(): void {
        /**
         * @psalm-suppress UndefinedClass
         */
        new B();
    }
}
<?php
/**
 * @psalm-suppress UndefinedClass
 */
new B();
<?php
fooFoo();
<?php
class A {
    public function b() {
        /**
         * @psalm-suppress UndefinedClass
         */
        new B();
        new C();
    }
}
<?php
/**
 * @psalm-suppress UndefinedClass
 */
new B();
new C();
<?php
class A {
    /** @var int */
    public $a = 0;

    /** @var string */
    public $b = "";

    public function fooFoo(): string
    {
        list($this->a, $this->b) = ["a", "b"];

        return $this->a;
    }
}
<?php
list($a, $b) = ["a", "b"];
<?php
list($a, $b) = ["a", 2];
<?php
$bar = ["a", 2];
list($a, $b) = $bar;
<?php
class A {
    /** @var string */
    public $a = "";

    /** @var string */
    public $b = "";

    public function fooFoo(): string
    {
        list($this->a, $this->b) = ["a", "b"];

        return $this->a;
    }
}
<?php
/** @psalm-suppress MissingReturnType */
function getMixed() {}

/** @psalm-suppress MixedAssignment */
list($a, list($b, $c)) = getMixed();
<?php
do {
    if (rand(0, 1)) {
        break;
    }
    $worked = true;
}
while (rand(0,1));

echo $worked;
<?php
do {
    if (rand(0, 1)) {
        if (rand(0, 1)) {
            $a = true;
        }

        break;
    }
    $a = true;
}
while (rand(0,1));

echo $a;
<?php
do {
    $array[] = "hello";
} while (rand(0, 1));

echo $array;
<?php
$worked = false;

do {
    $worked = true;
}
while (rand(0,100) === 10);
<?php
$a = false;

do {
    if (rand(0, 1)) {
        break;
    }
    if (rand(0, 1)) {
        $a = true;
        break;
    }
    $a = true;
}
while (rand(0,100) === 10);
<?php
$a = false;

do {
    if (rand(0, 1)) {
        if (rand(0, 1)) {
            $a = true;
        }

        break;
    }
    $a = true;
}
while (rand(0,1));
<?php
do {
    if (rand(0, 1)) {
        $worked = true;
        break;
    }
    $worked = true;
}
while (rand(0,100) === 10);
<?php
do {
    $result = (bool) rand(0,1);
} while (!$result);
<?php
/** @return void */
function foo(string $b) {}

do {
    if (null === ($a = rand(0, 1) ? "hello" : null)) {
        break;
    }

    foo($a);
}
while (rand(0,100) === 10);
<?php
class A {
    /** @var A|null */
    public $a;

    public function __construct() {
        $this->a = rand(0, 1) ? new A : null;
    }
}

function takesA(A $a): void {}

$a = new A();
do {
    takesA($a);
    $a = $a->a;
} while ($a);
<?php
class A {
    public function getParent(): ?A {
        return rand(0, 1) ? new A() : null;
    }
}

$a = new A();

do {
    $a = $a->getParent();
} while ($a);
<?php
do {
    $done = rand(0, 1) > 0;
} while (!$done);
<?php
class A
{
    /**
     * @var null|A
     */
    public $parent;

    public static function foo(A $a) : void
    {
        do {
            if ($a->parent === null) {
                throw new \Exception("bad");
            }

            $a = $a->parent;
        } while (rand(0,1));
    }
}
<?php
class A
{
    /**
     * @var null|A
     */
    public $parent;

    public static function foo(A $a) : void
    {
        if ($a->parent === null) {
            throw new \Exception("bad");
        }

        do {
            $a = $a->parent;
        } while ($a->parent && rand(0, 1));
    }
}
<?php
$value = null;
do {
    $count = rand(0, 1);
    $value = 6;
} while ($count);
<?php
$value = null;
do {
    if (rand(0, 1)) {
        break;
    }
    $count = rand(0, 1);
    $value = 6;
} while ($count);
<?php
function foo(?string &$i) : void {}
function bar(?string &$i) : void {}

$c = null;

do {
    if (!$c) {
        foo($c);
    } else {
        bar($c);
    }
} while (rand(0, 1));
<?php
class A {
    /** @return A|false */
    public function getParent() {
        return rand(0, 1) ? new A : false;
    }
}

$a = new A();

do {
    $a = $a->getParent();
} while ($a !== false);
<?php
do {
    if (rand(0, 1)) {
        continue;
    }
} while (rand(0, 1));
<?php
$foo = [];
do {
    if (isset($foo["bar"])) {}
    $foo["bar"] = "bat";
} while (rand(0, 1));
<?php
$i = 5;
do {} while (--$i > 0);
echo $i === 0;
<?php
for ($i = 0; $i < 4; $i++) {
    while (rand(0,10) === 5) {
        $array[] = "hello";
    }
}

echo $array;
<?php
for ($i = 0; $i < 4; $i++) {
  foreach ([1, 2, 3] as $i) {}
}
<?php
for (;;) {
    $a = "hello";
}

echo $a;
<?php
function test(): int {
  $x = 0;
  $y = 1;
  $z = 2;
  for ($i = 0; $i < 3; $i++) {
    $x = $y;
    $y = $z;
    $z = 5;
  }
  return $x;
}
<?php
$a = false;

for ($i = 0; $i < 4; $i++) {
  $j = rand(0, 10);

  if ($j === 2) {
    $a = true;
    continue;
  }

  if ($j === 3) {
    $a = true;
    break;
  }
}
<?php
$j = 5;
for ($i = $j; $i < 4; $i++) {
  $j = 9;
}
<?php
function foo() : void {
  $v = [1 => 0];
  for ($d = 0; $d <= 10; $d++) {
    for ($k = -$d; $k <= $d; $k += 2) {
      if ($k === -$d || ($k !== $d && $v[$k-1] < $v[$k+1])) {
        $x = $v[$k+1];
      } else {
        $x = $v[$k-1] + 1;
      }

      $v[$k] = $x;
    }
  }
}
<?php
for (;;) {
    $a = "hello";
    break;
}
for (;;) {
    $b = 5;
    break;
}
<?php
class Node {
    /** @var Node|null */
    public $next;
}

/** @return void */
function test(Node $head) {
    for ($node = $head; $node; $node = $next) {
        $next = $node->next;
        $node->next = null;
    }
}
<?php
for ($i = 0; $i < 5; $i++);
echo $i;
<?php
foreach (["a", "b", "c"] as $letter) {
    switch ($letter) {
        case "b":
            $foo = 1;
            break;
        case "c":
            $foo = 2;
            break;
        default:
            continue;
    }

    $moo = $foo;
}
<?php
foreach ([1, 2, 3, 4] as $b) {
    $array[] = "hello";
}

echo $array;
<?php
foreach ([1,2,3,4] as $i) {
    if ($i === 1) {
        $a = true;
        break;
    }
}

echo $a;
<?php
foreach ([1,2,3,4] as $i) {
    if ($i === 1) {
        $a = true;
    }

    echo $a;
}
<?php
function test(): int {
  $x = 0;
  $y = 1;
  $z = 2;
  foreach ([0, 1, 2] as $i) {
    $x = $y;
    $y = $z;
    $z = "hello";
  }
  return $x;
}
<?php
class A {
    /** @return array<A|null> */
    public static function loadMultiple()
    {
        return [new A, null];
    }

    /** @return void */
    public function barBar() {

    }
}

foreach (A::loadMultiple() as $a) {
    if ($a === null) {
        // do nothing
    }

    $a->barBar();
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
    if (!$a) {
        $a = true;
        break;
    }
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
    if (!$a) {
        if (rand(0, 1)) {
            $a = true;
            break;
        } else {
            $a = true;
            break;
        }
    }
}
<?php
$list = [1, 2, 3];
foreach ($list as $i) {
  $list = [4, 5, 6];
}
<?php
foreach ([1, 2, 3, 4] as $b) {
    if (rand(0, 1)) {
        break;
    }
    $car = "Volvo";
}

echo $car;
<?php
continue;
<?php
foreach (5 as $a) {

}
<?php
class A {
    /** @var ?string */
    public $foo;
}

class B extends A {}

function bar(A $a): void {}

$arr = [];

if (rand(0, 10) > 5) {
    $arr[] = new A;
} else {
    $arr = new B;
}

foreach ($arr as $a) {
    bar($a);
}
<?php
foreach ([1, 2, 3] as $i) {
    $a = $i;
}

if ($a) {}
<?php
foreach (["1", "2", "3"] as $i) {
    $a = $i;
}

if ($a) {}
<?php
foreach (["a", "b", "c"] as $letter) {
    switch ($letter) {
        case "b":
            $foo = 1;
            break;
        case "c":
            $foo = 2;
            break;
        default:
            continue 2;
    }

    $moo = $foo;
}
<?php
foreach (["a", "b", "c"] as $letter) {
    switch ($letter) {
        case "a":
            if (rand(0, 10) === 1) {
                continue 2;
            }
            $foo = 1;
            break;
        case "b":
            if (rand(0, 10) === 1) {
                continue 2;
            }
            $foo = 2;
            break;
        default:
            continue 2;
    }

    $moo = $foo;
}
<?php
foreach (["a", "b", "c"] as $letter) {
    switch ($letter) {
        case "a":
        case "b":
            $foo = 2;
            break;

        default:
            $foo = 3;
            break;
    }

    $moo = $foo;
}
<?php
foreach (["a", "b", "c"] as $letter) {
    switch ($letter) {
        case "a":
            $bar = 1;

        case "b":
            $foo = 2;
            break;

        default:
            $foo = 3;
            break;
    }

    $moo = $foo;
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;

foreach ([1, 2, 3] as $i) {
    if ($a !== null) takesInt($a);
    $a = $i;
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;

foreach ([1, 2, 3] as $i) {
    if (is_int($a)) takesInt($a);
    $a = $i;
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;

foreach ([1, 2, 3] as $i) {
    if (is_int($a)) takesInt($a);

    if (rand(0, 1)) {
        $a = $i;
    }
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;

foreach ([1, 2, 3] as $i) {
    if (is_int($a)) {
        $a = 6;
    } else {
        $a = $i;
    }
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;

foreach ([1, 2, 3] as $i) {
    if (is_int($a)) takesInt($a);

    while (rand(0, 1)) {
        $a = $i;
    }
}
<?php
class A {}
class B extends A {}
class C extends A {}

$b = null;

foreach ([new A, new A] as $a) {
    if ($a instanceof B) {

    } elseif (!$a instanceof C) {
        return "goodbye";
    }

    if ($b instanceof C) {
        return "hello";
    }

    $b = $a;
}
<?php
/** @return void **/
function takesInt(int $i) {}

$a = null;
$b = null;

foreach ([1, 2, 3] as $i) {
    if ($b !== null) {
        takesInt($b);
    }

    if ($a !== null) {
        takesInt($a);
        $b = $a;
    }

    $a = $i;
}
<?php
$a = null;

foreach ([1, 2, 3] as $i) {
    $a = $i;
    unset($i);
}
<?php
$b = false;

foreach ([1, 2, 3, 4] as $a) {
    if ($a === rand(0, 10)) {
        $b = true;
    }
}
<?php
$b = false;

foreach ([1, 2, 3, 4] as $a) {
    if ($a === rand(0, 10)) {
        $b = true;
        break;
    }
}
<?php
class A {
    /** @return array<A|null> */
    public static function loadMultiple()
    {
        return [new A, null];
    }

    /** @return void */
    public function barBar() {

    }
}

foreach (A::loadMultiple() as $a) {
    if ($a === null) {
        continue;
    }

    $a->barBar();
}
<?php
/**
 * @param array<array<int, array<string, string>>> $args
 * @return array[]
 */
function get_merged_dict(array $args) {
    $merged = array();

    foreach ($args as $group) {
        foreach ($group as $key => $value) {
            if (isset($merged[$key])) {
                $merged[$key] = array_merge($merged[$key], $value);
            } else {
                $merged[$key] = $value;
            }
        }
    }

    return $merged;
}
<?php
$a = [];
$b = rand(0, 10) > 5;

foreach ([1, 2, 3] as $i) {
  if (rand(0, 5)) {
    $a[] = 5;
    continue;
  }

  if ($b) {
    continue; // if this is removed, no failure
  } else {} // if else is removed, no failure
}

if ($a) {}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $tag = null;
  } else {
    $tag = null;
  }
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $tag = null;
    break;
  } elseif ($tag === "b") {
    $tag = null;
    break;
  } else {
    $tag = null;
    break;
  }
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $tag = null;
  } else {
    break;
  }
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    break;
  } else {
    $tag = null;
  }
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $tag = 5;
  } else {
    break;
  }
}
<?php
$tag = null;
foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $tag = null;
  } else {
    $tag = null;
    break;
  }
}
<?php
function getStrings(): array {
    return ["hello", "world"];
}

$a = null;

foreach (getStrings() as $s) {
  if ($a === null) {
    $a = $s;
  }
}
<?php
$a = null;

function getStrings(): array {
    return ["hello", "world"];
}

$a = null;

foreach (getStrings() as $s) {
  if ($a === null) {
    $a = $s;
    continue;
  }
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
  $a = true;
  break;
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
  $a = true;
  continue;
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $a = true;
    break;
  } else {
    $a = true;
    break;
  }
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $a = true;
    continue;
  }
}
<?php
$a = false;

foreach (["a", "b", "c"] as $tag) {
  if ($tag === "a") {
    $a = true;
    break;
  }

  if ($tag === "b") {
    $a = true;
    continue;
  }
}
<?php
$a = false;

foreach (["d", "e", "f"] as $l) {
    foreach (["a", "b", "c"] as $tag) {
        if (!$a) {
            if (rand(0, 10)) {
                $a = true;
                break;
            } else {
                $a = true;
                break;
            }
        }
    }
}
<?php
$a = false;
foreach ([1, 2, 3] as $i) {
  if ($i > 1) {
    $a = true;
    continue;
  }

  break;
}
<?php
foreach ([1,2,3,4] as $i) {
    if ($i === 1) {
        $a = true;
    } else {
        $a = false;
    }

    echo $a;
}
<?php
$ids = [];
foreach (explode(",", "hello,5,20") as $i) {
  if (!is_numeric($i)) {
    continue;
  }

  $ids[] = $i;
}
<?php
function foo(array $arr): void {
  $r = [];
  foreach ($arr as $key => $value) {
    if ($value["foo"]) {}
    $r[] = $key;
  }
}
<?php
$list = [1, 2, 3];
foreach ($list as $i) {
  $i = 5;
}
<?php
$list = [1, 2, 3];
foreach ($list as $i) {
  foreach ($list as $j) {}
}
<?php
$a = null;
$arr = [];

foreach ([1, 2, 3] as $_) {
    if (rand(0, 1)) {
        $arr["a"]["c"] = "foo";
        $a = $arr["a"]["c"];
    } else {
        $arr["b"]["c"] = "bar";
        $a = $arr["b"]["c"];
    }
}
<?php
$i = false;
$b = (bool) rand(0, 1);
foreach ([$b] as $n) {
    $i = $n;
    if ($i) {
        continue;
    }
}
if ($i) {}
<?php
foreach ([1, 2, 3, 4] as $b) {
    $car = "Volvo";
}

echo $car;
<?php
foreach ([1, 2, 3, 4] as $b) {
    $car = "Volvo";
    if (rand(0, 1)) {
        break;
    }
}

echo $car;
<?php
class C implements IteratorAggregate
{
    public function getIterator(): Iterator
    {
        return new ArrayIterator([]);
    }
}

function loopT(Traversable $coll): void
{
    foreach ($coll as $item) {}
}

function loopI(IteratorAggregate $coll): void
{
    foreach ($coll as $item) {}
}

loopT(new C);
loopI(new C);
<?php
/**
 * @param \Traversable<int>&\Countable $object
 */
function doSomethingUseful($object) : void {
    echo count($object);
    foreach ($object as $foo) {}
}
<?php
class Item {
  /**
   * @var string
   */
  public $prop = "var";
}

class Collection implements IteratorAggregate {
  /**
   * @var Item[]
   */
  private $items = [];

  public function add(Item $item): void
  {
      $this->items[] = $item;
  }

  /**
    * @return \ArrayIterator<mixed, Item>
    */
  public function getIterator(): \ArrayIterator
  {
      return new \ArrayIterator($this->items);
  }
}

$collection = new Collection();
$collection->add(new Item());
foreach ($collection as $item) {
    echo $item->prop;
}
<?php
/** @var Countable&Traversable<int> */
$c = null;
foreach ($c as $i) {}
<?php
class A {
    const ARR = [0, 1, 2];

    public function test() : int
    {
        foreach (self::ARR as $val) {
            $max = $val;
        }

        return $max;
    }
}
<?php
foreach ([0, 1, 2, 3] as $i) {
    $a = $i;
}

if ($a) {}
<?php
foreach (["", "1", "2", "3"] as $i) {
    $a = $i;
}

if ($a) {}
<?php
while (true) {
    $a = "hello";
}

echo $a;
<?php
function foo(?string $i) : void {}
function bar(?string $i) : void {}

$c = null;

while (rand(0, 1)) {
    if (!$c) {
        foo($c);
    } else {
        bar($c);
    }
}
<?php
$worked = false;

while (rand(0,100) === 10) {
    $worked = true;
}
<?php
class B {}
class A {
    /** @var A|B */
    public $parent;

    public function __construct() {
        $this->parent = rand(0, 1) ? new A(): new B();
    }
}

function makeA(): A {
    return new A();
}

$a = makeA();

while ($a instanceof A) {
    $a = $a->parent;
}
<?php
class B {}
class A {
    /** @var A|B */
    public $parent;

    public function __construct() {
        $this->parent = rand(0, 1) ? new A(): new B();
    }
}

function makeA(): A {
    return new A();
}

$a = makeA();

while ($a->parent instanceof A) {
    $a = $a->parent;
}

$b = $a->parent;
<?php
class A {
    /** @var ?A */
    public $parent;

    public function __construct() {
        $this->parent = rand(0, 1) ? new A(): null;
    }
}

function makeA(): A {
    return new A();
}

$a = makeA();

while ($a) {
    $a = $a->parent;
}
<?php
class A {
    /** @var ?A */
    public $parent;

    public function __construct() {
        $this->parent = rand(0, 1) ? new A(): null;
    }
}

function makeA(): A {
    return new A();
}

$a = makeA();

while ($a && rand(0, 10) > 5) {
    $a = $a->parent;
}
<?php
$a = ["b", "c", "d"];
array_pop($a);
while ($a) {
    $letter = array_pop($a);
    if (!$a) {}
}
<?php
class A {
  /** @var ?int */
  public $bar;
}

function foo(): ?A {
  return rand(0, 1) ? new A : null;
}

while ($a = foo()) {
  if ($a->bar) {}
}
<?php
while (true) {
    $a = "hello";
    break;
}
while (1) {
    $b = 5;
    break;
}
<?php
class A {
  /** @var A|null */
  public $a;

  public function __construct() {
    $this->a = rand(0, 1) ? new A : null;
  }
}

function takesA(A $a): void {}

$a = new A();
while ($a) {
  takesA($a);
  $a = $a->a;
};
<?php
class A {
    /** @var null|A */
    public $parent;
}

class B extends A {}

$a = new A();

while ($a->parent instanceof B) {
    $a = $a->parent;
}
<?php
class A {
    /** @var null|A */
    public $parent;
}

class B extends A {}

$a = (new A())->parent;

$foo = rand(0, 1) ? "hello" : null;

if (!$foo) {
    while ($a instanceof B && !$foo) {
        $a = $a->parent;
        $foo = rand(0, 1) ? "hello" : null;
    }
}
<?php
$data = ["a" => false];
while (!$data["a"]) {
    if (rand() % 2 > 0) {
        $data = ["a" => true];
    }
}
<?php
$a = 0;

while (rand(0, 1)) {
    if (rand(0, 1)) {
        $a++;
    } elseif ($a) {
        $a--;
    }
}
<?php
function foo(?string &$i) : void {}
function bar(?string &$i) : void {}

$c = null;

while (rand(0, 1)) {
    if (!$c) {
        foo($c);
    } else {
        bar($c);
    }
}
<?php
class Obj {}
class A extends Obj {
    /** @var A|null */
    public $foo;
}
class B extends Obj {}

function foo(Obj $node) : void {
    while ($node instanceof A
        || $node instanceof B
    ) {
        if (!$node instanceof B) {
            $node = $node->foo;
        }
    }
}
<?php
class Obj {}
class A extends Obj {
    /** @var A|null */
    public $foo;
}
class B extends Obj {
    /** @var A|null */
    public $foo;
}
class C extends Obj {
    /** @var A|C|null */
    public $bar;
}

function takesA(A $a) : void {}

function foo(Obj $node) : void {
    while ($node instanceof A
        || $node instanceof B
        || ($node instanceof C && $node->bar instanceof A)
    ) {
        if (!$node instanceof C) {
            $node = $node->foo;
        } else {
            $node = $node->bar;
        }
    }
}
<?php
$foo = null;
while (rand(0, 1)) {
    if (rand(0, 1)) {
        $foo = 1;
        continue;
    }

    $a = rand(0, 1);

    if ($a === $foo) {}
}
<?php
$i = 5;
while (--$i > 0) {}
echo $i === 0;
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method string getString(\)
 */
class Child extends ParentClass {}
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method string getString(&$a)
 */
class Child extends ParentClass {}
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method string getString()
 * @psalm-seal-methods
 */
class Child extends ParentClass {}

$child = new Child();
$child->getString();
$child->foo();
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method setString(int $integer)
 */
class Child extends ParentClass {}

$child = new Child();

$child->setString("five");
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method setBool(string $foo, string|bool $bar)  :   bool dsa sada
 */
class Child extends ParentClass {}

$child = new Child();

$b = $child->setBool("hello", 5);
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method void setInts(int ...$foo) with some more text
 */
class Child extends ParentClass {}

$child = new Child();

$child->setInts([1, 2, 3]);
<?php
class C {}
class D {}

class A {
    public function foo(string $s) : C {
        return new C;
    }
}

/** @method D foo(string $s) */
class B extends A {}
<?php
class C {}
class D extends C {}

class A {
    public function foo(string $s) : C {
        return new C;
    }
}

/** @method D foo(int $s) */
class B extends A {}
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method string getString() dsa sada
 * @method  void setInteger(int $integer) dsa sada
 * @method setString(int $integer) dsa sada
 * @method setMixed(mixed $foo) dsa sada
 * @method setImplicitMixed($foo) dsa sada
 * @method setAnotherImplicitMixed( $foo, $bar,$baz) dsa sada
 * @method setYetAnotherImplicitMixed( $foo  ,$bar,  $baz    ) dsa sada
 * @method  getBool(string $foo)  :   bool dsa sada
 * @method (string|int)[] getArray() : array with some text dsa sada
 * @method (callable() : string) getCallable() : callable dsa sada
 */
class Child extends ParentClass {}

$child = new Child();

$a = $child->getString();
$child->setInteger(4);
/** @psalm-suppress MixedAssignment */
$b = $child->setString(5);
$c = $child->getBool("hello");
$d = $child->getArray();
$child->setArray(["boo"]);
$e = $child->getCallable();
$child->setMixed("hello");
$child->setMixed(4);
$child->setImplicitMixed("hello");
$child->setImplicitMixed(4);
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method void setArray(array $arr = array(), int $foo = 5) with some more text
 */
class Child extends ParentClass {}

$child = new Child();

$child->setArray(["boo"]);
$child->setArray(["boo"], 8);
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method void setInts(int ...$foo) with some more text
 */
class Child extends ParentClass {}

$child = new Child();

$child->setInts(1, 2, 3, 4);
<?php
class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method setBool(string $foo, string|bool $bar)  :   bool dsa sada
 * @method void setAnotherArray(int[]|string[] $arr = [], int $foo = 5) with some more text
 */
class Child extends ParentClass {}

$child = new Child();

$b = $child->setBool("hello", true);
$c = $child->setBool("hello", "true");
$child->setAnotherArray(["boo"]);
<?php
namespace Foo;

class ParentClass {
    public function __call(string $name, array $args) {}
}

/**
 * @method setBool(string $foo, string|bool $bar)  :   bool
 */
class Child extends ParentClass {}

$child = new Child();

$c = $child->setBool("hello", true);
$c = $child->setBool("hello", "true");
<?php
/** @method void global() */
class A {
    public function __call(string $s) {}
}
<?php
/**
 * @method I[] work()
 */
class I {
    function __call(string $method, array $args) { return [new I, new I]; }

    function zugzug(): void {
        echo count($this->work());
    }
}
<?php
class C {}
class D extends C {}

class A {
    public function foo(string $s) : C {
        return new C;
    }
}

/** @method D foo(string $s) */
class B extends A {}
<?php
class BaseActiveRecord {
    /**
     * @param string $class
     * @param array $link
     * @return ActiveQueryInterface
     */
    public function hasMany($class, $link)
    {
        return new ActiveQuery();
    }
}

/**
 * @method ActiveQuery hasMany($class, array $link)
 */
class ActiveRecord extends BaseActiveRecord {}

interface ActiveQueryInterface {}

class ActiveQuery implements ActiveQueryInterface {
    /**
     * @param string $tableName
     * @param array $link
     * @param callable $callable
     * @return $this
     */
    public function viaTable($tableName, $link, callable $callable = null)
    {
        return $this;
    }
}

class Boom extends ActiveRecord {
    /**
     * @return ActiveQuery
     */
    public function getUsers()
    {
        $query = $this->hasMany("User", ["id" => "user_id"])
            ->viaTable("account_to_user", ["account_id" => "id"]);

        return $query;
    }
}
<?php
/**
 * @property string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
$a->foo = 5;
<?php
namespace Bar;

class PropertyType {}
class SomeOtherPropertyType {}

/**
 * @property PropertyType $foo
 */
class A {
    /** @param string $name */
    public function __get($name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value): void {
    }
}

$a = new A();
$a->foo = new SomeOtherPropertyType();
<?php
/**
 * @property-write string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
$a->foo = 5;
<?php
/**
 * @property string $foo
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
$a->bar = 5;
<?php
/**
 * @property string $foo
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
$a->foo = 5;
<?php
/**
 * @property-read string $foo
 */
class A {
    /** @return mixed */
    public function __get(string $name) {
        if ($name === "foo") {
            return "hello";
        }
    }
}

$a = new A();
echo count($a->foo);
<?php
/**
 * @property string $foo
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
echo $a->bar;
<?php
/**
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function badSet(): void {
        $this->__set("foo", "value");
    }
}
<?php
/**
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function badGet(): void {
        $this->__get("foo");
    }
}
<?php
/**
 * @property string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function badSet(): void {
        $this->__set("foo", new stdClass());
    }
}
<?php
/**
 * @property string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

/** @param mixed $b */
function foo($b) : void {
    $a = new A();
    $a->__set("foo", $b);
}
<?php
namespace Bar;

/**
 * @property string $foo
 */
class A {
    /** @param string $name */
    public function __get($name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value): void {
    }
}

$a = new A();
$a->foo = "hello";
$a->bar = "hello"; // not a property
<?php
namespace Bar;

class PropertyType {}

/**
 * @property PropertyType $foo
 */
class A {
    /** @param string $name */
    public function __get($name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value): void {
    }
}

$a = new A();
$a->foo = new PropertyType();
<?php
namespace Bar;
/**
 * @property string $foo
 * @psalm-seal-properties
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

$a = new A();
echo $a->foo;
<?php
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function goodSet(): void {
        $this->__set("foo", new stdClass());
    }
}
<?php
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function goodGet(): void {
        echo $this->__get("foo");
    }
}
<?php
/**
 * @property string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }

    public function goodSet(): void {
        $this->__set("foo", "value");
    }
}
<?php
/**
 * @property string $foo
 */
class A {
    public function __get(string $name): ?string {
        if ($name === "foo") {
            return "hello";
        }

        return null;
    }

    /** @param mixed $value */
    public function __set(string $name, $value): void {
    }
}

/** @param mixed $b */
function foo($b) : void {
    $a = new A();
    $a->__set("foo", $b);
}
<?php
class A {
    /** @var string|null */
    public $foo;

    public function __get(string $var_name) : ?string {
        if ($var_name === "foo") {
            return $this->$var_name;
        }

        return null;
    }
}
<?php
class A {
    public function __get(string $name) {}

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value) {}
}

/**
 * @property string $test
 */
class B extends A {
    public function test(): string {
        return $this->__get("test");
    }
}
<?php
/**
 * @property string $test
 */
class A {
    public function __get(string $name) {}

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value) {}
}

class B extends A {
    public function test(): string {
        return $this->__get("test");
    }
}
<?php
/**
 * @property-read string $name
 * @property string $otherName
 */
class A {
    public function __get(string $name): void {
    }

    public function goodGet(): void {
        echo $this->name;
    }
    public function goodGet2(): void {
        echo $this->otherName;
    }
}
$a = new A();
echo $a->name;
echo $a->otherName;
<?php
/**
 * @property string $test
 */
class C {
    public function __get(string $name)
    {
    }

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
    }

    public function test(): string
    {
        return $this->test;
    }
}
<?php
class C {
    /** @var string */
    protected $foo = "foo";

    public function __get(string $name) {}

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
    }
}

$c = new C();
$c->foo = "bar";
echo $c->foo;
<?php
class X {
    public function __get(string $name) : string {
        switch ($name) {
            case "a":
                return $this->other;
            case "other":
                return "foo";
        }
        return "default";
    }
}
<?php
class Foo {
    public function barBar(): void {}
}

Foo::barBar();
<?php
class A {
    /** @return void */
    public function foo(){}
}

class B extends A {
    /** @return void */
    public static function bar(){
        parent::foo();
    }
}
<?php
class Foo {
    public static function barBar(): void {}
}

/** @var mixed */
$a = (new Foo());

$a->barBar();
<?php
("hello")->someMethod();
<?php
class A1 {
    public function methodOfA(): void {
    }
}

/** @param A1|string $x */
function example($x, bool $isObject) : void {
    if ($isObject) {
        $x->methodOfA();
    }
}
<?php
class A {
    public function fooFoo(): void {}

    public static function barBar(): void {
        self::fooFoo();
    }
}
<?php
class Foo {
    public function barBar(): void {
        parent::barBar();
    }
}
<?php
class NullableClass {
}

class NullableBug {
    /**
     * @param class-string|null $className
     * @return object|null
     */
    public static function mock($className) {
        if (!$className) { return null; }
        return new $className();
    }

    /**
     * @return ?NullableClass
     */
    public function returns_nullable_class() {
        return self::mock("NullableClass");
    }
}
<?php
$foo::bar();
<?php
class A {
    public static function bar(): int {
        return 5;
    }
}
$foo = "A";
/** @psalm-suppress InvalidStringClass */
$b = $foo::bar();
<?php
$this->foo();
<?php
class A {
    public function bar(): void {}
}

$a = rand(0, 1) ? new A : false;
$a->bar();
<?php
/**
 * @psalm-suppress UndefinedClass
 */
class B extends A {}

$b = new B();
<?php
$arr = [];
$b = "foo";
$arr->$b();
<?php
$a = 5;
$a::bar();
<?php
$a = 5;
new $a();
<?php
class A {
    public function __invoke(string $p): void {}
}

$q = new A;
$q(1);
<?php
class A {
    public function __invoke(string $p): void {}
}
(new A)->__invoke(1);
<?php
class A {
    public function __call(string $method, array $args) {}
}

$q = new A;
$q->foo(bar());
<?php
interface A {}
interface B {}

/** @param B&A $p */
function f($p): void {
    $p->zugzug();
}
<?php
class C {
    public function foo() : void {}
}

(new C)::foo();
<?php
new DOMImplementation();
<?php
class A {
    /** @return void */
    public static function foo(){}
}

class B extends A {
    /** @return void */
    public static function bar(){
        parent::foo();
    }
}
<?php
class Foo {
    public static function barBar(): void {}
}

(new Foo())->barBar();
<?php
class A {
    public static function fooFoo(): void {}
}

class B extends A {

}

B::fooFoo();
<?php
class A {
    public static function bar(): int {
        return 5;
    }
}
$foo = new A;
$b = $foo::bar();
<?php
class X33{
    public static function main(): void {
        echo SELF::class . "\n";  // Class or interface SELF does not exist
    }
}
X33::main();
<?php
final class MyDate extends DateTimeImmutable {}

$today = new MyDate();
$yesterday = $today->sub(new DateInterval("P1D"));

$b = (new DateTimeImmutable())->modify("+3 hours");
<?php
class A {
    public function __call(string $method_name, array $args) {}
}

$a = new A;
$a->bar();
<?php
class A {
  public function __call(string $method, array $args) {}
}

class B {}

$a = rand(0, 1) ? new A : new B;

$a->maybeUndefinedMethod();
<?php
class A {
  public function __call(string $method, array $args) {}
}

class B {
    public function bar() : void {}
}

$a = rand(0, 1) ? new A : new B;

$a->bar();
<?php
class A {
    public function __invoke(string $p): void {}
}

$q = new A;
$q("asda");
<?php
$doc = new DOMDocument("1.0");
$node = $doc->createElement("foo");
$newnode = $doc->appendChild($node);
$newnode->setAttribute("bar", "baz");
<?php
class A11 {
    public function call() : self {
        $result = self::method();
        return $result;
    }

    public function method() : self {
        return $this;
    }
}
$x = new A11();
var_export($x->call());
<?php
$xml = new SimpleXMLElement("<a><b></b></a>");
$a = $xml->asXML();
$b = $xml->asXML("foo.xml");
<?php
$format = random_bytes(10);
$dt = new DateTime;
$formatted = $dt->format($format);
if (false !== $formatted) {}
function takesString(string $s) : void {}
takesString($formatted);
<?php
function foo(DOMElement $e) : ?string {
    $a = $e->getElementsByTagName("bar");
    $b = $a->item(0);
    if (!$b) {
        return null;
    }
    return $b->getAttribute("bat");
}
<?php
function getTypeName(ReflectionParameter $parameter): string {
    $type = $parameter->getType();

    if ($type === null) {
        return "mixed";
    }

    return $type->getName();
}
<?php
function md5_and_reverse(string $string) : string {
    return strrev(md5($string));
}

$db = new PDO("sqlite:sqlitedb");
$db->sqliteCreateFunction("md5rev", "md5_and_reverse", 1);
<?php
class B {
    public function foo() : void {}
}
/**
 * @param array<B> $b
 */
function foo(array $a, array $b) : void {
    $c = array_merge($b, $a);

    foreach ($c as $d) {
        $d->foo();
        if ($d instanceof B) {}
    }
}
<?php
class A {
    private function foo(): void {}
}
class B extends A {
    private function foo(int $arg): void {}
}
<?php
class A {
    public function foo(string $s): ?string {
        return rand(0, 1) ? $s : null;
    }
}

class B extends A {
    public function foo(?string $s): string {
        return $s ?: "hello";
    }
}

echo (new B)->foo(null);
<?php
class A {
    public function foo(string $s): string {
        return $s;
    }
}

class B extends A {
    public function foo(string $s = null): string {
        return $s ?: "hello";
    }
}

echo (new B)->foo();
<?php
class A {}
class B extends A {
  public function bar(): void {}
}
class C extends A {
  public function bar(): void {}
}

/** @param B|C $a */
function foo(A $a): void {
  $a->bar();
}
<?php
class A {
    /** @return ?int */
    public function foo() {
        if (rand(0, 1)) return 5;
    }
}

class B extends A {
    public function foo() {}
}
<?php
class A {
  /** @return self */
  public function foo() {
    return new A();
  }
}

class B extends A {
  public function foo() {
    return new A();
  }
}
<?php
class A {
  /** @return static */
  public static function foo() {
    return new A();
  }
}

class B extends A {
  public static function foo() {
    return new B();
  }
}

$b = B::foo();
<?php
interface I1 {
    public function test(string $s) : ?string;
    public function testIterable(array $a) : ?iterable;
}

class A1 implements I1 {
    public function test(?string $s) : string {
        return "value";
    }
    public function testIterable(?iterable $i) : array {
        return [];
    }
}
<?php
class A {
  /** @return ?string */
  public function foo() {
    return rand(0, 1) ? "hello" : null;
  }
}

class B extends A {
  public function foo(): void {
    return;
  }
}

class C extends A {
  /** @return void */
  public function foo() {
    return;
  }
}

class D extends A {
  /** @return null */
  public function foo() {
    return null;
  }
}
<?php
class A implements Serializable {
    /** @var int */
    private $id = 1;

    public function unserialize($serialized) : void
    {
        [
            $this->id,
        ] = (array) \unserialize((string) $serialized);
    }

    public function serialize() : string
    {
        return serialize([$this->id]);
    }
}
<?php
class HaruDestination {}
class AClass
{
    public function get(): HaruDestination
    {
        return new HaruDestination;
    }
}
<?php
class A {
    public function foo() : void {}
}

trait T {
    abstract public function foo() : void;
}

class B extends A {
    use T;
}
<?php
namespace App;

use SplObserver;
use SplSubject;

class Observer implements \SplObserver
{
    public function update(SplSubject $subject)
    {
    }
}

class Subject implements \SplSubject
{
    public function attach(SplObserver $observer)
    {
    }

    public function detach(SplObserver $observer)
    {
    }

    public function notify()
    {
    }
}
<?php
class A {
  /**
   * @param string $bar
   * @return void
   */
  public function foo($bar) {
    echo $bar;
  }
}

class B extends A {
  public function foo($bar) {
    echo "hello " . $bar;
  }
}
<?php
class A {
    public function fooFoo(int $a, bool $b): void {

    }
}

class B extends A {
    public function fooFoo(int $a, bool $b, array $c): void {

    }
}
<?php
class A {
    public function fooFoo(int $a, bool $b): void {

    }
}

class B extends A {
    public function fooFoo(int $a): void {

    }
}
<?php
class A {
    public function fooFoo(int $a, bool $b): void {

    }
}

class B extends A {
    public function fooFoo(bool $b, int $a): void {

    }
}
<?php
class A {
    public function foo(?string $s): string {
        return $s ?: "hello";
    }
}

class B extends A {
    public function foo(string $s): string {
        return $s;
    }
}
<?php
class A {
    function foo(): C {
        return new C();
    }
}
class B extends A {
    function foo(): D {
        return new D();
    }
}
class C {}
class D extends C {}
<?php
class A {
    function foo(): self {
        return new A();
    }
}
class B extends A {
    function foo(): self {
        return new B();
    }
}
<?php
function foo($bar = null, $bat): void {}
<?php
class A {
  public function foo(string $a): void {
    echo $a;
  }
}
class B extends A {
  public function foo(string &$a): void {
    echo $a;
  }
}
<?php
class A {}
class B extends A {
  public function bar(): void {}
}
class C extends A {
  public function bar(): void {}
}

class D {
  public function foo(A $a): void {}
}

class E extends D {
  /** @param B|C $a */
  public function foo(A $a): void {
    $a->bar();
  }
}
<?php
class A {
  public function foo(): ?string {
    return rand(0, 1) ? "hello" : null;
  }
}

class B extends A {
  public function foo(): void {
    return;
  }
}
<?php
class A {
    public function foo() : void {}
}

abstract class B extends A {
    abstract public function foo() : void;
}
<?php
class A {
    public function foo() : void {}
}

trait T {
    abstract public function foo() : string;
}

class B extends A {
    use T;
}
<?php
class A
{
    public function __construct(): void
    {
    }
}
<?php
interface I {
    function foo(bool $b = false): void;
}

class C implements I {
    public function foo(bool $b): void {}
}
<?php
class A {
  /**
   * @param string $bar
   * @return void
   */
  public function foo($bar) {
    echo $bar;
  }
}

class B extends A {
  public function foo($bar) {
    echo "hello " . $bar;
  }
}

(new B)->foo(new stdClass);
<?php
interface Foo {
    public function __construct();
}

class Bar implements Foo {
    public function __construct(bool $foo) {}
}
<?php
namespace A {
    /** @return void */
    function foo() {

    }

    class Bar {

    }
}
namespace {
    A\foo();
    \A\foo();

    (new A\Bar);
}
<?php
namespace Aye\Bee {
    const HELLO = "hello";
}
namespace Aye\Bee {
    /** @return void */
    function foo() {
        echo \Aye\Bee\HELLO;
    }

    class Bar {
        /** @return void */
        public function foo() {
            echo \Aye\Bee\HELLO;
        }
    }
}
<?php
namespace Foo;

$a = $argv;
$b = $argc;
<?php
namespace Foo;

function foo() : void {
    global $argv;

    $c = $argv;
}
<?php
namespace A {
    /** @return void */
    function foo() {

    }
}
namespace {
    foo();
}
<?php
namespace {
    /** @return void */
    function foo() {

    }
}
namespace A {
    \A\foo();
}
<?php
class A {
    /**
     * @return string
     */
    public function A() {
        return "hello";
    }
}

class B extends A {
    public function __construct() {
        parent::__construct();
    }
}
<?php
class A {
    public function __construct(string $s) { }
    /** @return void */
    public function a(int $i) { }
}
new A("hello");
<?php
/**
 * @param  int  $start
 * @param  int  $limit
 * @param  int  $step
 * @return Generator<int>
 */
function xrange($start, $limit, $step = 1) {
    for ($i = $start; $i <= $limit; $i += $step) {
        yield $i;
    }
}

$a = null;

/*
 * Note that an array is never created or returned,
 * which saves memory.
 */
foreach (xrange(1, 9, 2) as $number) {
    $a = $number;
}
<?php
try {
}
catch (\Exception $e) {
}
finally {
}
<?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    echo "A: $a; B: $b\n";
}
<?php
$a = [1, 2, 3][0];
$b = "PHP"[0];
<?php
class ClassName {}

$a = ClassName::class;
<?php
const ARR = ["a", "b"];
$a = ARR[0];
<?php
class C {
    const ONE = 1;
    const TWO = self::ONE * 2;
    const THREE = self::TWO + 1;
    const ONE_THIRD = self::ONE / self::THREE;
    const SENTENCE = "The value of THREE is " . self::THREE;

    /** @var int */
    public $four = self::ONE + self::THREE;

    /**
     * @param  int $a
     * @return int
     */
    public function f($a = self::ONE + self::THREE) {
        return $a;
    }
}

$c1 = C::ONE;
$c2 = C::TWO;
$c3 = C::THREE;
$c1_3rd = C::ONE_THIRD;
$c_sentence = C::SENTENCE;
$cf = (new C)->f();
$c4 = (new C)->four;
<?php
const ONE = 1;
const TWO = ONE * 2;

$one = ONE;
$two = TWO;
<?php
/**
 * @return int
 * @param int $a
 * @param int $b
 * @param int $c
 */
function add($a, $b, $c) {
    return $a + $b + $c;
}

$operators = [2, 3];
echo add(1, ...$operators);
<?php
/**
 * @return string[]
 */
function a(): array {
  $a = [];
  $b = ["foo", "bar"];

  $a[] = "foo";

  array_push($a, ...$b);

  return $a;
}
<?php
$a = [[1, 2]];
$b = array_merge([], ...$a);
<?php
/**
 * @return array<int,array<int,string>>
 */
function getData(): array
{
    return [
        ["a", "b"],
        ["c", "d"]
    ];
}

/**
 * @return array<int,string>
 */
function f1(): array
{
    $data = getData();
    return array_merge($data[0], $data[1]);
}

/**
 * @return array<int,string>
 */
function f2(): array
{
    $data = getData();
    return array_merge(...$data);
}

/**
 * @return array<int,string>
 */
function f3(): array
{
    $data = getData();
    return array_merge([], ...$data);
}
<?php
$a = 2;
$a **= 3;
<?php
namespace Name\Space {
    const FOO = 42;
}

namespace Noom\Spice {
    use const Name\Space\FOO;

    echo FOO . "\n";
    echo \Name\Space\FOO;
}
<?php
namespace Name\Space {
    const FOO = 42;
}

namespace Noom\Spice {
    use const Name\Space\FOO;

    class A {
        /** @return void */
        public function fooFoo() {
            echo FOO . "\n";
            echo \Name\Space\FOO;
        }
    }
}
<?php
namespace Name\Space {
    /**
     * @return void
     */
    function f() { echo __FUNCTION__."\n"; }
}

namespace Noom\Spice {
    use function Name\Space\f;

    f();
    \Name\Space\f();
}
<?php
namespace Name\Space {
    /**
     * @return void
     */
    function f() { echo __FUNCTION__."\n"; }
}

namespace Noom\Spice {
    use function Name\Space\f;

    class A {
        /** @return void */
        public function fooFoo() {
            f();
            \Name\Space\f();
        }
    }
}
<?php
function foo(int ...$is) : void {}

$arr = [1, 2, 3, 4];
foo(...$arr);
foo(...$arr);
<?php
function foo(iterable $args): int {
    return intval(...$args);
}

function foo(ArrayIterator $args): int {
    return intval(...$args);
}
<?php
$a = [];
$b = "hello";

$a[] = "foo";

array_push($a, ...$b);
<?php
function generator2() : Generator {
    if (rand(0,1)) {
        return;
    }
    yield 2;
}

/**
 * @psalm-suppress InvalidNullableReturnType
 */
function notagenerator() : Generator {
    if (rand(0, 1)) {
        return;
    }
    return generator2();
}
<?php
$foo = new class {
    public function a() {
        new B();
    }
};
<?php
$foo = new class {
    public function a(): string {
        return 5;
    }
};
<?php
function example() : Generator {
    yield from [2];
    return null;
}

function example2() : Generator {
    if (rand(0, 1)) {
        return example();
    }
    return null;
}
<?php
function indexof(string $haystack, string $needle): int
{
    $pos = strpos($haystack, $needle);

    if ($pos === false) {
        return -1;
    }

    return $pos;
}

$a = indexof("arr", "a");
<?php
class Foo {
    public static function indexof(string $haystack, string $needle): int
    {
        $pos = strpos($haystack, $needle);

        if ($pos === false) {
            return -1;
        }

        return $pos;
    }
}

$a = Foo::indexof("arr", "a");
<?php
$arr = ["hello", "goodbye"];
$a = $arr[rand(0, 10)] ?? null;
<?php
/** @return ?string */
function foo() {
    return rand(0, 10) > 5 ? "hello" : null;
}
$a = foo() ?? "goodbye";
<?php
$var = 0;
($a =& $var) ?? "hello";
<?php
$a = 1 <=> 1;
<?php
define("ANIMALS", [
    "dog",
    "cat",
    "bird"
]);

$a = ANIMALS[1];
<?php
interface Logger {
    /** @return void */
    public function log(string $msg);
}

class Application {
    /** @var Logger|null */
    private $logger;

    /** @return void */
    public function setLogger(Logger $logger) {
         $this->logger = $logger;
    }
}

$app = new Application;
$app->setLogger(new class implements Logger {
    /** @return void */
    public function log(string $msg) {
        echo $msg;
    }
});
<?php
$class = new class {
    public function f(): int {
        return 42;
    }
};

function g(int $i): int {
    return $i;
}

$x = g($class->f());
<?php
new class {};
<?php
interface I {}

class A
{
    /** @var ?I */
    protected $i;

    public function foo(): void
    {
        $this->i = new class implements I {};
    }

    public function foo2(): void {} // commenting this line out fixes
}
<?php
class A {
    public function foo() : void {}
}
$class = new class extends A {
    public function f(): int {
        $this->foo();
        return 42;
    }
};
<?php
/** @return object */
function getNewAnonymousClass() {
    return new class {};
}
<?php
class A {
    /** @return object */
    public function getNewAnonymousClass() {
        return new class {};
    }
}
<?php
/**
 * @return Generator<int,int>
 * @psalm-generator-return string
 */
function fooFoo(int $i): Generator {
    if ($i === 1) {
        return "bash";
    }

    yield 1;
}
<?php
/**
 * @return Generator<int, int, mixed, int>
 */
function count_to_ten(): Generator {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    return yield from nine_ten();
}

/**
 * @return Generator<int, int>
 */
function seven_eight(): Generator {
    yield 7;
    yield from eight();
}

/**
 * @return Generator<int,int>
 */
function eight(): Generator {
    yield 8;
}

/**
 * @return Generator<int,int, mixed, int>
 */
function nine_ten(): Generator {
    yield 9;
    return 10;
}

$gen = count_to_ten();
foreach ($gen as $num) {
    echo "$num ";
}
$gen2 = $gen->getReturn();
<?php
function other_generator(): Generator {
  yield "traffic";
  return 1;
}
function foo(): Generator {
  /** @var int */
  $value = yield from other_generator();
  var_export($value);
}
<?php
namespace Name\Space {
    class A {

    }

    class B {

    }
}

namespace Noom\Spice {
    use Name\Space\{
        A,
        B
    };

    new A();
    new B();
}
<?php
/**
 * @return Generator
 */
function generator2() : Generator {
    if (rand(0,1)) {
        return;
    }
    yield 2;
}
<?php
function takesInt(int $i) : void {
    echo $i;
}

function takesString(string $s) : void {
    echo $s;
}

/**
 * @return Generator<int, string, mixed, int>
 */
function other_generator() : Generator {
    yield "traffic";
    return 1;
}

/**
 * @return Generator<int, string>
 */
function foo() : Generator {
    $a = yield from other_generator();
    takesInt($a);
}

foreach (foo() as $s) {
    takesString($s);
}
<?php
function example() : Generator {
    yield from [2];
    return null;
}
<?php
class A
{
    private const IS_PRIVATE = 1;
}

echo A::IS_PRIVATE;
<?php
class A
{
    private const IS_PRIVATE = 1;
}

class B extends A
{
    function fooFoo(): int {
        return A::IS_PRIVATE;
    }
}
<?php
class A
{
    protected const IS_PROTECTED = 1;
}

echo A::IS_PROTECTED;
<?php
/**
 * @param  iterable<string> $iter
 */
function iterator(iterable $iter): void
{
    foreach ($iter as $val) {
        //
    }
}

class A {
}

iterator(new A());
<?php
function a(): ?string
{
    return rand(0, 10) ? "elePHPant" : null;
}

$a = a();
<?php
/** @return ?string */
function a() {
    return rand(0, 10) ? "elePHPant" : null;
}

$a = a();
<?php
function test(?string $name): ?string
{
    return $name;
}

test("elePHPant");
test(null);
<?php
class A
{
    protected const IS_PROTECTED = 1;
}

class B extends A
{
    function fooFoo(): int {
        return A::IS_PROTECTED;
    }
}
<?php
class A
{
    private const IS_PRIVATE = 1;

    function fooFoo(): int {
        return A::IS_PRIVATE;
    }
}
<?php
class A
{
    public const IS_PUBLIC = 1;
    const IS_ALSO_PUBLIC = 2;
}

class B extends A
{
    function fooFoo(): int {
        echo A::IS_PUBLIC;
        return A::IS_ALSO_PUBLIC;
    }
}

echo A::IS_PUBLIC;
echo A::IS_ALSO_PUBLIC;
<?php
$data = [
    [1, "Tom"],
    [2, "Fred"],
];

// list() style
list($id1, $name1) = $data[0];

// [] style
[$id2, $name2] = $data[1];
<?php
$data = [
    [1, "Tom"],
    [2, "Fred"],
];

// [] style
foreach ($data as [$id, $name]) {
    echo $id;
    echo $name;
}
<?php
$data = [
    ["id" => 1, "name" => "Tom"],
    ["id" => 2, "name" => "Fred"],
];

// [] style
foreach ($data as ["id" => $id, "name" => $name]) {
    $last_id = $id;
    $last_name = $name;
}
<?php
/**
 * @param  iterable<int, int> $iter
 */
function iterator(iterable $iter): void
{
    foreach ($iter as $val) {
        //
    }
}

iterator([1, 2, 3, 4]);
iterator(new SplFixedArray(5));
<?php
class IteratorObj implements Iterator {
    function rewind(): void {}
    /** @return mixed */
    function current() { return null; }
    function key(): int { return 0; }
    function next(): void {}
    function valid(): bool { return false; }
}

function foo(\Traversable $t): void {
}

foo(new IteratorObj);
<?php
function castToArray(iterable $arr): array {
   return $arr instanceof \Traversable ? iterator_to_array($arr, false) : $arr;
}
function castToArray2(iterable $arr): array {
   return is_array($arr) ? $arr : iterator_to_array($arr, false);
}
<?php
function foo(iterable $i): array {
  if (!is_array($i)) {
    $i = iterator_to_array($i, false);
  }

  return $i;
}
<?php
class A {
}

(new A)->foo = "cool";
<?php
class A {
}

echo (new A)->foo;
<?php
class A {
    public function fooFoo(): void {
        $this->foo = "cool";
    }
}
<?php
class A {
    public static function barBar(): void
    {
        /** @psalm-suppress UndefinedPropertyFetch */
        self::$foo = 5;
    }
}
<?php
class A {
    public function fooFoo(): void {
        echo $this->foo;
    }
}
<?php
class A {
    public $foo;

    public function assignToFoo(): void {
        $this->foo = 5;
    }
}
<?php
class A {
    public $foo;

    public function __construct() {
        $this->foo = 5;
    }
}
<?php
class A {
    public $foo;

    public function __construct() {
        $this->foo = 5;
    }

    public function makeNull(): void {
        $this->foo = null;
    }
}
<?php
class A {
    public $foo = null;

    public function __construct() {
        $this->foo = 5;
    }
}
<?php
class A {
    /** @var string */
    public $foo;

    public function barBar(): void
    {
        $this->foo = 5;
    }
}
<?php
class A {
    /** @var string */
    public static $foo = "a";

    public static function barBar(): void
    {
        self::$foo = 5;
    }
}
<?php
class A {
    /** @var B|null */
    public $foo;

    public function barBar(A $a): void
    {
        $this->foo = $a;
    }
}

class B extends A {}
<?php
class A {
    /** @var array<int, A> */
    public $foo = [];

    /** @param A[] $arr */
    public function barBar(array $arr): void
    {
        $this->foo = $arr;
    }
}
<?php
class A {
    /** @var B|null */
    public static $foo;

    public static function barBar(A $a): void
    {
        self::$foo = $a;
    }
}

class B extends A {}
<?php
class A {
    /** @var array<int, A> */
    public static $foo = [];

    /** @param A[] $arr */
    public static function barBar(array $arr): void
    {
        self::$foo = $arr;
    }
}
<?php
class A {
    /** @var string */
    public $foo;

    public function barBar(): void
    {
        $this->foo = rand(0, 1) ? 5 : "hello";
    }
}
<?php
class A {
    /** @var string */
    public static $foo = "a";

    public function barBar(): void
    {
        self::$foo = rand(0, 1) ? 5 : "hello";
    }
}
<?php
$a = "hello";
$a->foo = "bar";
<?php
$a = "hello";
echo $a->foo;
<?php
$a = rand(0, 5) > 3 ? "hello" : new stdClass;
echo $a->foo;
<?php
class Foo {
    /** @var string */
    public $foo = "";
}

/** @var mixed */
$a = (new Foo());

echo $a->foo;
<?php
class Foo {
    /** @var string */
    public $foo = "";
}

/** @var mixed */
$a = (new Foo());

$a->foo = "hello";
<?php
class Foo {
    /** @var string */
    public $foo = "";
}

$a = rand(0, 10) ? new Foo(): null;

$a->foo = "hello";
<?php
$a = null;

$a->foo = "hello";
<?php
class Foo {
    /** @var string */
    public $foo = "";
}

$a = rand(0, 10) ? new Foo(): null;

echo $a->foo;
<?php
$a = null;

echo $a->foo;
<?php
class A {}

class B {}

class C {
    /** @var array<B> */
    public $bb;
}

$c = new C;
$c->bb = [new A, new B];
<?php
class A {
    /** @var int[] */
    public $bb = [];
}

class B {
    /** @var string[] */
    public $bb;
}

$c = rand(0, 1) ? new A : new B;
$c->bb = ["hello", "world"];
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() { }
}
<?php
class A {
    /** @var int */
    public $a;
}
<?php
abstract class A {
    /** @var string */
    public $foo;
}

class B extends A {}
<?php
abstract class A {
    /** @var string */
    public $foo;

    private function __construct() {
        $this->foo = "hello";
    }
}

class B extends A {}
<?php
abstract class A {
    /** @var string */
    public $foo;

    private function __construct() {
        $this->foo = "hello";
    }
}

class B extends A {
    public function __construct() {}
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        if (rand(0, 1)) {
            $this->a = 5;
        }
    }
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        $this->foo();
    }

    protected function foo(): void {
        $this->a = 5;
    }
}
<?php
trait A {
    /** @var string **/
    public $a;
}
class B {
    use A;

    public function __construct() {
    }
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        if (rand(0, 1)) {
            $this->foo();
        }
    }

    private function foo(): void {
        $this->a = 5;
    }
}
<?php
class A {
    /** @var string */
    private $b;

    public function __construct() {
        $this->b = "foo";
    }
}

class B extends A {
    /** @var string */
    private $b;
}
<?php
class C extends B {}

abstract class B extends A {
    /** @var string */
    private $b;

    /** @var string */
    protected $c;
}

class A {
    public function __construct() {
        $this->publicMethod();
    }

    public function publicMethod() : void {
        $this->privateMethod();
    }

    private function privateMethod() : void {}
}
<?php
class B extends A {
    /** @var string */
    private $b;
}

class A {
    public function __construct() {
        if ($this instanceof B) {
            $this->b = "foo";
        }
    }
}
<?php
class A {
    public function __construct() {
        if ($this instanceof B) {
            $this->b = "foo";
        }
    }
}

class B extends A {
    /** @var string */
    private $b;
}


<?php
class A {
    /** @var B */
    public $foo;
}
<?php
abstract class A {
  /** @var string */
  public $foo;
}

class B extends A {
  public function __construct() {
  }
}
<?php
$x->$y = 4;
<?php
echo $x->$y;
<?php
class A {
  /** @var ?string */
  public $foo;
}

class B {
  public function __toString() {
    return "bar";
  }
}

$a = new A();
$a->foo = new B;
<?php
class A {
    /** @var string */
    public $foo;

    public function __construct() {
        $this->doThing();
    }

    private function doThing(): void {
        if (rand(0, 1)) {
            $this->doOtherThing();
        }
    }

    private function doOtherThing(): void {
        if (rand(0, 1)) {
            $this->doThing();
        }
    }
}
<?php
class A {
    /** @var int */
    public $a = "hello";
}
<?php
class A {
    /**
     * @var string
     */
    private $mixed;

    /**
     * @param mixed $value
     */
    public function setMixed($value): void
    {
        $this->mixed = $value;
    }
}
<?php
class A {
    /** @var ?B */
    public $foo;
}
class B {}
$a = new A();
if (is_string($a->foo)) {}
<?php
class Bar {}
class Foo {
    /** @var Bar */
    private $bar;

    public function __construct() {
        $this->bar = new Bar();
    }

    public function getBar(): void {
        if (!$this->bar) {}
    }
}
<?php
class A {
    /** @var static|null */
    public $instance;

    public function foo() : void {
        if ($this->instance) {
            $this->instance->bar();
        }
    }
}

class B extends A {
    public function bar() : void {}
}
<?php
class B {
    /** @var string|null */
    public $foo;

    public function bar(string $var_name) : ?string {
        if ($var_name === "bar") {
            return $this->$var_name;
        }

        return null;
    }
}
<?php
class A {
    /**
     * @var mixed
     */
    public $foo;

    /** @return void */
    public function barBar()
    {
        if (rand(0,10) === 5) {
            $this->foo = [];
        }

        if (!is_array($this->foo)) {
            // do something
        }
    }
}
<?php
class A {
    public $foo;
}

$a = (new A)->foo;
<?php
class A {
    /** @return void */
    function foo() {
        $boop = $this->foo === null && rand(0,1);

        echo $this->foo->baz;
    }
}
<?php
class A {
    /** @var int */
    public $foo = 0;
}
class B {
    /** @var string */
    public $foo = "";
}

$a = rand(0, 10) ? new A(): (rand(0, 10) ? new B(): null);
$b = null;

if ($a instanceof A || $a instanceof B) {
    $b = $a->foo;
}
<?php
class A {
    /** @var int */
    public $foo = 0;
}
class B {
    /** @var string */
    public $foo = "";
}

$a = rand(0, 10) ? new A(): new B();
if (rand(0, 1)) {
    $a = null;
}
$b = null;

if (rand(0, 10) === 4) {
    // do nothing
}
elseif ($a instanceof A || $a instanceof B) {
    $b = $a->foo;
}
<?php
class A {
    /** @var string */
    public $aa = "";
}

class B {
    /** @var A|null */
    public $bb;
}

$b = rand(0, 10) ? new A(): new B();

if ($b instanceof B && isset($b->bb) && $b->bb->aa === "aa") {
    echo $b->bb->aa;
}
<?php
class A {
    /** @var string|null */
    public $aa;
}

$a = new A();

if (!$a->aa) {
    $a->aa = "hello";
}

echo substr($a->aa, 1);
<?php
class A {
    /** @var A|null */
    public static $fooFoo;

    public static function getFoo(): A {
        if (!self::$fooFoo) {
            self::$fooFoo = new A();
        }

        return self::$fooFoo;
    }
}
<?php
class Foo {
}

$a = new \ReflectionMethod("Foo", "__construct");

echo $a->name . " - " . $a->class;
<?php
$a = new DOMElement("foo");
$owner = $a->ownerDocument;
<?php
function foo(DOMElement $e) : void {
    echo $e->attributes->length;
}
<?php
interface I1 {}

class A1 implements I1{}

class B1 implements I1 {}

class C1 {
    /** @var array<I1> */
    public $is = [];
}

$c = new C1;
$c->is = [new A1];
$c->is = [new A1, new A1];
$c->is = [new A1, new B1];
<?php
class A {
}

$a = new A();

if (isset($a->bar)) {

}
<?php
class A {
    /** @var int */
    public $a = 0;

    public function __construct() { }
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        $this->foo();
    }

    private function foo(): void {
        $this->a = 5;
    }
}
<?php
trait A {
    /** @var string **/
    public $a;
}
class B {
    use A;

    public function __construct() {
        $this->a = "hello";
    }
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        $this->foo();
    }

    private function foo(): void {
        $this->bar();
    }

    private function bar(): void {
        $this->a = 5;
    }
}
<?php
function bar(string $s): void { }

class A {
    /** @var array<string, string> */
    public $a = [];

    private function foo(): void {
        if (isset($this->a["hello"])) {
            bar($this->a["hello"]);
        }
    }
}
<?php
function bar(string $s): void { }

class A {
    /** @var array<string, string> */
    public $a = [];

    private function foo(): void {
        $b = "hello";

        if (!isset($this->a[$b])) {
            return;
        }

        bar($this->a[$b]);
    }
}
<?php
function bar(string $s): void { }

class A {
    /** @var array<string, string> */
    public static $a = [];
}

function foo(): void {
    $b = "hello";

    if (!isset(A::$a[$b])) {
        return;
    }

    bar(A::$a[$b]);
}
<?php
function bar(string $s): void { }

class A {
    /** @var array<string, string> */
    public static $a = [];
}

function foo(): void {
    $b = "hello";

    if (!isset(A::$a[$b])) {
        $g = "bar";
    } else {
        bar(A::$a[$b]);
        $g = "foo";
    }

    bar($g);
}
<?php
trait T {
  /** @var string **/
  public $foo;

  public function __construct() {
    $this->foo = "hello";
  }
}

class A {
    use T;
}
<?php
abstract class A {
    /** @var string */
    public $foo;
}
<?php
abstract class A {
    /** @var string */
    public $foo;

    public function __construct() {
        $this->foo = "";
    }
}

class B extends A {
    public function __construct() {
        parent::__construct();
    }
}
<?php
abstract class A {
    /** @var string */
    public $foo;

    public function __construct(int $bar) {
        $this->foo = (string)$bar;
    }
}

class B extends A {}

class E extends \Exception{}
<?php
/** @psalm-suppress PropertyNotSetInConstructor */
class A {
    /** @var int */
    public $a;

    public function __construct() { }
}
<?php
namespace Q;

class Base
{
    /**
     * @var string
     */
    private $aString;

    public function __construct()
    {
        $this->aString = "aa";
        echo($this->aString);
    }
}

class Descendant extends Base
{
    /**
     * @var bool
     */
    private $aBool;

    public function __construct()
    {
        parent::__construct();
        $this->aBool = true;
    }
}
<?php
abstract class A extends \Exception {
    /** @var string **/
    private $p;

    /** @param string $p **/
    final public function __construct($p) {
        $this->p = $p;
    }
}

final class B extends A {}
<?php
interface I {
    public function foo(): void;
}

abstract class A implements I {
    /** @var string */
    public $bar;

    public function __construct() {
        $this->foo();
    }
}

class B extends A {
    public function foo(): void
    {
        $this->bar = "hello";
    }
}
<?php
class C
{
    /**
     * @var string
     */
    private $a;

    /**
     * @var string
     */
    private $b;

    /**
     * @param string[] $opts
     * @psalm-param array{a:string,b:string} $opts
     */
    public function __construct(array $opts)
    {
        $this->setOptions($opts);
    }

    /**
     * @param string[] $opts
     * @psalm-param array{a:string,b:string} $opts
     */
    final public function setOptions(array $opts): void
    {
        $this->a = $opts["a"] ?? "defaultA";
        $this->b = $opts["b"] ?? "defaultB";
    }
}
<?php
final class C
{
    /**
     * @var string
     */
    private $a;

    /**
     * @var string
     */
    private $b;

    /**
     * @param string[] $opts
     * @psalm-param array{a:string,b:string} $opts
     */
    public function __construct(array $opts)
    {
        $this->setOptions($opts);
    }

    /**
     * @param string[] $opts
     * @psalm-param array{a:string,b:string} $opts
     */
    public function setOptions(array $opts): void
    {
        $this->a = $opts["a"] ?? "defaultA";
        $this->b = $opts["b"] ?? "defaultB";
    }
}
<?php
class Node
{
    /** @var self|null */
    public $next;

    public function __construct() {
        if (rand(0, 1)) {
            $this->next = new Node();
        }
    }
}

$node = new Node();
$next = $node->next;
<?php
class A {
    /**
     * @var int
     * @psalm-suppress PropertyNotSetInConstructor
     */
    public $a;

    public function __construct() { }
}
<?php
namespace PhpParser\Node\Stmt;

use PhpParser\Node;

class Finally_ extends Node\Stmt
{
    /** @var Node[] Statements */
    public $stmts;

    /**
     * Constructs a finally node.
     *
     * @param Node[] $stmts      Statements
     * @param array  $attributes Additional attributes
     */
    public function __construct(array $stmts = array(), array $attributes = array()) {
        parent::__construct($attributes);
        $this->stmts = $stmts;
    }

    public function getSubNodeNames() : array {
        return array("stmts");
    }

    public function getType() : string {
        return "Stmt_Finally";
    }
}
<?php
class A {
  /** @var string */
  private $foo;

  public function __construct(string $foo) {
    $this->foo = $foo;
  }

  private function bar() : void {}
}

class B extends A {
  /** @var string */
  private $foo;

  public function __construct(string $foo) {
    $this->foo = $foo;
    parent::__construct($foo);
  }
}
<?php
class A {
  /** @var int */
  private $foo;

  public function __construct(string $foo) {
    $this->foo = 5;
  }

  private function bar() : void {}
}

class B extends A {
  /** @var string */
  private $foo;

  public function __construct(string $foo) {
    $this->foo = $foo;
    parent::__construct($foo);
  }
}
<?php
class A {
    public function __construct() {}
}
class B extends A {
    /**
     * @var int
     */
    private $prop;

    public function __construct()
    {
        parent::__construct();
        $this->prop = 1;
    }
}
class C extends A {
    /**
     * @var int
     */
    private $prop;

    public function __construct()
    {
        parent::__construct();
        $this->prop = 2;
    }
}
<?php
class A {
    /** @var string|null */
    public $foo;

    /** @param mixed $a */
    public function barBar($a): void
    {
        $this->foo = $a;
    }
}
<?php
class C {
    /** @var string|null */
    public $foo;
}

/** @param mixed $a */
function barBar(C $c, $a): void
{
    $c->foo = $a;
}
<?php
class Foo
{
    /** @var int */
    private $status;

    public function __construct(int $in)
    {
        if (rand(0, 1)) {
            $this->status = 1;
        } else {
            $this->status = $in;
        }
    }
}
<?php
class A {
    /** @var int */
    public $a;

    public function __construct() {
        if (rand(0, 1)) {
            $this->foo();
        } else {
            $this->bar();
        }
    }

    private function foo(): void {
        $this->a = 5;
    }

    private function bar(): void {
        $this->a = 5;
    }
}
<?php
class A {
    /**
     * @var mixed
     */
    private $mixed;

    /**
     * @param mixed $value
     */
    public function setMixed($value): void
    {
        $this->mixed = $value;
    }
}
<?php
class A {
    public function __construct() {
        /** @psalm-suppress UndefinedThisPropertyAssignment */
        $this->bar = rand(0, 1) ? "hello" : null;
    }

    /** @psalm-suppress UndefinedThisPropertyFetch */
    public function foo() : void {
        if ($this->bar === null && rand(0, 1)) {}
    }
}
<?php
class A {
    public function __construct() {
        /** @psalm-suppress UndefinedThisPropertyAssignment */
        $this->bar = rand(0, 1) ? "hello" : null;
    }
}

$a = new A();
/** @psalm-suppress UndefinedPropertyFetch */
if ($a->bar === null && rand(0, 1)) {}
<?php
$a = new stdClass();
$a->b = "c";

$d = new SimpleXMLElement("<person><child role=\"son\"></child></person>");
$d->e = "f";
<?php
class A {
    public function aa(): ?string {
        return "bar";
    }
}

class B extends A {
    public static function aa(): ?string {
        return rand(0, 1) ? "bar" : null;
    }
}

class C extends A {
    public static function aa(): ?string {
        return "bar";
    }
}
<?php
interface Foo {
    public static function foo(): ?string;
}

class Bar implements Foo {
    public static function foo(): ?string
    {
        return "bar";
    }
}

class Baz implements Foo {
    /**
     * @return string $baz
     */
    public static function foo(): ?string
    {
        return "baz";
    }
}

class Bax implements Foo {
    /**
     * @return null|string $baz
     */
    public static function foo(): ?string
    {
        return "bax";
    }
}

class Baw implements Foo {
    /**
     * @return null|string $baz
     */
    public static function foo(): ?string
    {
        /** @var null|string $val */
        $val = "baw";

        return $val;
    }
}
<?php
class A {
    /** @var self|null */
    public static $instance;

    /** @var string|null */
    public $bat;

    public function foo() : void {
        if (self::$instance) {
            self::$instance->bar();
            echo self::$instance->bat;
        }
    }

    public function bar() : void {}
}

$a = new A();

if ($a->instance) {
    $a->instance->bar();
    echo $a->instance->bat;
}
<?php
class A {
    /** @var self|null */
    public $instance;

    /** @var string|null */
    public $bat;

    public function foo() : void {
        if ($this->instance) {
            $this->instance->bar();
            echo $this->instance->bat;
        }
    }

    public function bar() : void {}
}

$a = new A();

if ($a->instance) {
    $a->instance->bar();
    echo $a->instance->bat;
}
<?php
class A {
    /** @var static|null */
    public $instance;
}

class B extends A {
    /** @var string|null */
    public $bat;

    public function foo() : void {
        if ($this->instance) {
            $this->instance->bar();
            echo $this->instance->bat;
        }
    }

    public function bar() : void {}
}
<?php
class C {
    /** @psalm-var array<class-string, int> */
    public $member = [
        InvalidArgumentException::class => 1,
    ];
}
<?php
class A {
    /** @var string|null */
    private $foo;

    public function bar() : void {
        if (!$this instanceof B) {
            return;
        }

        $this->foo = "hello";
    }
}

class B extends A {}
<?php
function foo(): stdClass {
    return new stdClass;
}

$b = null;

foreach ([0, 1] as $i) {
    $a = foo();

    if (!empty($a)) {
        $b = $a;
    }
}
<?php
/**
 * @param int $min ref
 * @param int $other
 */
function testmin(&$min, int $other): void {
    if (is_null($min)) {
        $min = 3;
    } elseif (!is_int($min)) {
        $min = 5;
    } elseif ($min < $other) {
        $min = $other;
    }
}
<?php
function test(int $x = null): int {
    if (!$x && !($x = rand(0, 10))) {
        echo "Failed to get non-empty x\n";
        return -1;
    }
    return $x;
}
<?php
/** @param int $i */
function foo($i): void {
    if ($i !== null) {
        $i = (int) $i;

        if ($i) {}
    }
}
<?php
class A {
    /** @var ?int */
    public $foo;
}
class B {}

/**
 * @param  A|B $i
 */
function foo($i): void {
    if (empty($i)) {
        return;
    }

    switch (get_class($i)) {
        case A::class:
            if ($i->foo) {}
            break;

        default:
            break;
    }
}
<?php
class A {}

/**
 * @return A
 */
function getA() {
    return new A();
}

$maybe_a = rand(0, 1) ? new A : null;

if ($maybe_a === null) {
    $maybe_a = getA();
}

if ($maybe_a === null) {}
<?php
if (rand(0, 1)) {
    $a = "hello";
}

if ($a) {}
<?php
class A {
    public function foo(): bool {
        return (bool) rand(0, 1);
    }
    public function bar(): bool {
        return (bool) rand(0, 1);
    }
}

/** @return A */
function makeA() {
    return new A;
}

$a = makeA();

if ($a === null) {
    exit;
}

if ($a->foo() || $a->bar()) {}
<?php
if (rand(0,1)) {
  /** @psalm-suppress UndefinedGlobalVariable */
  $a = $b[0];
} else {
  $a = null;
}
if ($a) {}
<?php
function takesString(string $s): void {
  if (!is_numeric($s) || empty($s)) {}
}
<?php
function trycatch(): void {
    $value = null;
    try {
        if (rand() % 2 > 0) {
            throw new RuntimeException("Failed");
        }
        $value = new stdClass();
        if (rand() % 2 > 0) {
            throw new RuntimeException("Failed");
        }
    } catch (Exception $e) {
        if ($value) {
            var_export($value);
        }
    }

    if ($value) {}
}
<?php
$ch = curl_init();
if (!$ch) {}
<?php
class Node
{
    /** @var Node|null */
    public $next;

    public function iterate(): void
    {
        for ($node = $this; $node !== null; $node = $node->next) {}
    }
}
<?php
function getBool(): bool {
  return (bool)rand(0, 1);
}

function takesBool(bool $b): void {
  if ($b === getBool()) {}
}
<?php
/** @param string $str */
function foo($str): int {
  if (is_null($str)) {
    return 1;
  } else if (strlen($str) < 1) {
    return 2;
  }
  return 2;
}
<?php
function array_check(): void {
    $data = ["f" => false];
    while (rand(0, 1) > 0 && !$data["f"]) {
        $data = ["f" => true];
    }
}
<?php
/** @param mixed $arr */
function foo($arr): void {
 if ($arr["a"] === false) {
    $arr["a"] = (bool) rand(0, 1);
    if ($arr["a"] === false) {}
  }
}
<?php
/** @param string|null $bar */
function foo($bar): void {
    if (!is_null($bar) && !is_string($bar)) {
        throw new \Exception("bad");
    }

    if ($bar !== null) {}
}
<?php
class A {}
class B {}

/** @param A|B $a */
function foo($a) : void {
    if (!is_object($a)) {
        return;
    }

    if ($a instanceof A) {

    } elseif ($a instanceof B) {

    } else {
        throw new \Exception("bad");
    }
}
<?php
function getStrings(): array {
    return ["hello", "world", 50];
}

$a = getStrings();

if (is_string($a[0]) && strlen($a[0]) > 3) {}
<?php
function getData() {
    return rand(0, 1) ? [1, 2, 3] : false;
}

$a = false;

while ($i = getData()) {
    if (!$a && $i[0] === 2) {
        $a = true;
    }

    if ($a === false) {}
}
<?php
if (rand(0,1)) {
    $options = ["option" => true];
}

$option = $options["option"] ?? false;

if ($option) {}
<?php
function foo(int $x) : void {
    $x = $x + 1;

    if (!is_int($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}

function bar(int $x) : void {
    $x = $x + 1;

    if (is_float($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}
<?php
function foo(int $x) : void {
    $x++;

    if (!is_int($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}

function bar(int $x) : void {
    $x++;

    if (is_float($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}
<?php
function foo(int $x) : void {
    if (rand(0, 1)) {
        $x = $x + 1;
    }

    if (is_float($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}
<?php
$concat = "";
foreach (["x", "y"] as $v) {
    if ($concat != "") {
        $concat .= ", ";
    }
    $concat .= "($v)";
}
<?php
$x = ["key" => "value"];
if (rand(0, 1)) {
    $x = [];
}
if ($x) {
    var_export($x);
}
<?php
/** @param array<int, string> $arr */
function foo(array $arr) : void {
    if (array_key_exists(1, $arr)) {
        $a = ($arr[1] === "b") ? true : false;
    }
}
<?php
function foo(string $s) : void {
    if ($s != false ) {}
}
<?php
function foo(string $s) : void {
    if ($s != true ) {}
}
<?php
function foo(bool $s) : void {
    if ($s !== false ) {}
}
<?php
function foo(bool $s) : void {
    if ($s !== true ) {}
}
<?php
function foo(?bool $s) : void {
    if ($s === false ) {} elseif ($s === true) {}
}
<?php
function foo(?bool $s) : void {
    if ($s === true ) {} elseif ($s === false) {}
}
<?php
function foo($a) : void {
    $b = $a ? 1 : 0;
    $c = $a ? 1 : 0;
}
<?php
function foo ($a) : void {
    if (!$a) {}
    $b = $a && rand(0, 1);
}
<?php
function foo(string $t, bool $b) : void {
    if (!$b && $t === "a") {
        return;
    }

    if ($t === "c") {
        if (!$b && bar($t)) {}
    }
}

function bar(string $b) : bool {
    return true;
}
<?php
$y = false;
if ($y) {}
<?php
$y = true;
if (!$y) {}
<?php
$y = true;
if ($y) {}
<?php
class One {
    public function fooFoo() : void {}
}

$var = new One();

if ($var instanceof One) {
    $var->fooFoo();
}
<?php
class A { }

/**
 * @return void
 */
function fooFoo(A $a) {
    if ($a instanceof A) {
    }
}
<?php
class A { }

/**
 * @param  A $a
 * @return void
 */
function fooFoo(A $a) {
    if ($a instanceof A) {
    }
}
<?php
class A { }

/**
 * @param  A $a
 * @return void
 * @psalm-suppress RedundantConditionGivenDocblockType
 */
function fooFoo($a) {
    if ($a instanceof A) {
        if ($a instanceof A) {
        }
    }
}
<?php
$a = rand(0, 10) > 5;
if ($a && $a) {}
<?php
$a = rand(0, 10) > 5;
$b = rand(0, 10) > 5;
if ($a && $b && $a) {}
<?php
$a = rand(0, 10) > 5;
if ($a || $a) {}
<?php
$a = rand(0, 10) > 5;
$b = rand(0, 10) > 5;
if ($a || $b || $a) {}
<?php
$c = rand(0, 10) > 5 ? "hello" : 3;
if (is_int($c) && is_numeric($c)) {}
<?php
$x = rand(0, 10) > 5 ? new stdClass : null;
if ($x instanceof stdClass && $x) {}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one) {
        if (!$one) {
            // do nothing
        }

        $one->fooFoo();
    }
}
<?php
function foo(?string $a, ?string $b): ?string {
    if ($a) {
        $a = null;
    } elseif ($b) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
class A {}

/** @return ?A */
function getA() {
  return rand(0, 1) ? new A : null;
}

function takesA(A $a): void {}

$a = getA();
if ($a instanceof A) {}
/** @psalm-suppress PossiblyNullArgument */
takesA($a);
if ($a instanceof A) {}
<?php
function foo(bool $b) : void {
  if (!$b) {
    $b = true;
  }

  if ($b) {}
}
<?php
function foo(bool $b) : void {
  if ($b) {
    $b = false;
  }

  if ($b) {}
}
<?php
function foo(int $x) : void {
    if (rand(0, 1)) {
        $x = 125;
    }

    if (is_float($x)) {
        echo "Is a float.";
    } else {
        echo "Is an int.";
    }
}
<?php
function foo(int $x) : void {
    $x = $x + 1;

    if (is_int($x)) {
    } elseif (is_int($x)) {}
}
<?php
$x = ["key" => "value"];
if ($x) {
    var_export($x);
}
<?php
function foo(string $s) : void {
    if ($s !== false ) {}
}
<?php
function foo(string $s) : void {
    if ($s !== true ) {}
}
<?php
$s = rand(0, 1) ? rand(0, 5) : false;

if ($s !== false) {
    if (is_int($s)) {}
}
<?php
$s = rand(0, 1) ? rand(0, 5) : true;

if ($s !== true) {
    if (is_int($s)) {}
}
<?php
$i = 5;
echo $i !== null;
<?php
$i = 5;
echo $i !== true;
<?php
$i = 5;
echo $i !== false;
<?php
$i = 5;
echo $i !== 3;
<?php
function foo ($a) : void {
    if (!$a) return;
    $b = $a && rand(0, 1);
}
<?php
/** @return void */
function changeInt(int &$a) {
  $a = "hello";
}
<?php
class A {
  /** @var int */
  private $foo;

    public function __construct(int &$foo) {
        $this->foo = &$foo;
        $foo = "hello";
    }
}

$bar = 5;
$a = new A($bar); // $bar is constrained to an int
$bar = null; // ReferenceConstraintViolation issue emitted
<?php
class A {
  /** @var int */
  private $foo;

    public function __construct(int &$foo) {
        $this->foo = &$foo;
    }
}

$bar = 5;
$a = new A($bar);
$bar = null;
<?php
class A {
    /** @var int */
    private $foo;

    public function __construct(int &$foo) {
        $this->foo = &$foo;
    }
}

class B {
    /** @var string */
    private $bar;

    public function __construct(string &$bar) {
        $this->bar = &$bar;
    }
}

if (rand(0, 1)) {
    $v = 5;
    $c = (new A($v)); // $v is constrained to an int
} else {
    $v = "hello";
    $c =  (new B($v)); // $v is constrained to a string
}

$v = 8;
<?php
/** @return void */
function changeInt(int &$a) {
  $a = 5;
}
<?php
/**
 * @param ?string $str
 * @psalm-suppress PossiblyNullArgument
 */
function nullable_ref_modifier(&$str): void {
    if (strlen($str) > 5) {
        $str = null;
    }
}
<?php
class A {
    /** @var string */
    public $foo = "bar";

    public function &getString() : string {
        return $this->foo;
    }
}

function useString(string &$s) : void {}
$a = new A();

useString($a->getString());
<?php
function s(?string $p): void {}

$var = 1;
$callback = function() use(&$var): void {
    s($var);
};
$var = null;
$callback();
<?php
function testRef() : array {
    $result = [];
    foreach ([1, 2, 1] as $v) {
        $x = &$result;
        if (!isset($x[$v])) {
            $x[$v] = 0;
        }
        $x[$v] ++;
    }
    return $result;
}
<?php
function fooFoo(): string {
    return 5;
}
<?php
function fooFoo(): string {
    return rand(0, 5) ? "hello" : null;
}
<?php
namespace bar;

function fooFoo(): string {
    return 5;
}
<?php
namespace bar;

function fooFoo(): string {
    return rand(0, 5) ? "hello" : null;
}
<?php
function fooFoo() {
    return rand(0, 5) ? "hello" : null;
}
<?php
function fooFoo(array $arr): string {
    /** @psalm-suppress MixedReturnStatement */
    return array_pop($arr);
}
<?php
function fooFoo(array $arr): string {
    return array_pop($arr);
}
<?php
function fooFoo(): A {
    return new A;
}
<?php
/**
 * @psalm-suppress UndefinedClass
 */
function fooFoo(): A {
    return $_GET["a"];
}

fooFoo()->bar();
<?php
/**
 * @return array<?stdClass>
 */
function getBarWithIsset() {
    if (rand() % 2 > 0) return [new stdClass()];
    if (rand() % 2 > 0) return [null];
    return [2];
}
<?php
function getOutput(): resource {
    $res = fopen("php://output", "w");

    if ($res === false) {
        throw new \Exception("Cannot write");
    }

    return $res;
}
<?php
function doSomething(resource $res): void {
}
<?php
function f(void $p): void {}
<?php
class void {}
<?php
function returnsVoid(): void {}

function alsoReturnsVoid(): void {
  return returnsVoid();
}
<?php
/** @return array{a:string,b:string,c:string} */
function foo(): array {
  $arr = [];
  foreach (["a", "b"] as $key) {
    $arr[$key] = "foo";
  }
  return $arr;
}
<?php
/**
 * @return mixed
 */
function a()
{
    return 1;
}

function b(): void
{
    return a();
}
<?php
class A {}
class B extends A {}
interface I {
    /** @return B[] */
    public function foo();
}
class D implements I {
    /** @return A[] */
    public function foo() {
        return [new A, new A];
    }
}
<?php
function foo(): ?string {
  if (rand(0, 1)) return "hello";
}
<?php
function foo(): ?string {
  if (rand(0, 1)) {
    return;
  }

  return "hello";
}
<?php
class A1{}
class B1{}

function testFalseable() : A1 {
    return (rand() % 2 === 0) ? (new B1()) : false;
}
<?php
class A1{}
class B1{}

function testFalseable() : A1 {
    /**
     * @psalm-suppress InvalidReturnStatement
     * @psalm-suppress FalsableReturnStatement
     */
    return (rand() % 2 === 0) ? (new B1()) : false;
}
<?php
/** @return ArrayIterator<int, string> */
function foo(array $a) {
    $obj = new ArrayObject([1, 2, 3, 4]);
    return $obj->getIterator();
}
<?php
/** @return array{a: int, b: int} */
function foo() : array {
    return rand(0, 1) ? ["a" => 1, "b" => 2] : ["a" => 2];
}
<?php
/** @return string[] */
function foo(array $a) : array {
    return $a;
}
<?php
class C {
    public function __invoke(): int {}
}
<?php
class One {}

class B {
    /**
     * @return One|null
     */
    public function barBar() {
        $baz = rand(0,100) > 50 ? new One(): null;

        // should have no effect
        if ($baz === null) {
            $baz = null;
        }

        return $baz;
    }
}
<?php
class B {
    /**
     * @param string|null $str
     * @return string
     */
    public function barBar($str) {
        if (empty($str)) {
            $str = "";
        }
        return $str;
    }
}
<?php
class B {
    /**
     * @param string|null $str
     * @return string
     */
    public function barBar($str) {
        if ($str === "badger") {
            // do nothing
        }
        elseif (empty($str)) {
            $str = "";
        }
        return $str;
    }
}
<?php
class B {
    /**
     * @param string|null $str
     * @return string
     */
    public function barBar($str) {
        if (!empty($str)) {
            // do nothing
        }
        else {
            $str = "";
        }
        return $str;
    }
}
<?php
class B {
    /**
     * @return string|null
     */
    public function barBar() {
        $str = null;
        $bar1 = rand(0, 100) > 40;
        if ($bar1) {
            $str = "";
        }
        return $str;
    }
}
<?php
class A1 {
}
class A2 {
}
class B {
    /**
     * @return A1
     */
    public function barBar(A1 $a1 = null, A2 $a2 = null) {
        if (!$a1) {
            throw new \Exception();
        }
        if (!$a2) {
            throw new \Exception();
        }
        return $a1;
    }
}
<?php
class A1 {
}
class A2 {
}
class B {
    /**
     * @return A1
     */
    public function barBar(A1 $a1 = null, A2 $a2 = null) {
        if (!$a1) {
            throw new \Exception();
        }
        elseif (!$a2) {
            throw new \Exception();
        }
        return $a1;
    }
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        try {
            // do a thing
            return true;
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
            default:
                return true;
        }
    }
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
                $a = 5;
            default:
                return true;
        }
    }
}
<?php
class A {
    /**
     * @psalm-suppress TooManyArguments
     * @return bool
     */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
            case 2:
                return true;

            default:
                throw new \Exception("badness");
        }
    }
}
<?php
abstract class A {
    /** @return static */
    public static function load() {
        return new static();
    }
}

class B extends A {
}

$b = B::load();
<?php
abstract class A {
    /** @return array<int,static> */
    public static function loadMultiple() {
        return [new static()];
    }
}

class B extends A {
}

$bees = B::loadMultiple();
<?php
/**
 * @param  mixed $foo
 * @return bool
 */
function a($foo = null) {
    return isset($foo);
}
<?php
class A {
    /** @return $this */
    public function getThis() {
        return $this;
    }
}
<?php
class A {
    /** @return string|null */
    public function blah() {
        return rand(0, 10) === 4 ? "blah" : null;
    }
}

class B extends A {
    /** @return string */
    public function blah() {
        return "blah";
    }
}

$blah = (new B())->blah();
<?php
interface A {
    /** @return string|null */
    public function blah();
}

class B implements A {
    /** @return string|null */
    public function blah() {
        return rand(0, 10) === 4 ? "blah" : null;
    }
}

$blah = (new B())->blah();
<?php
abstract class A {
    /** @return string|null */
    abstract public function blah();
}

abstract class B extends A {
}

class C extends B {
    /** @return string|null */
    public function blah() {
        return rand(0, 10) === 4 ? "blahblah" : null;
    }
}

$blah = (new C())->blah();
<?php
class A {}
class B extends A {}

/** @return B|A */
function foo() {
  return rand(0, 1) ? new A : new B;
}
<?php
class Foo {
    /** @var Foo|null */
    protected $bar;

    /**
     * @return ?Foo
     */
    function getBarWithIsset() {
        if (isset($this->bar)) return $this->bar;
        return null;
    }
}
<?php
/** @return resource */
function getOutput() {
    $res = fopen("php://output", "w");

    if ($res === false) {
        throw new \Exception("Cannot write");
    }

    return $res;
}
<?php
/** @return resource */
function getOutput() {
    $res = fopen("php://output", "w") or die();

    return $res;
}
<?php
/** @param resource $res */
function doSomething($res): void {
}
<?php
/**
 * @return array<?stdClass>
 */
function getBarWithIsset() {
    if (rand() % 2 > 0) return [new stdClass()];
    return [null];
}
<?php
class A {
    /**
     * @return static
     */
    public function getMe()
    {
        return $this;
    }
}

class B extends A
{
    /**
     * @return static
     */
    public function getMeAgain() {
        return $this->getMe();
    }
}
<?php
class A {
    /**
     * @return static
     */
    public function getMe(): self
    {
        return $this;
    }
}

class B extends A
{
    /**
     * @return static
     */
    public function getMeAgain(): self {
        return $this->getMe();
    }
}
<?php
/** @return bool */
function foo(): bool {
    return true;
}
<?php
function foo1(): Generator {
    foreach ([1, 2, 3] as $i) {
        yield $i;
    }
}

function foo2(): Iterator {
    foreach ([1, 2, 3] as $i) {
        yield $i;
    }
}

function foo3(): Traversable {
    foreach ([1, 2, 3] as $i) {
        yield $i;
    }
}

function foo4(): iterable {
    foreach ([1, 2, 3] as $i) {
        yield $i;
    }
}

foreach (foo1() as $i) echo $i;
foreach (foo2() as $i) echo $i;
foreach (foo3() as $i) echo $i;
foreach (foo4() as $i) echo $i;
<?php
/** @return array{a: int, b?: int} */
function foo() : array {
    return rand(0, 1) ? ["a" => 1, "b" => 2] : ["a" => 2];
}
<?php
/** @return array{a: int, b?: int} */
function foo() : array {
    if (rand(0, 1)) {
        return ["a" => 1, "b" => 2];
    }

    return ["a" => 2];
}
<?php
namespace MyNS;

class Example {
    /** @return array<int,example> */
    public static function test() : array {
        return [new Example()];
    }

    /** @return example */
    public static function instance() {
        return new Example();
    }
}
<?php
/** @return array<int|string, mixed> */
function returnsArray(array $arr) : array {
    return $arr;
}
<?php
namespace Foo;

/**
 * @param scalar $scalar
 *
 * @return scalar
 */
function foo($scalar) {
    switch(random_int(0, 3)) {
        case 0:
            return true;
        case 1:
            return "string";
        case 2:
            return 2;
        case 3:
            return 3.0;
    }

    return 0;
}
<?php
function foo() : bool {
    return true;

    return false;
}
<?php
if (rand(0,100) === 10) {
    $b = "s";
}

echo $b;
<?php
if (rand(0,100) === 10) {
    $array[] = "hello";
}

echo $array;
<?php
$a = "heli";

global $a;
<?php
class A {
    public static function fooFoo() {
        echo $this;
    }
}
<?php
function a(): string {
    static $foo = "foo";

    return $foo;
}
<?php
if (rand(0,100) === 10) {
    $badge = "hello";
}
else {
    $badge = "goodbye";
}

echo $badge;
<?php
if (rand(0,100) === 10) {
    $badge = "hello";
}
else {
    throw new \Exception();
}

echo $badge;
<?php
if ($row = (rand(0, 10) ? [5] : null)) {
    echo $row[0];
}
<?php
if (!($row = (rand(0, 10) ? [5] : null))) {
    // do nothing
}
else {
    echo $row[0];
}
<?php
if (rand(0, 10) > 5) {
    echo "hello";
} elseif ($row = (rand(0, 10) ? [5] : null)) {
    echo $row[0];
}
<?php
if (($row = rand(0,10) ? [1] : false) !== false) {
   echo $row[0];
}
<?php
if (($row = rand(0,10) ? [1] : null) !== null) {
   echo $row[0];
}
<?php
if (null !== ($row = rand(0,10) ? [1] : null)) {
   echo $row[0];
}
<?php
if (null === ($row = rand(0,10) ? [1] : null)) {

} else {
    echo $row[0];
}
<?php
if (preg_match("/bad/", "badger", $matches)) {
    echo (string)$matches[0];
}
<?php
if (!preg_match("/bad/", "badger", $matches)) {
    exit();
}
echo (string)$matches[0];
<?php
$a = (bool)rand(0, 1);
if ($a && preg_match("/bad/", "badger", $matches)) {
    echo (string)$matches[0];
}
<?php
$a = preg_match("/bad/", "badger", $matches) > 0;
if ($a) {
    echo (string)$matches[1];
}
<?php
if (true && function_exists("flabble")) {
    flabble();
}
<?php
class A {
    /** @var A|null */
    public $foo;

    public function __toString(): string {
        return "boop";
    }
}

$a = rand(0, 10) === 5 ? new A(): null;

if (false) {

}
elseif ($a && $a->foo) {
    echo $a;
}
<?php
$foo = "foo";

function a(): string {
    global $foo;

    return $foo;
}
<?php
/**
 * @global string $foo
 */
function a(): string {
    global $foo;

    return $foo;
}
<?php
$a = rand(0, 10) ? "hello" : null;

if (rand(0, 10) > 1 && is_string($a)) {
    throw new \Exception("bad");
}
<?php
$a = rand(0, 10) ? "hello" : null;

if (rand(0, 10) > 1 || is_string($a)) {
    if (is_string($a)) {
        echo strpos("e", $a);
    }
}
<?php
class A {
    public function doThing(): void
    {
        if ($this instanceof B || $this instanceof C) {
            if ($this instanceof B) {

            }
        }
    }
}
class B extends A {}
class C extends A {}
<?php
class Foo {}
class FooBar extends Foo{}
class FooBarBat extends FooBar{}
class FooMoo extends Foo{}

$a = new Foo();

if ($a instanceof FooBar && !$a instanceof FooBarBat) {

} elseif ($a instanceof FooMoo) {

}
<?php
/** @return void */
function foo() {
    static $bar = null;

    if ($bar !== null) {
        // do something
    }

    $bar = 5;
}
<?php
/** @psalm-suppress InvalidScope */
if (!isset($this->value)) {
    $this->value = ["x", "y"];
    echo count($this->value) - 2;
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
                break;
            default:
                return true;
        }
    }
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
                if (rand(0,10) === 5) {
                    break;
                }
            default:
                return true;
        }
    }
}
<?php
class A {
    /** @return bool */
    public function fooFoo() {
        switch (rand(0,10)) {
            case 1:
            case 2:
                return true;
        }
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {

    }
}

class B {
    /** @return void */
    public function barBar() {

    }
}

$a = rand(0, 10) ? new A(): new B();

switch (get_class($a)) {
    case A::class:
        $a->barBar();
        break;
}
<?php
class A {}
class B {}

$a = rand(0, 10) ? new A(): new B();

switch (get_class($a)) {
    case C::class:
        break;
}
<?php
$a = rand(0, 10) ? 1 : "two";

switch (gettype($a)) {
    case "int":
        break;
}
<?php
function testInt(int $var): void {

}

function testString(string $var): void {

}

$a = rand(0, 10) ? 1 : "two";

switch (gettype($a)) {
    case "string":
        testInt($a);

    case "integer":
        testString($a);
}
<?php
function f(string $p): void { }

switch (true) {
    case $q = (bool) rand(0,1):
        f($q); // this type problem is not detected
        break;
}
<?php
switch(2) {
    case 2:
        echo "two\n";
        continue 2;
}
<?php
function foo(string $a) : string {
  switch ($a) {
    case "a":
      return "hello";

    default:
    case "b":
      break;

    case "c":
      return "goodbye";
  }
}
<?php
$a = rand(0, 1);
switch ($a) {
    case 0:
        break;

    case 0:
        echo "I never get here";
}
<?php
$a = rand(0, 1) ? "a" : "b";

switch ($a) {
    case "a":
        break;

    case "b":
        break;

    case "c":
        echo "impossible";
}
<?php
$a = rand(0, 1) ? "a" : "b";

switch ($a) {
    case "a":
        break;

    case "b":
        break;

    default:
        echo "impossible";
}
<?php
function foo(int $i) : void {
    switch ($i) {
        case 0:
            if (rand(0, 1)) {
                break;
            }

        default:
            $a = true;
    }

    if ($a) {}
}
<?php
/** @return void */
function foo(Exception $e) {
    switch (get_class($e)) {
        case "InvalidArgumentException":
            $e->getMessage();
            break;
    }
}
<?php
class A {
    /**
     * @return void
     */
    public function fooFoo() {

    }
}

class B {
    /**
     * @return void
     */
    public function barBar() {

    }
}

$a = rand(0, 10) ? new A(): new B();

switch (get_class($a)) {
    case A::class:
        $a->fooFoo();
        break;

    case B::class:
        $a->barBar();
        break;
}
<?php
/** @return void */
function foo(Exception $e) {
    switch (get_class($e)) {
        case InvalidArgumentException::class:
            $e->getMessage();
            break;

        case LogicException::class:
            $e->getMessage();
            break;
    }
}


<?php
class A {}
class B extends A {
  public function foo(): void {}
}

function takesA(A $a): void {
  $class = get_class($a);
  switch ($class) {
    case B::class:
      $a->foo();
      break;
  }
}
<?php
function testInt(int $var): void {

}

function testString(string $var): void {

}

$a = rand(0, 10) ? 1 : "two";

switch (gettype($a)) {
    case "string":
        testString($a);
        break;

    case "integer":
        testInt($a);
        break;
}
<?php
class A {
   /**
    * @var ?string
    */
   public $a = null;
   /**
    * @var ?string
    */
   public $b = null;
}
function f(A $obj): string {
  switch (true) {
    case $obj->a !== null:
      return $obj->a; // definitely not null
    case !is_null($obj->b):
      return $obj->b; // definitely not null
    default:
      throw new \InvalidArgumentException("$obj->a or $obj->b must be set");
  }
}
<?php
class A {
   /**
    * @var ?string
    */
   public $a = null;
   /**
    * @var ?string
    */
   public $b = null;
}
function f(A $obj): string {
  switch (true) {
    case $obj->a:
      return $obj->a; // definitely not null
    case $obj->b:
      return $obj->b; // definitely not null
    default:
      throw new \InvalidArgumentException("$obj->a or $obj->b must be set");
  }
}
<?php
class A {}

function foo(): A {
    switch (rand(0,1)) {
        case true:
            return new A;
            break;
        default:
            return new A;
    }
}
<?php
switch (true) {
    case preg_match("/(d)ata/", "some data in subject string", $matches):
        return $matches[1];
    default:
        throw new RuntimeException("none found");
}
<?php
$x = false;
$y = false;

foreach ([1, 2, 3] as $v)  {
    switch($v) {
        case 3:
            $y = true;
            break;
        case 2:
            $x = true;
            break;
        default:
            break;
    }
}
<?php
switch(2) {
    case 2:
        echo "two\n";
        continue;
}
<?php
function foo(string $a) : string {
  switch ($a) {
    case "a":
      return "hello";

    default:
    case "b":
      return "goodbye";
  }
}
<?php
$a = new A;

switch (rand(0,1)) {
    case 0:
    case 1:
        $dt = $a->maybeReturnsDT();
        if (!is_null($dt)) {
            $dt = $dt->format(\DateTime::ISO8601);
        }
        break;
}

class A {
    public function maybeReturnsDT(): ?\DateTimeInterface {
        return rand(0,1) ? new \DateTime("now") : null;
    }
}
<?php
function foo() : void {
    switch(rand() % 4) {
        case 0:
            echo "here";
            break;
        case 1:
            $x = rand() % 4;
        case 2:
            if (isset($x) && $x > 2) {
                echo "$x is large";
            }
            break;
    }
}
<?php
class A {}
class B extends A {}
class C extends A {}
class D extends A {}

function foo(A $a) : void {
    switch(get_class($a)) {
        case B::class:
        case C::class:
        case D::class:
            echo "goodbye";
    }
}
<?php
function foo(string $s) : void {
    switch($s) {
        case "a":
        case "b":
        case "c":
            echo "goodbye";
    }
}
<?php
$a = rand(0, 1) ? "a" : "b";

switch ($a) {
    case "a":
        $foo = "hello";
        break;

    case "b":
        $foo = "goodbye";
        break;
}

echo $foo;
<?php
$a = rand(0, 1) ? "a" : "b";

switch ($a) {
    case "a":
        break;

    case "b":
        break;

    default:
        throw new \Exception("should never happen");
}
<?php
function foo(int $a, int $b, int $c) : void {
    switch ($a) {
        case $b:
            break;
        case $c:
            break;
    }
}
<?php
function foo(?string $s) : void {
    switch ($s) {
        case "hello":
        case "goodbye":
            echo "cool";
            break;
        case "hello again":
            echo "cool";
            break;
    }
}
<?php
function foo(?string $s) : void {
    switch ($s) {
        case "hello":
            echo "cool";
        case "goodbye":
            echo "cooler";
            break;
        case "hello again":
            echo "cool";
            break;
    }
}
<?php
function foo(?string $s) : void {
    switch ($s) {
        case "hello":
            echo "cool";
            break;
        case "goodbye":
            echo "cool";
            break;
        case "hello again":
            echo "cool";
            break;
    }
}
<?php
function foo(?string $s, string $a, string $b) : void {
    switch ($s) {
        case $a:
        case $b:
            break;
    }
}
<?php
function r() : bool {
    return (bool)rand(0, 1);
}

function foo(string $s) : void {
    if (($s === "a" || $s === "b")
        && ($s === "a" || r())
        && ($s === "b" || r())
        && (r() || r())
    ) {
        // do something
    } else {
        return;
    }

    switch ($s) {
        case "a":
            break;
        case "b":
            break;
    }
}
<?php
function foo (string $s) : void {
    if ($s === "a" && rand(0, 1)) {

    } elseif ($s === "b" && rand(0, 1)) {

    } else {
        return;
    }

    switch ($s) {
        case "a":
            echo "hello";
            break;
        case "b":
            echo "goodbye";
            break;
    }
}
<?php
/**
 * @param "a"|"b" $s
 */
function foo(string $s) : string {
    switch ($s) {
        case "a":
            return "hello";

        case "b":
        return "goodbye";
    }
}
<?php
switch (rand(0, 4)) {
    case 0:
        $b = 2;
        if (rand(0, 1)) {
            $a = false;
            break;
        }

    default:
        $a = true;
        $b = 1;
}
<?php
$a = false;
switch (rand(0, 4)) {
    case 0:
        $b = 1;
        if (rand(0, 1)) {
            $a = false;
            break;
        }

    default:
        $a = true;
}
<?php
function f(string $a) : void {
    switch ($a) {
        case "a":
        case "b":
        case "c":
        case "d":
        case "e":
        case "f":
        case "g":
        case "h":
        case "i":
        case "j":
        case "k":
        case "l":
        case "m":
        case "n":
        case "o":
        case "p":
        case "q":
        case "r":
        case "s":
        case "t":
        case "u":
        case "v":
        case "w":
        case "x":
        case "y":
        case "z":
        case "A":
        case "B":
        case "C":
        case "D":
        case "E":
            return;
    }
}
<?php
namespace FooFoo;

/**
 * @template T
 * @param T $x
 * @return T
 */
function foo($x) {
    return $x;
}

function bar(string $a): void { }

bar(foo(4));
<?php
namespace FooFoo;

class A {
    /**
     * @template T
     * @param T $x
     * @return T
     */
    public static function foo($x) {
        return $x;
    }
}

function bar(string $a): void { }

bar(A::foo(4));
<?php
namespace FooFoo;

class A {
    /**
     * @template T
     * @param T $x
     * @return T
     */
    public function foo($x) {
        return $x;
    }
}

function bar(string $a): void { }

bar((new A())->foo(4));
<?php
/**
 * @template TKey
 * @template TValue
 * @param Traversable<TKey, TValue> $t
 * @return array<TKey, TValue>
 */
function f(Traversable $t): array {
    $ret = [];
    foreach ($t as $k => $v) $ret[$k] = $v;
    return $ret;
}

function g():Generator { yield new stdClass; }

takesArrayOfStdClass(f(g()));

/** @param array<stdClass> $p */
function takesArrayOfStdClass(array $p): void {}
<?php
/** @template T */
class Foo
{
    /**
     * @psalm-var class-string
     */
    private $type;

    /** @var array<T> */
    private $items;

    /**
     * @param class-string $type
     * @template-typeof T $type
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [A::class, B::class], true)) {
            throw new \InvalidArgumentException;
        }
        $this->type = $type;
        $this->items = [];
    }

    /** @param T $item */
    public function add($item): void
    {
        $this->items[] = $item;
    }
}

class A {}
class B {}


$foo = new Foo(A::class);
$foo->add(new B);
<?php
/** @template T */
class Foo
{
    /**
     * @psalm-var class-string
     */
    private $type;

    /** @var array<T> */
    private $items;

    /**
     * @param T::class $type
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [A::class, B::class], true)) {
            throw new \InvalidArgumentException;
        }
        $this->type = $type;
        $this->items = [];
    }

    /** @param T $item */
    public function add($item): void
    {
        $this->items[] = $item;
    }
}

class A {}
class B {}

$foo = new Foo(A::class);
$foo->add(new B);
<?php
final class State
{}

interface Foo
{}

function type(string ...$_p): void {}

/**
 * @template T
 */
final class AlmostFooMap
{
    /**
     * @param callable(State):(T&Foo) $closure
     */
    public function __construct(callable $closure)
    {
        type($closure);
    }
}
<?php
class Foo {}
class NotFoo {}

/**
 * @template T as Foo
 * @param T $x
 * @return T
 */
function bar($x) {
    return $x;
}

bar(new NotFoo());
<?php
interface Foo {}
interface NotFoo {}

/**
 * @template T as Foo
 * @param T $x
 * @return T
 */
function bar($x) {
    return $x;
}

function takesNotFoo(NotFoo $f) : void {
    bar($f);
}
<?php
namespace A\B;

class C {}

/**
 * @template T as C
 * @param T $some_t
 */
function foo($some_t) : void {
    $some_t->bar();
}
<?php
namespace A\B;

/**
 * @template T
 * @param T $some_t
 * @return T
 */
function foo($some_t) : void {
    $some_t->bar();
}
<?php
class A {}
class B {}
class C {}
class D {}

/**
 * @template T as object
 */
class Foo {
    /** @var T::class */
    public $T;

    /**
     * @param class-string $T
     * @template-typeof T $T
     */
    public function __construct(string $T) {
        $this->T = $T;
    }

    /**
     * @return T
     */
    public function bar() {
        $t = $this->T;
        return new $t();
    }
}

$at = "A";

/** @var Foo<A> */
$afoo = new Foo($at);
$afoo_bar = $afoo->bar();

$bfoo = new Foo(B::class);
$bfoo_bar = $bfoo->bar();

// this shouldn’t cause a problem as it’s a docbblock type
if (!($bfoo_bar instanceof B)) {}

$c = C::class;
$cfoo = new Foo($c);
$cfoo_bar = $cfoo->bar();
<?php
/**
 * @template T as object
 */
class Foo {
    /** @var T::class */
    public $T;

    /**
     * @param class-string $T
     * @template-typeof T $T
     */
    public function __construct(string $T) {
        $this->T = $T;
    }

    /**
     * @return T
     */
    public function bar() {
        $t = $this->T;
        return new $t();
    }
}

class E {
    /**
     * @return Foo<self>
     */
    public static function getFoo() {
        return new Foo(__CLASS__);
    }

    /**
     * @return Foo<self>
     */
    public static function getFoo2() {
        return new Foo(self::class);
    }

    /**
     * @return Foo<static>
     */
    public static function getFoo3() {
        return new Foo(static::class);
    }
}

class G extends E {}

$efoo = E::getFoo();
$efoo2 = E::getFoo2();
$efoo3 = E::getFoo3();

$gfoo = G::getFoo();
$gfoo2 = G::getFoo2();
$gfoo3 = G::getFoo3();
<?php
/**
 * @template T as object
 */
class Foo {
    /** @var T::class */
    public $T;

    /**
     * @param class-string $T
     * @template-typeof T $T
     */
    public function __construct(string $T) {
        $this->T = $T;
    }

    /**
     * @return T
     */
    public function bar() {
        $t = $this->T;
        return new $t();
    }
}

$efoo = new Foo(\Exception::class);
$efoo_bar = $efoo->bar();

$ffoo = new Foo(\LogicException::class);
$ffoo_bar = $ffoo->bar();
<?php
class A {}

/**
 * @template T
 */
class Foo {
    /** @var T */
    public $obj;

    /**
     * @param T $obj
     */
    public function __construct($obj) {
        $this->obj = $obj;
    }

    /**
     * @return T
     */
    public function bar() {
        return $this->obj;
    }

    /**
     * @return T
     */
    public function bat() {
        return $this->bar();
    }

    public function __toString(): string {
        return "hello " . $this->obj;
    }
}

$afoo = new Foo(new A());
$afoo_bar = $afoo->bar();
<?php
namespace Phan\Library;

/**
 * An abstract tuple.
 */
abstract class Tuple
{
    const ARITY = 0;

    /**
     * @return int
     * The arity of this tuple
     */
    public function arity(): int
    {
        return (int)static::ARITY;
    }

    /**
     * @return array
     * An array of all elements in this tuple.
     */
    abstract public function toArray(): array;
}

/**
 * A tuple of 1 element.
 *
 * @template T0
 * The type of element zero
 */
class Tuple1 extends Tuple
{
    /** @var int */
    const ARITY = 1;

    /** @var T0 */
    public $_0;

    /**
     * @param T0 $_0
     * The 0th element
     */
    public function __construct($_0) {
        $this->_0 = $_0;
    }

    /**
     * @return int
     * The arity of this tuple
     */
    public function arity(): int
    {
        return (int)static::ARITY;
    }

    /**
     * @return array
     * An array of all elements in this tuple.
     */
    public function toArray(): array
    {
        return [
            $this->_0,
        ];
    }
}

/**
 * A tuple of 2 elements.
 *
 * @template T0
 * The type of element zero
 *
 * @template T1
 * The type of element one
 *
 * @inherits Tuple1<T0>
 */
class Tuple2 extends Tuple1
{
    /** @var int */
    const ARITY = 2;

    /** @var T1 */
    public $_1;

    /**
     * @param T0 $_0
     * The 0th element
     *
     * @param T1 $_1
     * The 1st element
     */
    public function __construct($_0, $_1) {
        parent::__construct($_0);
        $this->_1 = $_1;
    }

    /**
     * @return array
     * An array of all elements in this tuple.
     */
    public function toArray(): array
    {
        return [
            $this->_0,
            $this->_1,
        ];
    }
}

$a = new Tuple2("cool", 5);

/** @return void */
function takes_int(int $i) {}

/** @return void */
function takes_string(string $s) {}

takes_string($a->_0);
takes_int($a->_1);
<?php
namespace FooFoo;

/**
 * @template T
 * @param T $x
 * @return T
 */
function foo($x) {
    return $x;
}

function bar(string $a): void { }

bar(foo("string"));
<?php
namespace FooFoo;

/**
 * @psalm-template T
 * @psalm-param T $x
 * @psalm-return T
 */
function foo($x) {
    return $x;
}

function bar(string $a): void { }

bar(foo("string"));
<?php
namespace FooFoo;

class A {
    /**
     * @template T
     * @param T $x
     * @return T
     */
    public static function foo($x) {
        return $x;
    }
}

function bar(string $a): void { }

bar(A::foo("string"));
<?php
namespace FooFoo;

class A {
    /**
     * @template T
     * @param T $x
     * @return T
     */
    public function foo($x) {
        return $x;
    }
}

function bar(string $a): void { }

bar((new A())->foo("string"));
<?php
/**
 * @template T
 *
 * @param array<T, mixed> $arr
 * @return array<int, T>
 */
function my_array_keys($arr) {
    return array_keys($arr);
}

$a = my_array_keys(["hello" => 5, "goodbye" => new \Exception()]);
<?php
/**
 * @template TKey
 * @template TValue
 *
 * @param array<TKey, TValue> $arr
 * @return array<TValue, TKey>
 */
function my_array_flip($arr) {
    return array_flip($arr);
}

$b = my_array_flip(["hello" => 5, "goodbye" => 6]);
<?php
/**
 * @template TValue
 * @template TKey
 *
 * @param array<TKey, TValue> $arr
 */
function byRef(array &$arr) : void {}

$b = ["a" => 5, "c" => 6];
byRef($b);
<?php
/**
 * @template TValue
 *
 * @param array<mixed, TValue> $arr
 */
function byRef(array &$arr) : void {}

$b = ["a" => 5, "c" => 6];
byRef($b);
<?php
/**
 * @template TValue
 *
 * @param array<mixed, TValue> $arr
 * @return TValue|null
 */
function my_array_pop(array &$arr) {
    return array_pop($arr);
}

/** @var mixed */
$b = ["a" => 5, "c" => 6];
$a = my_array_pop($b);
<?php
/**
 * @template TValue
 * @template TKey
 *
 * @param array<TKey, TValue> $arr
 * @return TValue|null
 */
function my_array_pop(array &$arr) {
    return array_pop($arr);
}

$b = ["a" => 5, "c" => 6];
$a = my_array_pop($b);
<?php
namespace NS;
use Countable;

/** @template T */
class Collection
{
    /** @psalm-var iterable<T> */
    private $data;

    /** @psalm-param iterable<T> $data */
    public function __construct(iterable $data) {
        $this->data = $data;
    }
}

class Item {}
/** @psalm-param Collection<Item> $c */
function takesCollectionOfItems(Collection $c): void {}

/** @psalm-var iterable<Item> $data2 */
$data2 = [];
takesCollectionOfItems(new Collection($data2));

/** @psalm-var iterable<Item>&Countable $data */
$data = [];
takesCollectionOfItems(new Collection($data));
<?php
namespace NS;

/**
 * @template T
 * @psalm-param callable():T $action
 * @psalm-return T
 */
function retry(int $maxRetries, callable $action) {
    return $action();
}

function takesInt(int $p): void{};

takesInt(retry(1, function(): int { return 1; }));
<?php
namespace NS;

/**
 * @template T
 * @psalm-param \Closure():T $action
 * @psalm-return T
 */
function retry(int $maxRetries, callable $action) {
    return $action();
}

function takesInt(int $p): void{};

takesInt(retry(1, function(): int { return 1; }));
<?php
namespace NS;

use Closure;

/**
 * @template TKey
 * @template TValue
 */
class ArrayCollection {
    /** @var array<TKey,TValue> */
    private $data;

    /** @param array<TKey,TValue> $data */
    public function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * @template T
     * @param Closure(TValue):T $func
     * @return ArrayCollection<TKey,T>
     */
    public function map(Closure $func) {
      return new static(array_map($func, $this->data));
    }
}

class Item {}
/**
 * @param ArrayCollection<mixed,Item> $i
 */
function takesCollectionOfItems(ArrayCollection $i): void {}

$c = new ArrayCollection([ new Item ]);
takesCollectionOfItems($c);
takesCollectionOfItems($c->map(function(Item $i): Item { return $i;}));
takesCollectionOfItems($c->map(function(Item $i): Item { return $i;}));
<?php
/**
 * @template TKey
 * @template TValue
 * @param Traversable<TKey, TValue> $t
 * @return array<TKey, TValue>
 */
function f(Traversable $t): array {
    $ret = [];
    foreach ($t as $k => $v) $ret[$k] = $v;
    return $ret;
}

/** @return Generator<int, stdClass> */
function g():Generator { yield new stdClass; }

takesArrayOfStdClass(f(g()));

/** @param array<stdClass> $p */
function takesArrayOfStdClass(array $p): void {}
<?php
/** @template T */
class Foo
{
    /**
     * @psalm-var class-string
     */
    private $type;

    /** @var array<T> */
    private $items;

    /**
     * @param class-string $type
     * @template-typeof T $type
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [A::class, B::class], true)) {
            throw new \InvalidArgumentException;
        }
        $this->type = $type;
        $this->items = [];
    }

    /** @param T $item */
    public function add($item): void
    {
        $this->items[] = $item;
    }
}

class FooFacade
{
    /**
     * @template T
     * @param  T $item
     */
    public function add($item): void
    {
        $foo = $this->ensureFoo([$item]);
        $foo->add($item);
    }

    /**
     * @template T
     * @param  array<mixed,T> $items
     * @return Foo<T>
     */
    private function ensureFoo(array $items): EntitySeries
    {
        $type = $items[0] instanceof A ? A::class : B::class;
        return new Foo($type);
    }
}

class A {}
class B {}
<?php
/**
 * @template TKey
 * @template TValue
 */
class Collection {
    /**
     * @param Closure(TValue):bool $p
     * @return Collection<TKey,TValue>
     */
    public function filter(Closure $p);
}
class I {}

/** @var Collection<mixed,Collection<mixed,I>> $c */
$c = new Collection;

$c->filter(
  /** @param Collection<mixed,I> $elt */
  function(Collection $elt): bool { return (bool) rand(0,1); }
);

$c->filter(
  /** @param Collection<mixed,I> $elt */
  function(Collection $elt): bool { return true; }
);
<?php
/**
 * @template TKey
 * @template TValue
 *
 * @param array<TKey, TValue> $arr
 * @param array $arr2
 * @return array<TKey, TValue>
 */
function splat_proof(array $arr, array $arr2) {
    return $arr;
}

$foo = [
    [1, 2, 3],
    [1, 2],
];

$a = splat_proof(... $foo);
<?php
function acceptsStdClass(stdClass $_p): void {}

$q = [new stdClass];
acceptsStdClass(fNoRef($q));
acceptsStdClass(fRef($q));
acceptsStdClass(fNoRef($q));

/**
 * @template TKey
 * @template TValue
 *
 * @param array<TKey, TValue> $_arr
 * @return null|TValue
 * @psalm-ignore-nullable-return
 */
function fRef(array &$_arr) {
    return array_shift($_arr);
}

/**
 * @template TKey
 * @template TValue
 *
 * @param array<TKey, TValue> $_arr
 * @return null|TValue
 * @psalm-ignore-nullable-return
 */
function fNoRef(array $_arr) {
    return array_shift($_arr);
}
<?php
namespace NS;

/**
 * @template TKey
 * @template TValue
 */
interface ICollection extends \IteratorAggregate {
    /** @return \Traversable<TKey,TValue> */
    public function getIterator();
}

class Collection implements ICollection {
    /** @var array */
    private $data;
    public function __construct(array $data) {
        $this->data = $data;
    }
    /** @psalm-suppress LessSpecificImplementedReturnType */
    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->data);
    }
}

/** @var ICollection<string, int> */
$c = new Collection(["a" => 1]);

foreach ($c as $k => $v) { atan($v); strlen($k); }
<?php
namespace NS;

/**
 * @template TKey
 * @template TValue
 */
interface ICollection extends \IteratorAggregate {
    /** @return \Traversable<TKey,TValue> */
    public function getIterator();
}

class Collection implements ICollection {
    /** @var array */
    private $data;
    public function __construct(array $data) {
        $this->data = $data;
    }
    /** @psalm-suppress LessSpecificImplementedReturnType */
    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->data);
    }
}

/** @var ICollection<string, int> */
$c = new Collection(["a" => 1]);

foreach ($c->getIterator() as $k => $v) { atan($v); strlen($k); }
<?php
class SomeIterator implements IteratorAggregate
{
    /**
     * @return Generator<int, int>
     */
    function getIterator()
    {
        yield 1;
    }
}

/** @param \IteratorAggregate<mixed, int> $i */
function takesIteratorOfInts(\IteratorAggregate $i) : void {
    foreach ($i as $j) {
        echo $j;
    }
}

takesIteratorOfInts(new SomeIterator());
<?php
interface Foo {}

interface AlmostFoo {
    /**
     * @return Foo
     */
    public function makeFoo();
}

/**
 * @template T
 */
final class AlmostFooMap implements AlmostFoo {
    /** @var T&Foo */
    private $bar;

    /**
     * @param T&Foo $closure
     */
    public function __construct(Foo $bar)
    {
        $this->bar = $bar;
    }

    /**
     * @return T&Foo
     */
    public function makeFoo()
    {
        return $this->bar;
    }
}
<?php
namespace Bar;

/** @template T */
class Foo
{
    /**
     * @psalm-var T::class
     */
    private $type;

    /** @var array<T> */
    private $items;

    /**
     * @param T::class $type
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [A::class, B::class], true)) {
            throw new \InvalidArgumentException;
        }
        $this->type = $type;
        $this->items = [];
    }

    /** @param T $item */
    public function add($item): void
    {
        $this->items[] = $item;
    }
}

class A {}
class B {}

$foo = new Foo(A::class);
$foo->add(new A);
<?php
class Foo {}
class FooChild extends Foo {}

/**
 * @template T as Foo
 * @param T $x
 * @return T
 */
function bar($x) {
    return $x;
}

bar(new Foo());
bar(new FooChild());
<?php
interface Foo {}
interface FooChild extends Foo {}
class FooImplementer implements Foo {}

/**
 * @template T as Foo
 * @param T $x
 * @return T
 */
function bar($x) {
    return $x;
}

function takesFoo(Foo $f) : void {
    bar($f);
}

function takesFooChild(FooChild $f) : void {
    bar($f);
}

function takesFooImplementer(FooImplementer $f) : void {
    bar($f);
}
<?php
namespace A\B;

interface Foo {}

interface IFooGetter {
    /**
     * @return Foo
     */
    public function getFoo();
}

/**
 * @template T as Foo
 */
class FooGetter implements IFooGetter {
    /** @var T */
    private $t;

    /**
     * @param T $t
     */
    public function __construct(Foo $t)
    {
        $this->t = $t;
    }

    /**
     * @return T
     */
    public function getFoo()
    {
        return $this->t;
    }
}

function passFoo(Foo $f) : Foo {
    return (new FooGetter($f))->getFoo();
}
<?php
namespace A\B;

class C {
    public function bar() : void {}
}

interface D {}

/**
 * @template T as C
 * @return T
 */
function foo($some_t) : C {
    /** @var T */
    $a = $some_t;
    $a->bar();

    /** @var T&D */
    $b = $some_t;
    $b->bar();

    /** @var D&T */
    $b = $some_t;
    $b->bar();

    return $a;
}
<?php
class A {}
echo (new A);
<?php
class A {}
echo (string)(new A);
<?php
class A {
    function __toString(): void { }
}
<?php
class A {
    function __toString() { }
}
<?php declare(strict_types=1);
class A {
    public function __toString(): string
    {
        return "hello";
    }
}

function fooFoo(string $b): void {}
fooFoo(new A());
<?php
class A {
    public function __toString(): string
    {
        return "hello";
    }
}

function fooFoo(string $b): void {}
fooFoo(new A());
<?php
interface I {
    public function __toString();
}

function takesString(string $str): void { }

function takesI(I $i): void
{
    takesString($i);
}
<?php
interface I {
    public function __toString();
}

function takesI(I $i): void
{
    $a = $i . "hello";
}
<?php
function takesString(string $s) : void {}
$a = fopen("php://memory", "r");
takesString($a);
<?php
class A {
    function __toString() {
        return "hello";
    }
}
echo (new A);
<?php
class A {
    function __toString() {
        return "hello";
    }
}
class B {
    function __toString() {
        return "goodbye";
    }
}
class C extends B {}

$c = new C();
echo (string) $c;
<?php
class A {
    public function __toString(): string
    {
        return "hello";
    }
}

/** @param string|A $b */
function fooFoo($b): void {}

/** @param A|string $b */
function barBar($b): void {}

fooFoo(new A());
barBar(new A());
<?php
$a = fopen("php://memory", "r");
if ($a === false) exit;
$b = (string) $a;
<?php
class A {
    public function __toString() {
        return "A";
    }
}

/** @param string|object $s */
function foo($s) : void {}

foo(new A);
<?php
trait T {
    private function fooFoo(): void {
    }
}

class B {
    use T;
}

class C extends B {
    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
class B {
    use A;
}
<?php
trait T {
    public $foo;
}
class A {
    use T;

    public function assignToFoo(): void {
        $this->foo = 5;
    }
}
<?php
trait T {
    public $foo;
}
class A {
    use T;

    public function __construct() {
        $this->foo = 5;
    }
}
<?php
trait T {
    public $foo;
}
class A {
    use T;

    public function __construct() {
        $this->foo = 5;
    }

    public function makeNull(): void {
        $this->foo = null;
    }
}
<?php
trait T {
    public $foo = null;
}
class A {
    use T;

    public function __construct() {
        $this->foo = 5;
    }
}
<?php
trait T {
    public function fooFoo(): void {
    }
}

class B {
    use T;
}

class C extends B {
    public function fooFoo(string $a): void {
    }
}
<?php
trait T {
    public $foo;
}

class A {
    use T;
}
<?php
trait A {
    public function foo() : string {
        return 5;
    }
}

trait B {
    use A;
}

class C {
    use B;
}
<?php
trait T {
    protected function foo() : void {}

    public function bat() : void {
        $this->foo();
    }
}

class C {
    use T;

    protected function foo(string $s) : void {}
}
<?php
trait T {
    private function fooFoo(): void {
    }
}

class B {
    use T;

    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    protected function fooFoo(): void {
    }
}

class B {
    use T;

    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    public function fooFoo(): void {
    }
}

class B {
    use T;

    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    /** @var string */
    private $fooFoo = "";
}

class B {
    use T;

    public function doFoo(): void {
        echo $this->fooFoo;
        $this->fooFoo = "hello";
    }
}
<?php
trait T {
    /** @var string */
    protected $fooFoo = "";
}

class B {
    use T;

    public function doFoo(): void {
        echo $this->fooFoo;
        $this->fooFoo = "hello";
    }
}
<?php
trait T {
    /** @var string */
    public $fooFoo = "";
}

class B {
    use T;

    public function doFoo(): void {
        echo $this->fooFoo;
        $this->fooFoo = "hello";
    }
}
<?php
trait T {
    protected function fooFoo(): void {
    }
}

class B {
    use T;
}

class C extends B {
    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    public function fooFoo(): void {
    }
}

class B {
    use T;
}

class C extends B {
    public function doFoo(): void {
        $this->fooFoo();
    }
}
<?php
trait T {
    public function fooFoo(): void {
        self::barBar();
    }
}

class B {
    use T;

    public static function barBar(): void {

    }
}
<?php
trait T {
    public function fooFoo(): void {
    }
}

class B {
    use T;

    public function fooFoo(string $a): void {
    }
}

(new B)->fooFoo("hello");
<?php
trait T {
    public function fooFoo(): void {
    }
}

class B {
    use T {
        fooFoo as barBar;
    }

    public function fooFoo(): void {
        $this->barBar();
    }
}
<?php
trait T {
    public function g(): self
    {
        return $this;
    }
}

class A {
    use T;
}

$a = (new A)->g();
<?php
trait T {
    public function g(): self
    {
        return $this;
    }
}

class A {
    use T;
}

class B extends A {
}

class C {
    use T;
}

$a = (new B)->g();
<?php
trait T {
    /** @return void */
    public static function foo() {}
}
class A {
    use T;

    /** @return void */
    public function bar() {
        T::foo();
    }
}
<?php
trait T {
    /** @return void */
    abstract public function foo();
}

abstract class A {
    use T;

    /** @return void */
    public function bar() {
        $this->foo();
    }
}
<?php
trait T {
  public function f(): void {
    if ($this instanceof A) { }
  }
}

class A {
  use T;
}

class B {
  use T;
}
<?php
trait T {
    public function f(): void {
        if (get_class($this) === B::class) {
            $this->foo();
        }
    }
}

class A {
    use T;
}

class B {
    use T;

    public function foo() : void {}
}
<?php
trait T {
    public function f(): void {
        if (static::class === B::class) {
            $this->foo();
        }
    }
}

class A {
    use T;
}

class B {
    use T;

    public function foo() : void {}
}
<?php
trait T {
    public function f(): void {
        if (is_a(static::class, "B")) { }
    }
}

class A {
    use T;
}

class B {
    use T;

    public function foo() : void {}
}
<?php
trait T {
  abstract public function foo(): void;
}

class A {
  public function foo(): void {}
}
<?php
trait T {
  abstract public function foo(): void;
}

abstract class A {
  public function foo(): void {}
}

class B extends A {
  use T;
}
<?php
trait T {
  public function foo(): void {}
}

abstract class A {
  abstract public function foo(): void {}
}

class B extends A {
  use T;
}
<?php
trait T {
    public static function getSelf(): self {
        return new self();
    }

    public static function callGetSelf(): self {
        return self::getSelf();
    }
}

class A {
    use T;
}

class B {
    use T;
}
<?php
trait T {
  public function foo(): void {
    parent::foo();
  }
}
class A {
  public function foo(): void {}
}
class B extends A {
  use T;
}
<?php
namespace Classes {
  use Traits\T;

  class A {}

  class B {
    use T;
  }
}

namespace Traits {
  use Classes\A;

  trait T {
    public function getA() : A {
      return new A;
    }
  }
}

namespace {
    $a = (new Classes\B)->getA();
}
<?php
class C
{
    use T2;
    use T1 {
        traitFunc as _func;
    }

    public static function func(): void
    {
        static::_func();
    }
}
trait T1
{
    public static function traitFunc(): void {}
}
trait T2 { }
<?php
class C
{
    use T1 {
        traitFunc as _func;
    }
    use T2;

    public static function func(): void
    {
        static::_func();
    }
}
trait T1
{
    public static function traitFunc(): void {}
}
trait T2 { }
<?php
trait T {
    abstract public function foo() : void;

    public function callFoo() : void {
        $this->foo();
    }
}

class A {
    use T;

    public function foo(string $s = null) : void {

    }
}
<?php
trait T {
    public function foo() : int {
        return $this->bar();
    }

    public function bar() : int {
        return 3;
    }
}

class A {
    use T {
        bar as bat;
    }

    public function baz() : int {
        return $this->bar();
    }
}
<?php
trait T {
    public function bar() : int {
        return 3;
    }
}

class A {
    use T {
        bar as bat;
    }

    public function bar() : string {
        return "hello";
    }

    public function baz() : string {
        return $this->bar();
    }
}
<?php
trait T {
    protected function foo() : void {}

    public function bat() : void {
        $this->foo();
    }
}

class C {
    use T;

    protected function foo(string $s) : void {}

    public function bat() : void {
        $this->foo("bat");
    }
}
<?php
trait T1 {
    use T2;

    private function foo() : int {
        return $this->bar();
    }
}

trait T2 {
    private function bar() : int {
        return 3;
    }
}

class A {
    use T1;

    private function baz() : int {
        return $this->bar();
    }
}
<?php
trait A {
    public function foo(): string {
        return B::class;
    }
}

trait B {}

class C {
    use A;
}
<?php
namespace Bar;

trait Foo {
    public function bar() : array {
        $type = static::class;
        $r = new \ReflectionClass($type);
        $values = $r->getConstants();
        $callback =
            /** @param mixed $v */
            function ($v) : bool {
                return \is_int($v) || \is_string($v);
            };

        if (is_a($type, \Bat::class, true)) {
            $callback =
                /** @param mixed $v */
                function ($v) : bool {
                    return \is_int($v) && 0 === ($v & $v - 1) && $v > 0;
                };
        }

        return array_filter($values, $callback);
    }
}

class Bar {
    use Foo;
}

class Bat {
    use Foo;
}
<?php
trait T {
    public function compare(O $other) : void {
        if ($other instanceof self) {
            if ($other->value === $this->value) {}
        }
    }
}

class O {}

class A extends O {
    use T;

    /** @var string */
    private $value;

    public function __construct(string $string) {
       $this->value = $string;
    }
}

class B extends O {
    use T;

    /** @var bool */
    private $value;

    public function __construct(bool $bool) {
       $this->value = $bool;
    }
}
<?php
trait Foo {
    public static function staticMethod():void {}
    public function nonstatic():void {}
}

Class Bar {
    use Foo {
        Foo::staticMethod as foo;
        Foo::staticMethod as foobar;
        Foo::staticMethod as fine;
        Foo::nonstatic as bad;
        Foo::nonstatic as good;
    }
}

$b = new Bar();

Bar::fine();
$b::fine();
$b->fine();

$b->good();

Bar::foo();
Bar::foobar();

$b::foo();
$b::foobar();

$b->foo();
$b->foobar();

$b->bad();
<?php
interface CustomThrowable {}
class CustomException extends Exception implements CustomThrowable {}

/** @psalm-suppress InvalidCatch */
try {
    throw new CustomException("Bad");
} catch (CustomThrowable $e) {
    echo $e->getMessage();
}
<?php
interface CustomThrowable {}
class CustomException extends Exception implements CustomThrowable {}

/** @psalm-suppress InvalidCatch */
try {
    throw new CustomException("Bad");
} catch (CustomThrowable $e) {
    throw $e;
}
<?php
try {
    $worked = true;
}
catch (\Exception $e) {
    $worked = false;
}
<?php
function throws(): void {
    throw new Exception("bad");
}
function foo(): string {
    try {
        throws();
    } catch (Exception $e) {
        // do nothing
    }

    return "hello";
}
<?php
function foo() : bool {
    try {
        return true;
    } finally {
    }
}

function bar() : bool {
    try {
        // do nothing
    } finally {
        return true;
    }
}
<?php
function foo() : bool {
    try {
        if (rand(0, 1)) throw new Exception("bad");
    } catch (Exception $e) {
        echo $e->getMessage();
        // do nothing here either
    } finally {
        return true;
    }
}
<?php
$foo = true;

try {
  $a->bar();
} catch (\TypeError $e) {
  $foo = false;
}

if (!$foo) {}
<?php
function test(): string {
    throw new Exception("bad");
}

try {
    $a = "foo";
    $var = test();
} catch (Exception $e) {
    echo "bad";
}

if (isset($var)) {}

echo $a;
<?php
function test(): string {
    throw new Exception("bad");
}

try {
    $a = "foo";
    $var = test();
} catch (Exception $e) {
    $var = "bad";
}

if (isset($var)) {}

echo $a;
<?php
class A {}
try {
    $worked = true;
}
catch (A $e) {}
<?php
class A {}
throw new A();
<?php
function missing_return() : bool {
    try {
    } finally {
    }
}
<?php
function missing_return() : bool {
    try {
    } finally {
    }
}
<?php
function foo() : bool {
    try {
        if (rand(0, 1)) throw new Exception("bad");
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        // do nothing here either
    } finally {

    }
}
<?php
function foo() : bool {
    try {
        if (rand(0, 1)) throw new Exception("bad");
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        // do nothing here either
    }
}
<?php
function takesString(string $s): void {}

function foo(?string $a, ?string $b, ?string $c): void {
    if ($a !== null || $b !== null || $c !== null) {
        $c = null;

        if ($a !== null) {
            $d = $a;
        } elseif ($b !== null) {
            $d = $b;
        } else {
            $d = $c;
        }

        takesString($d);
    }
}
<?php
function takesString(string $s): void {}

function foo(?string $a, ?string $b, ?string $c): void {
    if ($a !== null || $b !== null || $c !== null) {
        if ($c !== null) {
            throw new \Exception("bad");
        }

        if ($a !== null) {
            $d = $a;
        } elseif ($b !== null) {
            $d = $b;
        } else {
            $d = $c;
        }

        takesString($d);
    }
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a !== null || $b !== null) {
        $b = null;
    } else {
        return "bad";
    }

    if ($a !== null) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if (rand(0, 1)) {
        // do nothing
    } elseif ($a || $b) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b, ?string $c): string {
    if ($a) {
        // do nothing
    } elseif ($b && $c) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a && !$b) return $c;
    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a) {
        $a = "";
    } elseif ($b) {
        // do nothing
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
/** @return string|null */
function foo(?string $a) {
    if ($a) {
        return $a;
    }

    if ($a) {

    }
}
<?php
function foo(?string $a): void {
    if ($a) {
        // do something
    } elseif ($a) {
        // can never get here
    }
}
<?php
function foo(string $a, string $b): void {
    if ($a && $b) {
        echo "a";
    } elseif ($a && $b) {
        echo "b";
    }
}
<?php
function foo(string $a, string $b): void {
    if ($a || $b) {
        echo "a";
    } elseif ($a && $b) {
        echo "b";
    }
}
<?php
function foo(string $a, string $b): void {
    if ($a || $b) {
        echo "a";
    } elseif ($a) {
        echo "b";
    }
}
<?php
$a = "hello";
$b = 5;
if ($a !== $b) {}
<?php
$x = "a";
$x = "_" . $x;
$array = [$x => 2];
echo $array["other"];
<?php
function takesString(string $s): void {}

function foo(?string $a, ?string $b): void {
    if ($a !== null || $b !== null) {
        if ($a !== null) {
            $c = $a;
        } else {
            $c = $b;
        }

        takesString($c);
    }
}
<?php
function takesString(string $s): void {}

function foo(?string $a, ?string $b, ?string $c): void {
    if ($a !== null || $b !== null || $c !== null) {
        if ($a !== null) {
            $d = $a;
        } elseif ($b !== null) {
            $d = $b;
        } else {
            $d = $c;
        }

        takesString($d);
    }
}
<?php
function foo(?string $a, ?string $b): string {
    if (!$a && !$b) return "bad";
    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if (!$a && !$b) {
        return "bad";
    } else {
        if (!$a) {
            return $b;
        } else {
            return $a;
        }
    }
}
<?php
function foo(?string $a, ?string $b): string {
    if (!$a && !$b) {
        $a = 5;
        return "bad";
    }

    if (!$a) {
        $a = 7;
        return $b;
    }

    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a || $b) {
        // do nothing
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a || $b) {
        // do nothing
    } else {
        $a = 5;
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a) {
        // do nothing
    } elseif ($b) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(?stdClass $a, ?stdClass $b, ?stdClass $c): stdClass {
    if ($a) {
        // do nothing
    } elseif ($b) {
        // do nothing here
    } elseif ($c) {
        // do nothing here
    } else {
        return new stdClass;
    }

    if (!$a && !$b) return $c;
    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b, ?string $c): string {
    if ($a) {
        // do nothing
    } elseif ($b) {
        // do nothing here
    } elseif ($c) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a && !$b) return $c;
    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b, ?string $c): string {
    if ($a) {
        // do nothing
    } elseif ($b || $c) {
        // do nothing here
    } else {
        return "bad";
    }

    if (!$a && !$b) return $c;
    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a, ?string $b): string {
    if ($a) {
        // do nothing here
    } elseif ($b) {
        $a = null;
    } else {
        return "bad";
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(?string $a): void {
    if ($a === null) {
        $a = "blah-blah";
    } else {
        $a = rand(0, 1) ? "blah" : null;

        if ($a === null) {

        }
    }
}
<?php
class A {}
class B extends A {}

function foo(?A $a, ?A $b): A {
    if ($a) {
        $a = new B;
    } elseif ($b) {
        // do nothing
    } else {
        return new A;
    }

    if (!$a) return $b;
    return $a;
}
<?php
function foo(string $a): void {
    if ($a === "foo") {
        // do something
    } elseif ($a === "bar") {
        // can never get here
    }
}
<?php
function foo(): void {
    if ($a = rand(0, 1) ? "" : null) {
        return;
    }

    if (rand(0, 1)) {
        $a = rand(0, 1) ? "hello" : null;

        if ($a) {

        }
    }
}
<?php
function foo(): void {
    if ($a = rand(0, 1) ? "" : null) {
        return;
    } else {
        while (rand(0, 1)) {
            $a = rand(0, 1) ? "hello" : null;
        }

        if ($a) {

        }
    }
}
<?php
function foo(): void {
    preg_match("/hello/", "hello molly", $matches);

    if (!$matches) {
        return;
    }

    preg_match("/hello/", "hello dolly", $matches);

    if (!$matches) {

    }
}
<?php
function foo(string $a, string $b): void {
    if ($a && $b) {
        echo "a";
    } elseif ($a || $b) {
        echo "b";
    }
}
<?php
/** @param string[] $arr */
function foo(array $arr): void {
    $a = "a";

    if (!isset($arr[$a])) {
        return;
    }

    foreach ([0, 1, 2, 3] as $i) {
        if (!isset($arr[$a . $i])) {
            echo "a";
        }

        $a = "hello";
    }
}
<?php
$arr = [];

foreach ([0, 1, 2, 3] as $i) {
    $a = rand(0, 1) ? 5 : "010";

    if (!isset($arr[(int) $a])) {
        $arr[(int) $a] = 5;
    } else {
        $arr[(int) $a] += 4;
    }
}
<?php
function fetchRow() : array {
    return ["c" => "UK"];
}

$arr = [];

foreach ([1, 2, 3] as $i) {
    $row = fetchRow();

    if (!isset($arr[$row["c"]])) {
        $arr[$row["c"]] = 0;
    }

    $arr[$row["c"]] = 1;
}
<?php
function fetchRow() : array {
    return ["c" => "UK"];
}

$arr = [];

foreach ([1, 2, 3] as $i) {
    $row = fetchRow();

    if (!isset($arr[$row["c"]]["foo"])) {
        $arr[$row["c"]]["foo"] = 0;
    }

    $arr[$row["c"]]["foo"] = 1;
}
<?php
function paradox2(): void {
    $condition = rand() % 2 > 0;

    if (!$condition) {
        foreach ([1, 2] as $value) {
            if ($condition) { }
            $condition = true;
        }
    }
}
<?php
function foo(string $a): void {
    if (!$a) {
        list($a) = explode(":", "a:b");

        if ($a) { }
    }
}
<?php
function get_bool(): bool {
    return rand() % 2 > 0;
}

function leftover(): bool {
    $res = get_bool();
    if ($res === false) {
        return true;
    }
    $res = get_bool();
    if ($res === false) {
        return false;
    }
    return true;
}
<?php
/** @return array|false */
function array_append(array $errors) {
    if ($errors) {
        return $errors;
    }
    if (rand() % 2 > 0) {
        $errors[] = "unlucky";
    }
    if ($errors) {
        return false;
    }
    return $errors;
}
<?php
function maybe_returns_array(): ?array {
    if (rand() % 2 > 0) {
        return ["key" => "value"];
    }
    if (rand() % 3 > 0) {
        throw new Exception("An exception occurred");
    }
    return null;
}

function try_catch_check(): array {
    $arr = null;
    try {
        $arr = maybe_returns_array();
        if (!$arr) { return [];  }
    } catch (Exception $e) {
        if (!$arr) { return []; }
    }
    return $arr;
}
<?php
class A {
   /**
    * @var ?string
    */
   public $a = null;
   /**
    * @var ?string
    */
   public $b = null;
}
function f(A $obj): string {
  if (($obj->a !== null) == true) {
    return $obj->a; // definitely not null
  } elseif (!is_null($obj->b) == true) {
    return $obj->b;
  } else {
    throw new \InvalidArgumentException("$obj->a or $obj->b must be set");
  }
}
<?php
class A {
   /**
    * @var ?string
    */
   public $a = null;
   /**
    * @var ?string
    */
   public $b = null;
}
function f(A $obj): string {
  if (($obj->a === null) == false) {
    return $obj->a; // definitely not null
  } elseif (is_null($obj->b) == false) {
    return $obj->b;
  } else {
    throw new \InvalidArgumentException("$obj->a or $obj->b must be set");
  }
}
<?php
class A {}
class B extends A {
  public function foo(): void {}
}

function takesA(A $a): void {
  if (get_class($a) === B::class) {
    $a->foo();
  }
}
<?php
class A {}
class B extends A {
  public function foo(): void {}
}

function takesA(A $a): void {
  if (get_class($a) !== B::class) {
    // do nothing
  } else {
    $a->foo();
  }
}
<?php
function foo(?stdClass $a, ?stdClass $b): void {
    if ($a) {
        if ($b) {}
    }
}
<?php
function foo(?stdClass $a, ?stdClass $b, ?stdClass $c, ?stdClass $d): void {
    if ($a && $b) {
        if ($c && $d) {}
    }
}
<?php
function foo(?stdClass $a, ?stdClass $b): void {
    if ($a === null) {
        return;
    }

    if ($b) {
        echo "hello";
    }
}
<?php
class A {
    /** @var ?string */
    public $foo;
}

$a = new A;

if ($a->foo === null) {
    $a->foo = "hello";
    exit;
}

if ($a->foo === "somestring") {}
<?php
class A {
    /** @var ?string */
    public $foo;
}

if (rand(0, 10) > 5) {
} elseif (($a = new A) && $a->foo) {}
<?php
$options = getopt("t:");

try {
    if (!isset($options["t"])) {
        throw new Exception("bad");
    }
} catch (Exception $e) {}
<?php
class A {}
class B extends A {}
class C extends A {}

function takesA(A $a): void {}

function foo(?A $a): void {
    if ($a instanceof B
        || ($a instanceof C && rand(0, 1))
    ) {
        takesA($a);
    }
}
<?php
class A {}
class B extends A {}
class C extends A {}

function takesA(A $a): void {}

function foo(?A $a, ?A $b, ?A $c): void {
    if (!$a || ($b && $c)) {
        return;
    }

    takesA($a);
}
<?php
class A {}
class B extends A {}
class C extends A {}

function takesA(A $a): void {}

function foo(?A $a): void {
    if (($a instanceof B && rand(0, 1))
        || ($a instanceof C && rand(0, 1))
    ) {
        takesA($a);
    }
}
<?php
class A {}
class B extends A {}
class C extends A {}

function takesA(A $a): void {}

function foo(?A $a, ?A $b): void {
    if (($a instanceof B && $b instanceof B)
        || ($a instanceof C && $b instanceof C)
    ) {
        takesA($a);
        takesA($b);
    }
}
<?php
class A {
    /** @var ?string */
    public $foo;

    /** @var ?string */
    public $bar;
}

$a1 = rand(0, 1) ? new A() : null;
$a4 = rand(0, 1) ? new A() : null;
$a5 = rand(0, 1) ? new A() : null;
$a7 = rand(0, 1) ? new A() : null;
$a8 = rand(0, 1) ? new A() : null;

if ($a1 || (($a4 && $a5) || ($a7 && $a8))) {}
<?php
class A {}
class B extends A {}
class C extends A {}

function takesA(A $a): void {}

function foo(?A $a): void {
    $c = rand(0, 1);
    if (($a instanceof B || $a instanceof C)
        && ($a instanceof B || $c)
    ) {
        takesA($a);
    }
}
<?php
class A {}
class B {}

function takesA(A $a): void {}

function foo(?A $a, ?B $b): void {
    if ($a === null || $b === null || rand(0, 1)) {
        // do nothing
    } else {
        takesA($a);
    }
}
<?php
class Foo {
    public function bar() : void {}
}
class Bar extends Foo{
    public function bar() : void {}
}

class Baz {
    public function test(Foo $foo) : void {
        if (get_class($foo) !== Foo::class) {
            // do nothing
        } else {
            $foo->bar();
        }
    }
}
<?php
if ($a = rand(0, 5)) {
    echo $a;
} elseif ($a = rand(0, 5)) {
    echo $a;
}
<?php
function sayHello(?int $a, ?int $b): void {
    if ($a === null && $b === null) {
        throw new \LogicException();
    }

    takesInt($a !== null ? $a : $b);
}

function takesInt(int $c) : void {}
<?php
function sayHello(?int $a, ?int $b): void {
    if ($a === null && $b === null) {
        throw new \LogicException();
    }

    if ($a !== null) {
        takesInt($a);
    } else {
        takesInt($b);
    }
}

function takesInt(int $c) : void {}
<?php
function sayHello(?int $a, ?int $b): void {
    if ($a === null && $b === null) {
        throw new \LogicException();
    }

    if ($a !== null) {
        takesInt($a);
    } elseif (rand(0, 1)) {
        takesInt($b);
    }
}

function takesInt(int $c) : void {}
<?php
class A {}
class B extends A {}

function foo(A $a, A $b) : ?B {
    if (($a instanceof B || !$b instanceof B) && $a instanceof B && $b instanceof B) {
        return $a;
    }

    return null;
}
<?php
function logic(Foo $a, Foo $b) : void {
    if ((!$a instanceof Bat || !$b instanceof Bat)
        && (!$a instanceof Bat || !$b instanceof Bar)
        && (!$a instanceof Bar || !$b instanceof Bat)
        && (!$a instanceof Bar || !$b instanceof Bar)
    ) {

    } else {
        if ($b instanceof Bat) {}
    }
}

class Foo {}
class Bar extends Foo {}
class Bat extends Foo {}
<?php
$s = rand(0, 1) ? "a" : "b";

if (($s === "a" && rand(0, 1)) || ($s === "b" && rand(0, 1))) {}

$a = (($s === "a" && rand(0, 1)) || ($s === "b" && rand(0, 1))) ? 1 : 0;
<?php
$a = (bool) rand(0, 1);

if (rand(0, 1)) {
    $a = null;
}

if ($a !== (bool) rand(0, 1)) {
    echo $a === false ? "a" : "b";
}
<?php
$x = "a";
$x = "_" . $x;
$array = [$x => 2];
echo $array["_a"];
<?php
/**
 * @psalm-type CoolType = A|B>
 */

class A {}
<?php
/**
 * @psalm-type aType null|"a"|"b"|"c"|"d"
 */

/** @psalm-return array{0:bool,1:aType} */
function f(): array {
    return [(bool)rand(0,1), rand(0,1) ? "z" : null];
}
<?php
/**
 * @psalm-type CoolType = A|B|null
 */

class A {}
class B {}

/** @return CoolType */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type A_OR_B = A|B
 * @psalm-type CoolType = A_OR_B|null
 * @return CoolType
 */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

class A {}
class B {}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type CoolType = A|B|null
 */
/**
 * @return CoolType
 */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

class A {}
class B {}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/**
 * @psalm-type CoolType = A|B|null
 */

// this breaks up the line

class A {}
class B {}

/** @return CoolType */
function foo() {
    if (rand(0, 1)) {
        return new A();
    }

    if (rand(0, 1)) {
        return new B();
    }

    return null;
}

/** @param CoolType $a **/
function bar ($a) : void { }

bar(foo());
<?php
/** @psalm-type TA = array<int, string> */

class Bar {
    public function foo() : void {
        $bar =
            /** @return TA */
            function() {
                return ["hello"];
        };

        /** @var array<int, TA> */
        $bat = [$bar(), $bar()];

        foreach ($bat as $b) {
            echo $b[0];
        }
    }
}

/**
  * @psalm-type _A=array{elt:int}
  * @param _A $p
  * @return _A
  */
function f($p) {
    /** @var _A */
    $r = $p;
    return $r;
}
<?php
class A {}
class B {}
$var = [];
$var[] = new A();
$var[] = new B();
<?php
class A { }
$a = new A();
if ($a === null) {
}
<?php
class A { }
class B { }
class C { }
$a = rand(0, 10) > 5 ? new A(): new B();
if ($a instanceof A) {
} elseif ($a instanceof C) {
}
<?php
if (json_last_error() === "5") { }
<?php
if (5 === "5") { }
<?php
if (5 === null) { }
<?php
if (5 === false) { }
<?php
$a = "5";

if (is_numeric($a)) {
    if (is_int($a)) {
        echo $a;
    }
}
<?php
$a = mt_rand(0, 1) ? mt_rand(-10, 10): null;

if ($a < 0) {
  echo $a + 3;
}
<?php
$a = mt_rand(0, 1) ? mt_rand(-10, 10): null;

if (0 > $a) {
  echo $a + 3;
}
<?php
/** @param array[] $arr */
function foo(array $arr) : void {
   if ($arr === "hello") {}
}
<?php
/**
 * @param array{field:string, otherField:string} $array
 */
function print_field($array) : void {
    echo $array["field"] . " " . $array["otherField"];
}

print_field(["field" => "name"]);
<?php
interface I {
    public function bat(): void;
}

interface C {}

/** @param I&C $a */
function takesIandC($a): void {}

class A {
    public function foo(): void {
        if ($this instanceof I) {
            takesIandC($this);
        }
    }
}
<?php
/** @return array<int, string|int> */
function getStrings(): array {
    return ["hello", "world", 50];
}

$a = getStrings();

if (is_bool($a[0]) && $a[0]) {}
<?php
function foo(int $i, stdClass $s) : void {
    if ($i == $s) {}
}
<?php
class A {}
$a = rand(0, 1) ? new A : null;

if (rand(0, 1)) {
    $a = new A();
} elseif (!$a) {
    $a = new A();
}

if ($a) {}
<?php
$a = rand(0, 1) ? "hello" : "goodbye";

if (is_scalar($a)) {
    exit;
}
<?php
$a = rand(0, 1) ? "hello" : "goodbye";

if (!is_scalar($a)) {
    exit;
}
<?php
$i = 5;
echo $i === null;
<?php
$i = 5;
echo $i === true;
<?php
$i = 5;
echo $i === false;
<?php
$i = 5;
echo $i === 3;
<?php
/** @param mixed $s */
function foo($s) : void {
    if (!is_scalar($s)) {
        return;
    }

    if (!is_bool($s)) {
        if (is_bool($s)) {}
    }
}
<?php
function foo() : string {
    return (object) ["a" => 1, "b" => 2];
}
<?php
function bar(float $f) : void {
    if ($f === 0) {}
}
<?php
function bar(float $f) : void {
    if (0 === $f) {}
}
<?php
/** @param mixed $a */
function foo($a): void {
    $b = 5;

    if ($b === $a) { }
}
<?php
class A { }

/**
 * @param  A $a
 * @return void
 */
function fooFoo($a) {
    if ($a instanceof A) {
    }
}
<?php
/**
 * @param string[] $strs
 * @return void
 */
function foo(array $strs) {
    foreach ($strs as $str) {
        if (is_string($str)) {}
    }
}
<?php
/**
 * @param int $length
 * @return void
 */
function foo($length) {
    if (!is_int($length)) {
        if (is_numeric($length)) {
        }
    }
}
<?php
class A { }

class B extends A { }

$out = null;

if ($a instanceof B) {
    // do something
}
else {
    $out = $a;
}
<?php
class B { }

class C extends B { }

class A {
    /** @var B */
    public $foo;

    public function __construct() {
        $this->foo = new B();
    }
}

$a = new A();

$out = null;

if ($a->foo instanceof C) {
    // do something
}
else {
    $out = $a->foo;
}
<?php
class B { }

class C extends B { }

class A {
    /** @var string|B */
    public $foo = "";
}

$out = null;

if (is_string($a->foo)) {

}
elseif ($a->foo instanceof C) {
    // do something
}
else {
    $out = $a->foo;
}
<?php
$a = min(0, 1);
$b = min([0, 1]);
$c = min("a", "b");
$d = min(1, 2, 3, 4);
$e = min(1, 2, 3, 4, 5);
sscanf("10:05:03", "%d:%d:%d", $hours, $minutes, $seconds);
<?php
/** @return void */
function fooFoo(string $a) {
    if (is_numeric($a)) { }

    if (is_numeric($a) && $a === "1") { }
}

$b = rand(0, 1) ? 5 : false;
if (is_numeric($b)) { }
<?php
/**
 * @param mixed $a
 * @return void
 */
function foo ($a) {
    if (is_numeric($a)) {
        if (is_string($a)) {
        }
    }
}
<?php
$a = rand(0, 5) > 4 ? "hello" : 5;

if (is_numeric($a)) {
  exit;
}
<?php
$a = rand(0, 5) > 4 ? "hello" : true;

if (is_bool($a)) {
  exit;
}
<?php
/** @return void **/
function foo(string $s) {}

$a = rand(0, 1) ? ["hello"] : null;
if (isset($a[0])) {
    foo($a[0]);
}
<?php
/** @return void **/
function foo(string $s) {}

$a = rand(0, 1) ? ["hello"] : null;
$b = 0;
if (isset($a[$b])) {
    foo($a[$b]);
}
<?php
abstract class A {}
class B extends A {}

abstract class C {}
class D extends C {}

function makeA(): A {
  return new B();
}

function makeC(): C {
  return new D();
}

$a = rand(0, 1) ? makeA(): makeC();

if ($a instanceof B || $a instanceof D) { }
<?php
/**
 * @param string|int $a
 * @return string|int
 */
function foo($a) {
    if (is_string($a)) {
        return $a;
    } elseif (is_int($a)) {
        return $a;
    }

    throw new \LogicException("Runtime error");
}
<?php
$a = null;
if ($a !== null) { }
$b = $a;
<?php
$a = rand(0, 1) ? 5 : null;
if ($a !== null) { }
$b = $a;
<?php
function foo(): void {
    $b = null;
    $c = rand(0, 1) ? bar($b): null;
    if (is_int($b)) { }
}
function bar(?int &$a): void {
    $a = 5;
}
<?php
function foo(): void {
    $b = null;
    if (rand(0, 1) || bar($b)) {
        if (is_int($b)) { }
    }
}
function bar(?int &$a): void {
    $a = 5;
}
<?php
interface I1 {}
interface I2 {}

class A
{
    public function foo(): void {
        if ($this instanceof I1 || $this instanceof I2) {}
    }
}
<?php
interface I {
    public function bat(): void;
}

function takesI(I $i): void {}
function takesA(A $a): void {}
/** @param A&I $a */
function takesAandI($a): void {}
/** @param I&A $a */
function takesIandA($a): void {}

class A {
    /**
     * @return A&I|null
     */
    public function foo() {
        if ($this instanceof I) {
            $this->bar();
            $this->bat();

            takesA($this);
            takesI($this);
            takesAandI($this);
            takesIandA($this);
        }
    }

    protected function bar(): void {}
}

class B extends A implements I {
    public function bat(): void {}
}
<?php
class A {
  public function bat() : void {}
}
interface I {
  public function baz();
}

function foo(I $i) : void {
  if ($i instanceof A) {
    $i->bat();
    $i->baz();
  }
}

function bar(A $a) : void {
  if ($a instanceof I) {
    $a->bat();
    $a->baz();
  }
}

class B extends A implements I {
  public function baz() : void {}
}

foo(new B);
bar(new B);
<?php
function foo(iterable $iterable) : void {
    if (\is_array($iterable) || $iterable instanceof \Traversable) {}
}
<?php
function f(string $s = null): string {
  if ($s == true) {
      return $s;
  }

  return "backup";
}
<?php
/**
 * @param string|callable $param
 */
function f($param): void {}
f("is_array");
<?php
/**
 * @param string|callable|object $param
 */
function f($param): void {}
f("is_array");
<?php
/**
 * @param int|float $param
 */
function f($param): void {}
f(5.0);
f(5);
<?php
/**
 * @param string|null|false $a
 * @return string|false $a
 */
function foo($a) {
  if ($a === null) {
    if (rand(0, 4) > 2) {
      $a = "hello";
    } else {
      $a = false;
    }
  }

  return $a;
}
<?php
$a = rand(0, 1) ? 5 : null;

$b = (bool)rand(0, 1);

if ($b || $a !== null) {
    $a = 3;
}
<?php
$a = mt_rand(0, 1) ? mt_rand(-10, 10): null;

if ($a > 0) {
  echo $a + 3;
}

if (0 < $a) {
  echo $a + 3;
}
<?php
if (rand(0, 1)) {
    $a = false;
} else {
    $a = false;
}
<?php
abstract class Foo {
    /**
     * @return static[]
     */
    abstract public static function getArr() : array;

    /**
     * @return static|null
     */
    public static function getOne() {
        $one = current(static::getArr());
        return $one instanceof static ? $one : null;
    }
}
<?php
abstract class Foo {
    /**
     * @return static[]
     */
    abstract public static function getArr() : array;

    /**
     * @return static|null
     */
    public static function getOne() {
        $one = current(static::getArr());
        return is_a($one, static::class, false) ? $one : null;
    }
}
<?php
class A {}
$a_class = rand(0, 1) ? A::class : "blargle";
if (is_a($a_class, A::class, true)) {
  echo "cool";
}
<?php
/**
 * @param array{field:string} $array
 */
function print_field($array) : void {
    echo $array["field"];
}

/**
 * @param array{field:string,otherField:string} $array
 */
function has_mix_of_fields($array) : void {
    print_field($array);
}
<?php
/**
 * @param string|null $b
 * @psalm-suppress DocblockTypeContradiction
 */
function foo($b = null) : void {
    if (is_numeric($b) || is_string($b)) {
        takesNullableString($b);
    }
}

function takesNullableString(?string $s) : void {}
<?php
/**
 * @param scalar|null $value
 */
function Foo($value = null) : bool {
  if (!$value) {
    return true;
  }
  return false;
}
<?php
/**
 * @param mixed $a
 */
function foo($a, string $b) : void {
    if (is_numeric($b) && $a === $b) {
        echo $a;
    }
}
<?php
function foo(?string $s) : void {
    if ($s == "hello" || $s == "goodbye") {
        if ($s == "hello") {
            echo "cool";
        }
        echo "cooler";
    }
}
<?php
function foo(?string $s, string $a, string $b) : void {
    if ($s === $a || $s === $b) {
        if ($s === $a) {
            echo "cool";
        }
        echo "cooler";
    }
}
<?php
function foo(?string $s, string $a, string $b) : void {
    if ($s == $a || $s == $b) {
        if ($s == $a) {
            echo "cool";
        }
        echo "cooler";
    }
}
<?php
function foo(int $i) : void {
    if ($i == "5") {}
    if ("5" == $i) {}
    if ($i == 5.0) {}
    if (5.0 == $i) {}
    if ($i == 0) {}
    if (0 == $i) {}
    if ($i == 0.0) {}
    if (0.0 == $i) {}
}
function foo(float $i) : void {
    $i = $i / 100.0;
    if ($i == "5") {}
    if ("5" == $i) {}
    if ($i == 5) {}
    if (5 == $i) {}
    if ($i == "0") {}
    if ("0" == $i) {}
    if ($i == 0) {}
    if (0 == $i) {}
}
function foo(string $i) : void {
    if ($i == 5) {}
    if (5 == $i) {}
    if ($i == 5.0) {}
    if (5.0 == $i) {}
    if ($i == 0) {}
    if (0 == $i) {}
    if ($i == 0.0) {}
    if (0.0 == $i) {}
}
<?php
class A {}
class B extends A {
   public function foo() : void {}
}

class C {}
class D extends C {}

$b_or_d = rand(0, 1) ? new B : new D;

if ($b_or_d instanceof A) {
    $b_or_d->foo();
}
<?php
$a = rand(0, 1) ? new stdClass : true;

if ($a === true) {
  exit;
}

function takesStdClass(stdClass $s) : void {}
takesStdClass($a);
<?php
class A {}
$a = rand(0, 1) ? new A : null;

if (rand(0, 1)) {
    // do nothing
} elseif (!$a) {
    $a = new A();
}

if ($a) {}
<?php
$a = rand(0, 1) ? "hello" : null;

if (is_scalar($a)) {
    exit;
}
<?php
$a = rand(0, 1) ? "hello" : null;

if (!is_scalar($a)) {
    exit;
}
<?php
/**
 * @param scalar $thing
 */
function Foo($thing) : void {
    if (is_numeric($thing)) {}
}
<?php
class Obj {}
class A extends Obj {}
class B extends A {}
class C extends Obj {}
class D extends C {}

function takesD(D $d) : void {}

/** @param B|D $bar */
function foo(Obj $bar) : void {
    if (!$bar instanceof A) {
        takesD($bar);
    }
}
<?php
class Obj {}
class A extends Obj {}
class B extends A {}
class C extends Obj {}
class D extends C {}
class E extends C {}

function bar(Obj $node) : void {
    if ($node instanceof B
        || $node instanceof D
        || $node instanceof E
    ) {
        if ($node instanceof C) {}
        if ($node instanceof D) {}
    }
}
<?php
interface I {}

function takesArray(array $_a): void {}

/** @param string|I|string[]|I[] $p */
function eliminatesNonArray($p): void {
    if (is_array($p)) {
        takesArray($p);
    }
}
<?php
/**
 * @param  iterable<string>|null $foo
 */
function d(?iterable $foo): void {
    if (is_iterable($foo)) {
        foreach ($foo as $f) {}
    }

    if (!is_iterable($foo)) {

    } else {
        foreach ($foo as $f) {}
    }
}
<?php
if (is_string($_SERVER["abc"])) {
    echo substr($_SERVER["abc"], 1, 2);
}
<?php
function f(): ?object {
    return rand(0,1) ? new stdClass : null;
}

$data = f();
if (!$data) {}
if ($data) {}
<?php
class A {}
class B extends A {
    public function b() : bool {
        return (bool) rand(0, 1);
    }
}

function bar(?A $a) : void {
    if (!$a || ($a instanceof B && $a->b())) {}
}
<?php
function bar(float $f) : void {
    if (!$f) {}
}
<?php
/** @param mixed $s */
function foo($s) : void {
    if (!is_scalar($s)) {
        return;
    }

    if (is_bool($s)) {}
    if (!is_bool($s)) {}
    if (is_string($s)) {}
    if (!is_string($s)) {}
    if (is_int($s)) {}
    if (!is_int($s)) {}
    if (is_float($s)) {}
    if (!is_float($s)) {}
}
<?php
if (rand(0, 1)) {
    $a = 5;
}

echo $a;
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        $a->fooFoo();
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @var A|null */
    protected $a;

    /** @return void */
    public function barBar(A $a = null) {
        $this->a = $a;
        $this->a->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one) {
            $two->fooFoo();
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one || $two) {
            $two->fooFoo();
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($two === null) {
            return;
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one === null && $two === null) {
            return;
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            switch ($a) {
                case 4:
                    $one = new One();
                    break;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            switch ($a) {
                case 4:
                    $one = new One();
                    break;

                default:
                    break;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
            }
            else if ($a === 3) {
                // do nothing
            }
            else {
                $one = new One();
                return;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function barBar() {}
}

$one = new One();

if (1 + 1 === 2) {
    $one = new Two();

    $one->barBar();
}

$one->barBar();
<?php
class A {}

class B {
    /** @return void */
    public function barBar(A $a) {}
}

$b = new B();
$b->barBar(5);
<?php
class A {}

class B {
    /** @return void */
    public function barBar(A $a = null) {}
}

$b = new B();
$b->barBar(5);
<?php
class A {}
class B extends A {
    /** @return void */
    public function blab() {}
}

class C {
    /** @return void */
    function fooFoo(A $a) {
        if ($a instanceof B) {
            $a->barBar();
        }
    }
}
<?php
$a = null;

$a->fooBar();
<?php
class A {
    public function foo(): void {}
}
class B {
    public function other(): void {}
}

function a(bool $cond): void {
    if ($cond) {
        $a = new A();
    } else {
        $a = new B();
    }

    if ($cond) {
        $a->foo();
    }
}
<?php
/** @return true */
function returnsTrue() { return rand() % 2 > 0; }

<?php
/** @return false */
function returnsFalse() { return rand() % 2 > 0; }

<?php
abstract class A {
  /** @var string|null */
  public $foo;

  public static function getFoo(): void {
    $a = new static();
    if ($a instanceof B) {}
    elseif ($a instanceof C) {}
    else {}
    takesB($a);
  }
}

class B extends A {}
class C extends A {}

function takesB(B $i): void {}
<?php
abstract class A {
  /** @var string|null */
  public $foo;

  public static function getFoo(): void {
    $a = new static();
    if ($a instanceof I) {}
    takesI($a);
  }
}

interface I {}

function takesI(I $i): void {}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        $b = $a ? $a->fooFoo(): null;
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        $b = $a === null ? null : $a->fooFoo();
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        $b = empty($a) ? null : $a->fooFoo();
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        $b = is_null($a) ? null : $a->fooFoo();
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        if ($a) {
            $a->fooFoo();
        }
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @var A|null */
    public $a;

    /** @return void */
    public function barBar(A $a = null) {
        $this->a = $a;
        $b = $this->a ? $this->a->fooFoo(): null;
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @var A|null */
    public $a;

    /** @return void */
    public function barBar(A $a = null) {
        $this->a = $a;
        $b = $this->a === null ? null : $this->a->fooFoo();
    }
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @var A|null */
    public $a;

    /** @return void */
    public function barBar(A $a = null) {
        $this->a = $a;

        if ($this->a) {
            $this->a->fooFoo();
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        if (!$one) {
            throw new Exception();
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @var int|null */
    public $two;

    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        if (!$one) {
            $one = new One();
        }
        else {
            $one->two = 3;
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one && $two) {
            $two->fooFoo();
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one !== null && $two) {
            $one->fooFoo();
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one !== null && ($two || 1 + 1 === 3)) {
            $one->fooFoo();
        }
    }
}
<?php
class One {
    /** @var string */
    public $a = "";

    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one === null) {
            return;
        }

        if (!$one->a && $one->fooFoo()) {
            // do something
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null, Two $two = null) {
        if ($one === null || $two === null) {
            return;
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        if ($one === null) {
            $one = new One();
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        if ($one) {
            // do nothing
        }
        else {
            $one = new One();
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
            }
            else {
                $one = new One();
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            switch ($a) {
                case 4:
                    $one = new One();
                    break;

                default:
                    $one = new One();
                    break;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /**
     * @return void
     */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            switch ($a) {
                case 4:
                    $one = new One();
                    break;

                default:
                    throw new \Exception("bad");
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            switch ($a) {
                case 4:
                    return;

                default:
                    return;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
                return;
            }
            else {
                $one = new One();
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
            }
            else {
                $one = new One();
                return;
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = rand(0, 4);

        if ($one === null) {
            if ($a === 4) {
                $one = new One();
            }
            else if ($a === 3) {
                // do nothing
                return;
            }
            else {
                $one = new One();
            }
        }

        $one->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @return void */
    public function barBar(One $one = null) {
        $a = 4;

        switch ($a) {
            case 4:
                if ($one === null) {
                    break;
                }

                $one->fooFoo();
                break;
        }
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class B {
    /** @var One|null */
    public $one;

    /** @return void */
    public function barBar(One $one = null) {
        $this->one = $one;

        if ($this->one === null) {
            $this->one = new One();
        }

        $this->one->fooFoo();
    }
}
<?php
$ids = (1 + 1 === 2) ? [] : null;

if ($ids === null) {
    $ids = [];
}
<?php
$ids = (1 + 1 === 2) ? [] : null;

if (!is_array($ids)) {
    $ids = [];
}
<?php
/** @return array<array<string>>|null */
function foo() {
    $ids = rand(0, 1) ? [["hello"]] : null;

    if (is_array($ids)) {
        return $ids;
    }

    return null;
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function barBar() {}
}

$one = new One();

$one = new Two();

$one->barBar();
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function barBar() {}
}

$one = new One();

if (1 + 1 === 2) {
    $one = new Two();

    $one->barBar();
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

class Two {
    /** @return void */
    public function barBar() {}
}

class Three {
    /** @return void */
    public function baz() {}
}

/** @var One|Two|Three|null */
$var = null;

if ($var instanceof One) {
    $var->fooFoo();
}
else {
    if ($var instanceof Two) {
        $var->barBar();
    }
    else if ($var) {
        $var->baz();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

/** @return void */
function a(One $var = null) {
    if (!$var) {
        throw new \Exception("some exception");
    }
    else {
        $var->fooFoo();
    }
}
<?php
class One {
    /** @return void */
    public function fooFoo() {}
}

/** @var One|null */
$var = null;

if (rand(0,100) === 5) {

}
elseif (!$var) {

}
else {
    $var->fooFoo();
}
<?php
$var = 0;

if (5 + 3 === 8) {
    $var = "hello";
}

echo $var;
<?php
$var = 0;

$arr = ["hello"];

if (5 + 3 === 8) {
    $var = $arr[0];
}

echo $var;
<?php
class A {}
class B {}

$var = rand(0,10) > 5 ? new A : null;

if ($var === null) {
    $var = new B;
}
<?php
class One {
    /**
     * @return array|false
     */
    public function fooFoo(){
        return rand(0,100) ? ["hello"] : false;
    }

    /** @return void */
    public function barBar(){
        while ($row = $this->fooFoo()) {
            $row[0] = "bad";
        }
    }
}
<?php
class A {}

class B {
    /** @return void */
    public function barBar(A $a) {}
}

$b = new B();
$b->barBar(new A);
<?php
class A {}

class B {
    /** @return void */
    public function barBar(A $a = null) {}
}

$b = new B();
$b->barBar(null);
<?php
class A {}

class B {
    /** @return void */
    public function barBar(A $a = null) {}
}

$b = new B();
$b->barBar(new A);
<?php
class A {}
class B extends A {
    /** @return void */
    public function barBar() {}
}

class C {
    /** @return void */
    function fooFoo(A $a) {
        if ($a instanceof B) {
            $a->barBar();
        }
    }
}
<?php
class A {}
class B extends A {
    /** @return void */
    public function barBar() {}
}
class C extends A {
    /** @return void */
    public function baz() {}
}

class D {
    /** @return void */
    function fooFoo(A $a) {
        if ($a instanceof B) {
            $a->barBar();
        }
        elseif ($a instanceof C) {
            $a->baz();
        }
    }
}
<?php
$a = 0;
$b = $a++;
<?php
/**
 * @param array|string $a
 */
function fooFoo($a): void {
    $b = "aadad";

    if ($a === $b) {
        echo substr($a, 1);
    }
}
<?php
$a = +"5";
if (!is_int($a)) {
}
<?php
class A {
    /** @return void */
    public function fooFoo() {}

    /** @return void */
    public function barFoo() {}
}

class B {
    /** @return void */
    public function barBar(A $a = null) {
        /** @psalm-suppress PossiblyNullReference */
        $a->fooFoo();

        $a->barFoo();
    }
}
<?php
class A {
    /** @return true */
    public function returnsTrue() { return true; }

    /** @return false */
    public function returnsFalse() { return false; }

    /** @return bool */
    public function returnsBool() {
        if (rand() % 2 > 0) {
            return true;
        }
        return false;
    }
}
<?php
abstract class A {
  /** @var string|null */
  public $foo;

  public static function getFoo(): void {
    $a = new static();
    if ($a instanceof I) {}
    $a->foo = "bar";
  }
}

interface I {}
<?php
abstract class A {
  /** @var string|null */
  public $foo;

  public static function getFoo(): void {
    $a = new static();
    if ($a instanceof I) {
      takesI($a);
      takesA($a);
    }
  }
}

interface I {}

function takesI(I $i): void {}
function takesA(A $i): void {}
<?php
namespace NS;
use Countable;

class Item {}
/**
 * @var iterable<Item>&Countable $collection
 */
$collection = [];
count($collection);

/**
 * @param iterable<Item>&Countable $collection
 */
function mycount($collection): int {
    return count($collection);
}
mycount($collection);
<?php
/**
 * @param scalar $var
 */
function test($var): void {}

test("a");
test(1);
test(1.1);
test(true);
test(false);
<?php
$a = 4;
if ($a === 5) {
    // do something
}
<?php
$a = 4;
if ($a === 4) {
    // do something
}
<?php
$a = 4;
if ($a !== 5) {
    // do something
}
<?php
$a = 4;
if ($a !== 4) {
    // do something
}
<?php
$a = 4.0;
if ($a === 4.1) {
    // do something
}
<?php
$a = 4.1;
if ($a === 4.1) {
    // do something
}
<?php
$a = 4.0;
if ($a !== 4.1) {
    // do something
}
<?php
$a = 4.1;
if ($a !== 4.1) {
    // do something
}
<?php
$foo = rand(0, 1) ? "bar" : "bat";

if ($foo === "baz") {}
<?php
$foo = [
    "a" => 1,
    "b" => 2,
];

if ($foo["a"] === 2) {}
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

function takesInt(int $s) : void {}

foreach ($foo as $i => $b) {
    if ($i === 3) {}
}
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

function takesInt(int $s) : void {}

foreach ($foo as $i => $b) {
    if ($b === $i) {}
}
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

$a = "3";

echo $foo[$a];
<?php
$i = 0;

$a = function() use ($i) : void {
    $i++;
};

$a();

if ($i === 0) {}
<?php
$s = rand(0, 1) ? 0 : 1;

if ($s && rand(0, 1)) {
    if (rand(0, 1)) {
        $s = 2;
    }
}

if ($s == 3) {}
<?php
function foo(string $s) : void {
    switch ($s) {
        case "a":
        case "b":
        case "c":
            if ($s === "a" || $s === "b") {
                throw new \InvalidArgumentException;
            }

            if ($s === "c") {}
    }
}
<?php
$array = [1, 2, 3];
while (rand(1, 10) === 1) {
    $array[] = 4;
    $array[] = 5;
    $array[] = 6;
}

if (count($array) === 7) {}
<?php
$errors = [];

try {
    if (rand(0, 1)) {
        throw new Exception("bad");
    }
} catch (Exception $e) {
    $errors[] = $e;
}

if (count($errors) !== 0) {
    echo "Errors";
}
<?php
$foo = rand(0, 1) ? "bar" : "bat";

if ($foo === "bar") {}

if ($foo !== "bar") {}

if (rand(0, 1)) {
    $foo = "baz";
}

if ($foo === "baz") {}

if ($foo !== "bat") {}
<?php
$foo = "bar";

if (rand(0, 1)) {
    $foo = "bat";
} elseif (rand(0, 1)) {
    $foo = "baz";
}

$bar = "bar";
$baz = "baz";

if ($foo === "bar") {}
if ($foo !== "bar") {}
if ($foo === "baz") {}
if ($foo === $bar) {}
if ($foo !== $bar) {}
if ($foo === $baz) {}
<?php
$foo = "bar";

if (rand(0, 1)) {
    $foo = "bat";
} elseif (rand(0, 1)) {
    $foo = "baz";
}

if ($foo === "baz" || $foo === "bar") {}
<?php
$foo = null;

if (rand(0, 1)) {
    $foo = "bar";
}

$bar = "bar";

if ($foo === "bar") {}
if ($foo !== "bar") {}
<?php
$i = 1;
$j = 2;
while (rand(0, 1)) {
    if ($i === $j) {}
    $i++;
}
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

function takesInt(int $s) : void {}

foreach ($foo as $i => $b) {
    takesInt($i);
}
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

$a = "2";

echo $foo["2"];
echo $foo[$a];
<?php
$foo = [
    "0" => 3,
    "1" => 4,
    "2" => 5,
];

$a = "2";
$foo[$a] = 6;

function takesInt(int $s) : void {}

foreach ($foo as $i => $b) {
    takesInt($i);
}
<?php
function foo(string $s1, string $s2, ?int $i) : string {
    if ($s1 !== $s2) {
        return $s1;
    }

    return $s2;
}
<?php
function foo(string $s1, string $s2) : string {
    if ($s1 !== "hello") {
        if ($s1 !== "goodbye") {
            return $s1;
        }
    }

    return $s2;
}
<?php
class A {
    const B = 1;
    const C = 2;

}
function foo(string $s1, string $s2, ?int $i) : string {
    if ($i !== A::B && $i !== A::C) {}

    return $s2;
}
<?php
/** @psalm-ignore-nullable-return */
function generate() : ?string {
    return rand(0, 1000) ? "hello" : null;
}

function foo() : string {
    $str = generate();

    if ($str[0] === "h") {
        return $str;
    }

    return "hello";
}
<?php
$i = 0;
if (rand(0, 1)) $i++;
if ($i === 1) {}
<?php
$i = 0;
$a = function() use (&$i) : void {
  if (rand(0, 1)) $i++;
};
$a();
if ($i === 0) {}
<?php
function foo($f) : void {
    $i = 0;
    $f->add(function() use (&$i) : void {
        if (rand(0, 1)) $i++;
    });
    if ($i === 0) {}
}
<?php
$s = rand(0, 1) ? "a" : "b";
if (rand(0, 1)) {
    $s = "c";
}

if ($s === "a" || $s === "b") {
    if ($s === "a") {}
}
<?php
$a = rand(0, 1) ? "a" : "b";
$b = rand(0, 1) ? "a" : "b";

$s = rand(0, 1) ? $a : $b;
if (rand(0, 1)) $s = "c";

if ($s === $a) {
} elseif ($s === $b) {}
<?php
class C {
    const A = 1;
    const B = -1;
}

const A = 1;
const B = -1;

$i = rand(0, 1) ? A : B;
if (rand(0, 1)) {
    $i = 0;
}

if ($i === A) {
    echo "here";
} elseif ($i === B) {
    echo "here";
}

$i = rand(0, 1) ? C::A : C::B;

if (rand(0, 1)) {
    $i = 0;
}

if ($i === C::A) {
    echo "here";
} elseif ($i === C::B) {
    echo "here";
}
<?php
$s = rand(0, 1) ? 200 : null;
if (!$s) {}
<?php
$s = rand(0, 1) ? 0 : 1;

if ($s && rand(0, 1)) {
    if (rand(0, 1)) {
        $s = 2;
    }
}

if ($s == 2) {}
<?php
$context = 'a';
while ( true ) {
    if (rand(0, 1)) {
        if (rand(0, 1)) {
            exit;
        }

        $context = 'b';
    } elseif (rand(0, 1)) {
        if ($context !== 'c' && $context !== 'b') {
            exit;
        }

        $context = 'c';
    }
}
<?php
function foo(string $s) : void {
    switch ($s) {
        case "a":
        case "b":
        case "c":
            if ($s === "a" || $s === "b") {
                throw new \InvalidArgumentException;
            }
            break;
    }
}
<?php
class Foo
{
    /**
     * @psalm-var "a"|"b"
     */
    private $s;

    public function __construct(string $s)
    {
        if (!in_array($s, ["a", "b"], true)) {
            throw new \InvalidArgumentException;
        }
        $this->s = $s;
    }
}
<?php
function foo(string $s) : void {
    switch ($s) {
        case "a":
        case "b":
        case "c":
            if (in_array($s, ["a", "b"], true)) {
                throw new \InvalidArgumentException;
            }
            break;
    }
}
<?php
function takesInt(int $i) : void {}

$f = ["a", "b", "c"];
$f[rand(0, 2)] = 5;

$i = rand(0, 2);
if (isset($f[$i]) && !is_string($f[$i])) {
    takesInt($f[$i]);
}
<?php
function takesString(string $i) : void {}

$f = [0, 1, 2];
$f[rand(0, 2)] = "hello";

$i = rand(0, 2);
if (isset($f[$i]) && !is_int($f[$i])) {
    takesString($f[$i]);
}
<?php
function takesString(string $i) : void {}

$f = [1.1, 1.2, 1.3];
$f[rand(0, 2)] = "hello";

$i = rand(0, 2);
if (isset($f[$i]) && !is_float($f[$i])) {
    takesString($f[$i]);
}
<?php
function type(int $b): void {}

/**
 * @param mixed $a
 */
function foo($a) : void {
    if ($a === 1 || $a === 2) {
        type($a);
    }

    if (in_array($a, [1, 2], true)) {
        type($a);
    }
}
<?php
/** @param "a"|"b" $b */
function type(string $b): void {}

function foo(string $a) : void {
    if ($a === "a" || $a === "b") {
        type($a);
    }
}
<?php
class A {
    const FOO = "foo";
    const BAR = "bar";
    const BAT = "bat";
    const BAM = "bam";

    /** @var self::FOO|self::BAR|self::BAT|null $s */
    public $s;

    public function isFooOrBar() : void {
        $map = [
            A::FOO => 1,
            A::BAR => 1,
            A::BAM => 1,
        ];

        if (isset($map[$this->s])) {}
    }
}
<?php
function foo($a) : void {
    if ($a == "a") {
    } else {
        if ($a == "b" && rand(0, 1)) {}
    }
}
<?php
/**
 * @param mixed $req
 * @param mixed $opt
 * @param array<int, mixed> $params
 * @return array<mixed>
 */
function f($req, $opt = null, ...$params) {
    return $params;
}

f(1);
f(1, 2);
f(1, 2, 3);
f(1, 2, 3, 4);
f(1, 2, 3, 4, 5);
<?php
function test(): array {
    return func_get_args();
}
var_export(test(2));
<?php
/**
 * @param array<int, int> $a_list
 * @return array<int, int>
 */
function f(int ...$a_list) {
    return array_map(
        /**
         * @return int
         */
        function (int $a) {
            return $a + 1;
        },
        $a_list
    );
}

f(1);
f(1, 2);
f(1, 2, 3);

/**
 * @param string ...$a_list
 * @return void
 */
function g(string ...$a_list) {
}