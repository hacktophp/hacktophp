<?php
namespace Facebook\HHAST\__Private\LSPImpl;

use Facebook\HHAST\Linters as Linters;
use Facebook\HHAST\__Private\LSPLib as LSPLib;
use Facebook\HHAST\__Private\LintRunConfig as LintRunConfig;
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
    public $openFiles = array();
    /**
     * @var array<string, array<int, Linters\LintError>>
     */
    public $lintErrors = array();
    /**
     * @var bool
     */
    public $ignoreFilenameExtensions = false;
}

