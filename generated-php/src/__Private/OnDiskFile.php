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

use Facebook\HHAST\File;
use HH\Lib\PseudoRandom;
final class OnDiskFile
{
    /**
     * @var bool
     */
    private $isTempFile;
    /**
     * @var string
     */
    private $path;
    public function __construct(File $file)
    {
        if (!$file->isDirty()) {
            $this->path = $file->getPath();
            $this->isTempFile = false;
            return;
        }
        $this->isTempFile = true;
        $this->path = \sys_get_temp_dir() . '/hhast-tmp-' . PseudoRandom\string(16, 'abcdefghijklmnopqrstuvwxyz1234567890');
        \file_put_contents($this->path, $file->getContents());
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @return void
     */
    public function __dispose()
    {
        if ($this->isTempFile) {
            \unlink($this->path);
        }
    }
}

