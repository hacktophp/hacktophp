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

use Facebook\HHAST\{DelimitedComment, EditableList, EditableNode, EndOfFile, EndOfLine, Script};
use Facebook\TypeAssert;
use HH\Lib\{C, Str, Vec};
/**
 * @template-extends AutoFixingASTLinter<Script>
 */
final class LicenseHeaderLinter extends AutoFixingASTLinter
{
    /**
     * @return class-string<Script>
     */
    protected static function getTargetType()
    {
        return Script::class;
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<Script>|null
     */
    public function getLintErrorForNode(Script $script, array $_parents)
    {
        $first = $script->getDeclarations()->getItems()[1] ?? null;
        if ($first === null) {
            return null;
        }
        if ($first instanceof EndOfFile) {
            return null;
        }
        $leading = $first->getFirstToken() ? $first->getFirstToken()->getLeading() : null;
        if ($leading instanceof EditableList) {
            $leading = $leading->getItems()[0];
        }
        if ($leading instanceof DelimitedComment) {
            if ($leading->getText() === self::getLicenseHeaderForPath(\dirname($this->getFile()->getPath()))) {
                return null;
            }
        }
        return new ASTLintError($this, 'Incorrect or missing license header', $script);
    }
    /**
     * @return string
     */
    public function getPrettyTextForNode(Script $node)
    {
        return EditableList::createNonEmptyListOrMissing(Vec\take($node->getDeclarations()->getItems(), 2))->getCode();
    }
    /**
     * @param ASTLintError<Script> $e
     *
     * @return string
     */
    protected function getTitleForFix(ASTLintError $e)
    {
        if (Str\contains_ci($e->getBlameCode(), 'copyright')) {
            return 'Replace license header';
        }
        return 'Add license header';
    }
    /**
     * @return Script
     */
    public function getFixedNode(Script $node)
    {
        $first = $node->getDeclarations()->getItems()[1]->getFirstTokenx();
        $leading = $first->getLeading();
        if ($leading instanceof EditableList) {
            $leading = $leading->getItems();
        } else {
            if ($leading === null) {
                $leading = [];
            } else {
                $leading = [$leading];
            }
        }
        $key = C\find_key($leading, function ($item) {
            return $item instanceof DelimitedComment && Str\contains_ci($item->getText(), 'copyright');
        });
        if ($key !== null) {
            $existing = $leading[$key];
            $next = $leading[$key + 1] ?? null;
            $next_next = $leading[$key + 2] ?? null;
            $new = [new DelimitedComment(TypeAssert\not_null(self::getLicenseHeaderForPath(\dirname($this->getFile()->getPath()))))];
            if (!($next instanceof EndOfLine && $next_next instanceof EndOfLine)) {
                $new[] = new EndOfLine("\n");
            }
            return $node->replace($existing, EditableList::createNonEmptyListOrMissing($new));
        }
        $leading = \array_merge($leading, [new DelimitedComment(TypeAssert\not_null(self::getLicenseHeaderForPath(\dirname($this->getFile()->getPath())))), new EndOfLine("\n"), new EndOfLine("\n")]);
        return $node->replace($first, $first->withLeading(EditableList::createNonEmptyListOrMissing($leading)));
    }
    /**
     * @return bool
     */
    public static function shouldLintFile(File $file)
    {
        return self::getLicenseHeaderForPath($file->getPath()) !== null;
    }
    /**
     * @return null|string
     */
    private static function getLicenseHeaderForPath(string $path)
    {
        if (\file_exists($path . '/.LICENSE_HEADER.hh.txt')) {
            $header = \file_get_contents($path . '/.LICENSE_HEADER.hh.txt');
            return $header === '' || $header === "\n" ? null : Str\trim($header);
        }
        $path = \dirname(\realpath($path));
        if (Str\starts_with($path, \realpath(\Facebook\AutoloadMap\Generated\root()))) {
            return self::getLicenseHeaderForPath($path);
        }
        return null;
    }
}

