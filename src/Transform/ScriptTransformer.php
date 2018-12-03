<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST\Node;

class ScriptTransformer
{
	public static function transform(Node\Script $node, HackFile $file)
	{
		return NodeTransformer::transformList($node->getDeclarations(), $file);
	}
}