<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\Linters;
use Facebook\HHAST\__Private\LSPLib;
use Facebook\HHAST\__Private\LintRunConfig;
final class ServerState extends LSPLib\ServerState
{
    /**
     * @var null|LintRunConfig
     */
    public $config = null;
    /**
     * @var LintMode::WHOLE_PROJECT|LintMode::OPEN_FILES
     */
    public $lintMode = LintMode::WHOLE_PROJECT;
    /**
     * @var bool
     */
    public $lintAsYouType = true;
    /**
     * @var array<string, string>
     */
    public $openFiles = [];
    /**
     * @var array<string, array<int, Linters\LintError>>
     */
    public $lintErrors = [];
    // For Unit Tests
    /**
     * @var bool
     */
    public $ignoreFilenameExtensions = false;
}

