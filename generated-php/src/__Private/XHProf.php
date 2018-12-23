<?php
namespace Facebook\HHAST\__Private;

use HH\Lib\{Dict as Dict, Math as Math, Str as Str};
abstract final class XHProf
{
    /**
     * @var bool
     */
    private static $enabled = false;
    /**
     * @return void
     */
    public static function enable()
    {
        invariant(self::$enabled === false, 'Can\'t enable twice');
        self::$enabled = true;
        \xhprof_enable();
    }
    /**
     * @return array<string, mixed>
     */
    public static function disable()
    {
        invariant(self::$enabled === true, 'Can\'t disable twice');
        self::$enabled = false;
        $raw = Dict\map(\xhprof_disable(), function ($v) {
            return (int) $v['wt'];
        });
        $inclusive = array();
        $callers = array();
        $callees = array();
        foreach ($raw as $name => $wall) {
            $parts = \explode('==>', $name);
            $caller = $parts[0];
            $callee = $parts[1] ?? null;
            if ($callee === null) {
                $inclusive[$caller] = $wall;
                continue;
            }
            $inclusive[$callee] = ($inclusive[$callee] ?? 0) + $wall;
            $callers[$callee] = $callers[$callee] ?? array();
            $callers[$callee][$caller] = $wall;
            $callees[$caller] = $callees[$caller] ?? array();
            $callees[$caller][$callee] = $wall;
        }
        return Dict\map_with_key($inclusive, function ($func, $inc_wall) use($func_callers, $callers, $func_callees, $callees, $ex_wall) {
            $func_callers = $callers[$func] ?? array();
            $func_callees = $callees[$func] ?? array();
            $ex_wall = $inc_wall - Math\sum($func_callees);
            return array('inclusive' => $inc_wall, 'exclusive' => $ex_wall, 'callers' => $func_callers, 'callees' => $func_callees);
        });
    }
    /**
     * @param resource $handle
     *
     * @return void
     */
    public static function disableAndDump($handle)
    {
        self::dump($handle, self::disable());
    }
    /**
     * @param resource $handle
     * @param array<string, mixed> $counters
     *
     * @return void
     */
    public static function dump($handle, array $counters)
    {
        $counters = Dict\sort_by($counters, function ($row) {
            return -$row['inclusive'];
        });
        $scale = 1000000.0;
        \fwrite($handle, '----- XHPROF -----
');
        foreach ($counters as $name => $data) {
            \fprintf($handle, '%s
	Inclusive: %.5fs
	Exclusive: %.5fs
', $name, $data['inclusive'] / $scale, $data['exclusive'] / $scale);
            \fwrite($handle, '	Callees:
');
            $callees = Dict\sort_by($data['callees'], function ($v) {
                return -$v;
            });
            foreach ($callees as $callee => $wall) {
                \fprintf($handle, '	 - %8.2fs %s
', $wall / $scale, $callee);
            }
            \fwrite($handle, '	Callers:
');
            $callers = Dict\sort_by($data['callers'], function ($v) {
                return -$v;
            });
            foreach ($callers as $caller => $wall) {
                \fprintf($handle, '	 - %8.2fs %s
', $wall / $scale, $caller);
            }
        }
        \fwrite($handle, '----- XHPROF -----
');
    }
}

