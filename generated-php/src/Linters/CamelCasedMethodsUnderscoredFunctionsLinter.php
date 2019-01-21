<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{FunctionDeclaration, MethodishDeclaration};
use HH\Lib\{C, Str};
class CamelCasedMethodsUnderscoredFunctionsLinter extends FunctionNamingLinter
{
    /**
     * @return string
     */
    public final function getSuggestedNameForFunction(string $name, FunctionDeclaration $func)
    {
        list($head, $suffix) = self::splitName($name);
        if (\preg_match('/^[a-z0-9_]+$/', $head) === 1) {
            return $name;
        }
        // Allow camel-case if it's a factory function, e.g.
        //   function Missing(): Missing;
        $type = ($__tmp1__ = $func->getDeclarationHeader()->getType()) !== null ? $__tmp1__->getCode() : null;
        if ($type !== null) {
            $type = C\lastx(\explode('\\', C\firstx(\explode('<', Str\trim($type)))));
            if ($type === $name) {
                return $name;
            }
        }
        return $suffix === null ? Str\replace(Str\strip_suffix(Str\strip_prefix(\preg_replace_callback('/[A-Z]+/', function ($matches) {
            return '_' . Str\lowercase($matches[0]);
        }, $head), '_'), '_'), '__', '_') : Str\replace(Str\strip_suffix(Str\strip_prefix(\preg_replace_callback('/[A-Z]+/', function ($matches) {
            return '_' . Str\lowercase($matches[0]);
        }, $head), '_'), '_'), '__', '_') . '_' . $suffix;
    }
    /**
     * @return string
     */
    public final function getSuggestedNameForInstanceMethod(string $name, MethodishDeclaration $_1)
    {
        list($head, $suffix) = self::splitName($name);
        if (\preg_match('/^[a-z][a-zA-Z0-9]+$/', $head) === 1) {
            return $name;
        }
        $name = $suffix === null ? \preg_replace_callback('/_[a-z]/', function ($matches) {
            return Str\uppercase($matches[0][1]);
        }, $head) : \preg_replace_callback('/_[a-z]/', function ($matches) {
            return Str\uppercase($matches[0][1]);
        }, $head) . '_' . $suffix;
        $name[0] = Str\lowercase($name[0]);
        return $name;
    }
    /**
     * @return string
     */
    public final function getSuggestedNameForStaticMethod(string $name, MethodishDeclaration $meth)
    {
        return $this->getSuggestedNameForInstanceMethod($name, $meth);
    }
    /**
     * @return array{0:string, 1:null|string}
     */
    protected static function splitName(string $name)
    {
        $suffixes = ['UNTYPED', 'UNSAFE', 'DEPRECATED'];
        foreach ($suffixes as $suffix) {
            if (Str\ends_with_ci($name, $suffix)) {
                return [Str\strip_suffix(Str\slice($name, 0, \strlen($name) - \strlen($suffix)), '_'), $suffix];
            }
        }
        return [$name, null];
    }
}

