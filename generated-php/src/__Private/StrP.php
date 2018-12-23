<?php
namespace Facebook\HHAST\__Private\StrP;

use HH\Lib\Str as Str;
/**
 * @return string
 */
function upper_camel(string $in)
{
    return \preg_replace_callback('/(^|_)([a-z])/', function ($matches) {
        return Str\uppercase($matches[2]);
    }, $in);
}
/**
 * @return string
 */
function underscored(string $in)
{
    return Str\strip_prefix(\preg_replace_callback('/[A-Z][a-z]+/', function ($matches) {
        return '_' . Str\lowercase($matches[0]);
    }, $in), '_');
}

