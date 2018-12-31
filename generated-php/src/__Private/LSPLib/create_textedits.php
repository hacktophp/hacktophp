<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP;
use Facebook\DiffLib;
use HH\Lib\{C, Str, Vec};
/**
 * @return array<int, LSP\TextEdit>
 */
function create_textedits(string $from, string $to)
{
    $diff = DiffLib\cluster(DiffLib\StringDiff::lines($from, $to)->getDiff());
    $edits = [];
    while (!C\is_empty($diff)) {
        $first = C\firstx($diff);
        $diff = Vec\drop($diff, 1);
        if ($first instanceof DiffLib\DiffKeepOp) {
            continue;
        }
        // If we have a replacement, the deletion always comes first - so, if we
        // have an InsertOp here, it's a pure insertion
        if ($first instanceof DiffLib\DiffInsertOp) {
            $pos = ['line' => $first->getNewPos(), 'character' => 0];
            $edits[] = ['range' => ['start' => $pos, 'end' => $pos], 'newText' => \implode("\n", $first->getContent()) . "\n"];
            continue;
        }
        invariant($first instanceof DiffLib\DiffDeleteOp, 'Expected a DeleteOp, InsertOp, or KeepOp, got %s', \get_class($first));
        $pos = $first->getOldPos();
        $len = \count($first->getContent());
        // if ($first, $next) is (Delete, Insert) we have a replacement
        $next = C\first($diff);
        if (!$next instanceof DiffLib\DiffInsertOp) {
            // (Delete, null|Keep) - just a deletion
            $edits[] = ['range' => ['start' => ['line' => $pos, 'character' => 0], 'end' => ['line' => $pos + $len, 'character' => 0]], 'newText' => ''];
            continue;
        }
        // turn ['remove foo', 'add bar'] into 'replace foo with bar'
        $diff = Vec\drop($diff, 1);
        $a = \implode("\n", $first->getContent());
        $b = \implode("\n", $next->getContent());
        // If they're 'too different' (arbitrary heuristic), replace the whole
        // line
        if (\levenshtein($a, $b) > 0.5 * \strlen($b)) {
            $edits[] = ['range' => ['start' => ['line' => $pos, 'character' => 0], 'end' => ['line' => $pos + $len, 'character' => 0]], 'newText' => \implode("\n", $next->getContent()) . "\n"];
            continue;
        }
        // Just replace characters within the line
        $ildiff = DiffLib\cluster(DiffLib\StringDiff::characters($a, $b)->getDiff());
        $offset_to_pos = function (int $offset) use($haystack, $a, $lines, $first) {
            $haystack = Str\slice($a, 0, $offset);
            $lines = \explode("\n", $haystack);
            return ['line' => $first->getOldPos() + (\count($lines) - 1), 'character' => \strlen(C\lastx($lines))];
        };
        while (!C\is_empty($ildiff)) {
            $ilfirst = C\firstx($ildiff);
            $ildiff = Vec\drop($ildiff, 1);
            if ($ilfirst instanceof DiffLib\DiffKeepOp) {
                continue;
            }
            if ($ilfirst instanceof DiffLib\DiffInsertOp) {
                $ilpos = $offset_to_pos($ilfirst->getNewPos());
                $edits[] = ['range' => ['start' => $ilpos, 'end' => $ilpos], 'newText' => \implode('', $ilfirst->getContent())];
                continue;
            }
            invariant($ilfirst instanceof DiffLib\DiffDeleteOp, 'unhandled op kind');
            $ilnext = C\first($ildiff);
            if (!$ilnext instanceof DiffLib\DiffInsertOp) {
                $edits[] = ['range' => ['start' => $offset_to_pos($ilfirst->getOldPos()), 'end' => $offset_to_pos($ilfirst->getOldPos() + \count($ilfirst->getContent()))], 'newText' => ''];
                continue;
            }
            // Okay, replacement again :)
            $ildiff = Vec\drop($ildiff, 1);
            $edits[] = ['range' => ['start' => $offset_to_pos($ilfirst->getOldPos()), 'end' => $offset_to_pos($ilfirst->getOldPos() + \count($ilfirst->getContent()))], 'newText' => \implode('', $ilnext->getContent())];
        }
    }
    return $edits;
}

