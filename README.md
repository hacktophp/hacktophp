<img src="https://hacktophp.github.io/hacktophp/logo.svg?1" alt="Hack to PHP logo" width="300px" height="100px" />

# A proof-of-concept Hack to PHP transpiler, written in PHP

This project uses HHVM's builtin parser (`hh_parse`) and [an existing library](https://github.com/hhvm/hhast) to turn Hack code into PHP code. It generates [PHP-Parser](https://github.com/nikic/php-parser)-equivalent nodes for the original Hack AST, then prints the result.

It aims to preserve all of Hack’s types so that the resultant PHP code can be checked by a tool like [Psalm](https://github.com/vimeo/psalm), converting any asynchronous code to its synchronous equivalent.

You can install via composer (`composer require --dev hacktophp/hacktophp`) and run it like so:

```
vendor/bin/hacktophp --input=<input-file-or-folder> --output=<output-file-or-folder>
```

## Indefinitely unsupported features

While a lot of code has easy-to-compute PHP equivalents, some builtin Hack constructs are essentially impossible to replicate:

### async/await

All `async`/`await` calls have been made synchronous, converted to promises that use [`sabre/event`](https://github.com/sabre-io/event)

### keyset

This valid Hack code
```php
$a = keyset[];
$a[] = "hello";
echo $a["hello"];
```
transpiles to the valid (but not-equivalent) PHP code
```php
$a = [];
$a[] = "hello";
var_dump($a["hello"]);
```

The only valid option here would be to convert `keyset`s to ArrayObjects, but I'm not sure if that's wise.

## Currently unsupported features

- Pretty much all builtins, but I'm adding things slowly, and `HH\Lib\...` functions are supported via [`hacktophp/hsl-php`](https://github.com/hacktophp/hsl-php)
- XHP
- Class constant types e.g.
  ```php
  class A {
    const type Foo = int;
  }
  ```
- Docblock annotations for Parameterised `extends`, `implements` and `trait` - dependent on Psalm support
- Docblock annotations for `require extends` - dependent on future Psalm support
- User attributes, especially `<<Memoize>>`
- types of `const` (Psalm does a reasonably good job inferring them, but it should be added for completeness)
- probably many more things I haven't considered
