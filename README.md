<img src="https://raw.githubusercontent.com/psalm/hack-to-php/master/hacktophp.png" alt="Hack to PHP logo" width="400px" />

# WORK IN PROGRESS

An experimental attempt to port Hack code to PHP.

Goals:

 - Use `hh_parse` and [`nikic/php-parser`](https://github.com/nikic/php-parser) to generate functionally-equivalent PHP code from Hack source
 - Generate the tool's AST classes from [hhvm/hhast](https://github.com/hhvm/hhast)
 - Use [`sabre/event`](https://github.com/sabre/event) to mimic `async`/`await`

Steps:
 - [x] translate Hack AST-generation classes by hand
 - [ ] map HHAST classes to PHP Parser classes
 - [ ] translate unrepresented types to docblock
 - [ ] support generic params with `@psalm-template`
 - [ ] replace `async`/`await` with `sabre/event`
