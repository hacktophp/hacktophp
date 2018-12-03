<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class FunctionDeclarationTransformer
{
	public static function transform(HHAST\Node\FunctionDeclaration $node, HackFile $file) : PhpParser\Node
	{
		var_dump('here');
	}
}