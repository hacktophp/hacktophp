<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{FunctionDeclaration as FunctionDeclaration, MethodishDeclaration as MethodishDeclaration};
use HH\Lib\{C as C, Str as Str};
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
        $type = $func->getDeclarationHeader()->getType() ? $func->getDeclarationHeader()->getType()->getCode() : null;
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
    public final function getSuggestedNameForInstanceMethod(string $name, MethodishDeclaration $_)
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
        $suffixes = array('UNTYPED', 'UNSAFE', 'DEPRECATED');
        foreach ($suffixes as $suffix) {
            if (Str\ends_with_ci($name, $suffix)) {
                return array(Str\strip_suffix(Str\slice($name, 0, \strlen($name) - \strlen($suffix)), '_'), $suffix);
            }
        }
        return array($name, null);
    }
}

