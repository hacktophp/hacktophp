<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class Project
{
	/** @var array<string, string> */
	public $types = [];

	/**
	 * @var bool
	 */
	public $use_php_return_types = false;
}