<img src="https://psalm.github.io/hack-to-php/logo.svg?1" alt="Hack to PHP logo" width="300px" height="100px" />

# EXPERIMENTAL

An attempt to port Hack code to PHP.

This project uses HHVM's parser (`hh_parse`) together with a transpiled version of [hhvm/hhast](https://github.com/hhvm/hhast) to turn Hack code into a PHP-based abstract syntax tree. It then generates [PHP-Parser]((https://github.com/nikic/php-parser))-equivalent nodes for the Hack code AST.

Async handling:
 - Uses [`sabre/event`](https://github.com/sabre/event) to mimic `async`/`await`

Unsupported features:
- Pretty much all of the standard library, but I'm adding things slowly
- XHP
- Class constant types e.g.
  ```php
  class A {
    const type Foo = int;
  }
  ```
- Parameterised `extends`, `implements` and `trait`
- `require extends`
- User attributes
- types of `const` (Psalm does a reasonably good job inferring them, but it should be added for completeness)
- probably many more things I haven't considered
