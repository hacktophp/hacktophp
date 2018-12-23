<img src="https://cdn.rawgit.com/psalm/hack-to-php/master/logo.svg" alt="Hack to PHP logo" width="400px" height="164px" />

# WORK IN PROGRESS

An experimental attempt to port Hack code to PHP.

Goals:

 - Use `hh_parse` and [`nikic/php-parser`](https://github.com/nikic/php-parser) to generate functionally-equivalent PHP code from Hack source
 - Generate the tool's AST classes from [hhvm/hhast](https://github.com/hhvm/hhast)
 - Use [`sabre/event`](https://github.com/sabre/event) to mimic `async`/`await`

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
