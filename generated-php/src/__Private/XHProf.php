<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use HH\Lib\{Dict, Math, Str};
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
        invariant(self::$enabled === false, "Can't enable twice");
        self::$enabled = true;
        \xhprof_enable();
    }
    /**
     * @return array<string, mixed>
     */
    public static function disable()
    {
        invariant(self::$enabled === true, "Can't disable twice");
        self::$enabled = false;
        $raw = Dict\map(\xhprof_disable(), function ($v) {
            return (int) $v['wt'];
        });
        $inclusive = [];
        $callers = [];
        $callees = [];
        foreach ($raw as $name => $wall) {
            $parts = \explode('==>', $name);
            $caller = $parts[0];
            $callee = $parts[1] ?? null;
            if ($callee === null) {
                $inclusive[$caller] = $wall;
                continue;
            }
            $inclusive[$callee] = ($inclusive[$callee] ?? 0) + $wall;
            $callers[$callee] = $callers[$callee] ?? [];
            $callers[$callee][$caller] = $wall;
            $callees[$caller] = $callees[$caller] ?? [];
            $callees[$caller][$callee] = $wall;
        }
        return Dict\map_with_key($inclusive, function ($func, $inc_wall) use($func_callers, $callers, $func_callees, $callees, $ex_wall) {
            $func_callers = $callers[$func] ?? [];
            $func_callees = $callees[$func] ?? [];
            $ex_wall = $inc_wall - Math\sum($func_callees);
            return ['inclusive' => $inc_wall, 'exclusive' => $ex_wall, 'callers' => $func_callers, 'callees' => $func_callees];
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
        \fwrite($handle, "----- XHPROF -----\n");
        foreach ($counters as $name => $data) {
            \fprintf($handle, "%s\n\tInclusive: %.5fs\n\tExclusive: %.5fs\n", $name, $data['inclusive'] / $scale, $data['exclusive'] / $scale);
            \fwrite($handle, "\tCallees:\n");
            $callees = Dict\sort_by($data['callees'], function ($v) {
                return -$v;
            });
            foreach ($callees as $callee => $wall) {
                \fprintf($handle, "\t - %8.2fs %s\n", $wall / $scale, $callee);
            }
            \fwrite($handle, "\tCallers:\n");
            $callers = Dict\sort_by($data['callers'], function ($v) {
                return -$v;
            });
            foreach ($callers as $caller => $wall) {
                \fprintf($handle, "\t - %8.2fs %s\n", $wall / $scale, $caller);
            }
        }
        \fwrite($handle, "----- XHPROF -----\n");
    }
}

