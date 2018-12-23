<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
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