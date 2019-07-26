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

use Facebook\TypeAssert;
use Facebook\HHAST\File;
final class ParserCache
{
    /**
     * @return static
     */
    public static function get()
    {
        return new self();
    }
    /**
     * @return array<string, mixed>|null
     */
    public function fetch(File $file)
    {
        $path = self::getCacheFileName($file);
        if ($path === null) {
            return null;
        }
        if (!\file_exists($path)) {
            return null;
        }
        try {
            $cache = TypeAssert\matches_type_structure(self::getCacheTS(), \unserialize(\is_string($__tmp1__ = \gzinflate(\file_get_contents($path))) ? $__tmp1__ : (function () {
                throw new \TypeError('Failed assertion');
            })()));
        } catch (\Exception $_) {
            \unlink($path);
            return null;
        }
        if ($cache['hash'] !== \bin2hex($file->getHash())) {
            return null;
        }
        $data = $cache['ast'];
        invariant($data['version'] === \Facebook\HHAST\SCHEMA_VERSION, "Expected schema version mismatch to be detected by hash - %s vs %s", \Facebook\HHAST\SCHEMA_VERSION, $data['version'] ?? '<none>');
        $data['program_text'] = $file->getContents();
        return $data;
    }
    /**
     * @param array<string, mixed> $ast
     *
     * @return void
     */
    public function store(File $file, array $ast)
    {
        $path = self::getCacheFileName($file);
        if ($path === null) {
            return;
        }
        unset($ast['program_text']);
        \file_put_contents($path, \gzdeflate(\serialize(['hash' => \bin2hex($file->getHash()), 'ast' => $ast])));
    }
    /**
     * @return null|string
     */
    private static function getCacheFileName(File $file)
    {
        if ($file->isDirty()) {
            return null;
        }
        $source = $file->getPath();
        return \dirname($source) . '/.' . \basename($source) . '.hhast.parser-cache';
    }
    /**
     * @return TypeStructure<mixed>
     */
    private static function getCacheTS()
    {
        return type_structure(self::class, 'TCached');
    }
}

