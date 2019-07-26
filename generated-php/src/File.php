<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

final class File
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $contents;
    /**
     * @var bool
     */
    private $isDirty;
    private function __construct(string $path, string $contents, bool $isDirty)
    {
        $this->path = $path;
        $this->contents = $contents;
        $this->isDirty = $isDirty;
    }
    /**
     * @return bool
     */
    public function isDirty()
    {
        return $this->isDirty;
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }
    /**
     * @return static
     */
    public function withContents(string $contents)
    {
        if ($contents === $this->contents) {
            return $this;
        }
        return new self($this->path, $contents, true);
    }
    /**
     * @return static
     */
    public static function fromPath(string $path)
    {
        return new File($path, \file_get_contents($path), false);
    }
    /**
     * @return static
     */
    public static function fromPathAndContents(string $path, string $contents)
    {
        return new File($path, $contents, true);
    }
    /**
     * @return string
     */
    public function getHash()
    {
        return \sodium_crypto_generichash($this->contents, self::getHashKey());
    }
    /**
     * @return string
     */
    private static function getHashKey()
    {
        // If the way we parse things is changed without changing the actual nodes
        // (e.g. await precendence changes for await-as-an-expression), the parser
        // schema version may be unchanged, but HHVM_REPO_SCHEMA will be changed.
        return \sodium_crypto_generichash(SCHEMA_VERSION . '!' . \HHVM_REPO_SCHEMA, null, \SODIUM_CRYPTO_GENERICHASH_KEYBYTES);
    }
}