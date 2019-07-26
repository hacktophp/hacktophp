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

use HH\Lib\{Dict, Math, Str, Vec};
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
     * @return string
     */
    public static function disableAndGenerateDot()
    {
        return self::generateDot(self::disable());
    }
    /**
     * @param array<string, mixed> $counters
     *
     * @return string
     */
    public static function generateDot(array $counters)
    {
        $counters = Dict\sort_by($counters, function ($row) {
            return -$row['inclusive'];
        });
        $scale = 1000000.0;
        $out = "Digraph D {\n";
        $cull_rate = 0.01;
        $alert_rate = 0.3;
        $node_count = 0;
        $node_ids = [];
        $edges = [];
        $max = (double) (($__tmp1__ = Math\max(\array_map(function ($data) {
            return $data['inclusive'];
        }, $counters))) !== null ? $__tmp1__ : (function () {
            throw new \TypeError('Failed assertion');
        })());
        $cull = $cull_rate * $max;
        $alert = $alert_rate * $max;
        foreach ($counters as $name => $data) {
            if ($data['inclusive'] < $cull) {
                continue;
            }
            $this_id = $node_count;
            $node_ids[$name] = $this_id;
            $out .= Str\format("node_%d [ label=\"%s\nInclusive: %.5fs\nExclusive: %.5fs\" penwidth=%.1f %s]\n", $this_id, Str\replace($name, "\\", "\\\\"), $data['inclusive'] / $scale, $data['exclusive'] / $scale, Math\maxva(1.0, 5 * $data['inclusive'] / $max), $data['inclusive'] > $alert ? 'fillcolor="#ff9999" style=filled ' : '');
            $callees = Dict\sort_by($data['callees'], function ($v) {
                return -$v;
            });
            foreach ($callees as $callee => $wall) {
                $edges[] = [$this_id, $callee, $wall / $scale];
            }
            $node_count++;
        }
        $max = ($__tmp2__ = Math\max(\array_map(function ($edge) {
            return $edge[2];
        }, $edges))) !== null ? $__tmp2__ : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $cull = $cull_rate * $max;
        foreach ($edges as list($caller, $callee, $wall)) {
            if ($wall < $cull) {
                continue;
            }
            $callee = $node_ids[$callee] ?? null;
            if (\is_null($callee)) {
                continue;
            }
            $out .= Str\format("node_%d -> node_%d [ label=\" %.5fs\" penwidth=\"%.1f\"]\n", $caller, $callee, $wall, Math\maxva(1.0, 5 * $wall / $max));
        }
        $out .= "}\n";
        return $out;
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

