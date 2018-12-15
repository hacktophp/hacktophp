<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class Scope
{
	/**
	 * @var array<string, string>
	 */
	public $referenced_vars = [];

	/**
	 * @var PhpParser\Node\Expr|null
	 */
	public $pipe_expr;
}