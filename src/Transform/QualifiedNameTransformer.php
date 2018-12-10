<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class QualifiedNameTransformer
{
	public static function transform(HHAST\QualifiedName $node) : PhpParser\Node\Name
	{
		$name = self::getText($node);

		return $name[0] === '\\'
			? new PhpParser\Node\Name\FullyQualified(substr($name, 1))
			: new PhpParser\Node\Name($name);
	}

	public static function getText(HHAST\QualifiedName $node) : string
	{
		return implode(
			'\\',
			array_map(
				function(HHAST\ListItem $list_item) {
					$item = $list_item->getItem();
					
					if (!$item) {
						return '';
					}

					return $item->getText();
				},
				$node->getParts()->getChildren()
			)
		);
	}
}