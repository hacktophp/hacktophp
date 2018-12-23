<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
use Facebook\DiffLib as DiffLib;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
/**
 * @return array<int, LSP\TextEdit>
 */
function create_textedits(string $from, string $to)
{
    $diff = DiffLib\cluster(DiffLib\StringDiff::lines($from, $to)->getDiff());
    $edits = array();
    while (!C\is_empty($diff)) {
        $first = C\firstx($diff);
        $diff = Vec\drop($diff, 1);
        if ($first instanceof DiffLib\DiffKeepOp) {
            continue;
        }
        if ($first instanceof DiffLib\DiffInsertOp) {
            $pos = array('line' => $first->getNewPos(), 'character' => 0);
            $edits[] = array('range' => array('start' => $pos, 'end' => $pos), 'newText' => \implode('
', $first->getContent()) . '
');
            continue;
        }
        invariant($first instanceof DiffLib\DiffDeleteOp, 'Expected a DeleteOp, InsertOp, or KeepOp, got %s', \get_class($first));
        $pos = $first->getOldPos();
        $len = \count($first->getContent());
        $next = C\first($diff);
        if (!$next instanceof DiffLib\DiffInsertOp) {
            $edits[] = array('range' => array('start' => array('line' => $pos, 'character' => 0), 'end' => array('line' => $pos + $len, 'character' => 0)), 'newText' => '');
            continue;
        }
        $diff = Vec\drop($diff, 1);
        $a = \implode('
', $first->getContent());
        $b = \implode('
', $next->getContent());
        if (\levenshtein($a, $b) > 0.5 * \strlen($b)) {
            $edits[] = array('range' => array('start' => array('line' => $pos, 'character' => 0), 'end' => array('line' => $pos + $len, 'character' => 0)), 'newText' => \implode('
', $next->getContent()) . '
');
            continue;
        }
        $ildiff = DiffLib\cluster(DiffLib\StringDiff::characters($a, $b)->getDiff());
        $offset_to_pos = function (int $offset) use($haystack, $a, $lines, $first) {
            $haystack = Str\slice($a, 0, $offset);
            $lines = \explode('
', $haystack);
            return array('line' => $first->getOldPos() + (\count($lines) - 1), 'character' => \strlen(C\lastx($lines)));
        };
        while (!C\is_empty($ildiff)) {
            $ilfirst = C\firstx($ildiff);
            $ildiff = Vec\drop($ildiff, 1);
            if ($ilfirst instanceof DiffLib\DiffKeepOp) {
                continue;
            }
            if ($ilfirst instanceof DiffLib\DiffInsertOp) {
                $ilpos = $offset_to_pos($ilfirst->getNewPos());
                $edits[] = array('range' => array('start' => $ilpos, 'end' => $ilpos), 'newText' => \implode('', $ilfirst->getContent()));
                continue;
            }
            invariant($ilfirst instanceof DiffLib\DiffDeleteOp, 'unhandled op kind');
            $ilnext = C\first($ildiff);
            if (!$ilnext instanceof DiffLib\DiffInsertOp) {
                $edits[] = array('range' => array('start' => $offset_to_pos($ilfirst->getOldPos()), 'end' => $offset_to_pos($ilfirst->getOldPos() + \count($ilfirst->getContent()))), 'newText' => '');
                continue;
            }
            $ildiff = Vec\drop($ildiff, 1);
            $edits[] = array('range' => array('start' => $offset_to_pos($ilfirst->getOldPos()), 'end' => $offset_to_pos($ilfirst->getOldPos() + \count($ilfirst->getContent()))), 'newText' => \implode('', $ilnext->getContent()));
        }
    }
    return $edits;
}

