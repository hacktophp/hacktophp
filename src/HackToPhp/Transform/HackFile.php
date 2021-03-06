<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class HackFile
{
	/**
	 * @var ?string
	 */
	public $namespace;

	/**
	 * @var array<string, string>
	 */
	public $aliased_namespaces = [];

	/**
	 * @var array<string, string>
	 */
	public $aliased_types = [];

	/**
	 * @var array<string, string>
	 */
	public $aliased_functions = [];

	/**
	 * @var array<string, string>
	 */
	public $aliased_constants = [];

	/**
	 * @var bool
	 */
	public $is_hack = true;

	/**
	 * @var int
	 */
	public $tmp_count = 0;
}