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

use Facebook\HHAST\{File, Script};
final class ASTCache extends InMemoryFileKeyedCache
{
    /**
     * @var int
     */
    const COMPLETE_LIMIT = 10;
    /**
     * @return ASTCache
     */
    public static function get()
    {
        return new self();
    }
    /**
     * @return \Amp\Promise<Script>
     */
    protected function fetchUncachedAsync(File $file)
    {
        return \Facebook\HHAST\from_file_async($file);
    }
}

