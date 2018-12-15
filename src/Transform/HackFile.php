<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
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
	 * @var PhpParser\Node\Expr|null
	 */
	public $pipe_expr;
}