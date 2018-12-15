<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class ConstDeclarationTransformer
{
	public static function transform(HHAST\ConstDeclaration $node, HackFile $file, bool $class_method) : PhpParser\Node\Stmt
	{
		$abstract = false;

		$flags = 0;
		$visibility = $node->hasVisibility() ? $node->getVisibility() : null;

		if ($visibility instanceof HHAST\PublicToken) {
				$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
		} elseif ($visibility instanceof HHAST\ProtectedToken) {
			$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
		} elseif ($visibility instanceof HHAST\PrivateToken) {
			$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
		}

		$type = $node->hasTypeSpecifier() ? $node->getTypeSpecifier() : null;

		$attributes = [];

		if ($type) {
			$type_string = TypeTransformer::transform($type, $file);
			
			$psalm_type = Psalm\Type::parseString($type_string);

			$docblock = [
				'description' => '',
				'specials' => [],
			];
			$docblock['specials']['var'] = [$psalm_type->toNamespacedString($file->namespace, [], null, false)];

			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'] = [
				new \PhpParser\Comment\Doc(rtrim($docblock_string))
			];
		}

		$declarators = $node->getDeclarators();

		$const_consts = [];

		foreach ($declarators->getChildren() as $declarator) {
			$declarator = $declarator->getItem();
			$value = ExpressionTransformer::transform($declarator->getInitializer(), $file);

			$const_consts[] = new PhpParser\Node\Const_(
				$declarator->getName()->getText(),
				$value
			);
		}

		if ($class_method) {
			return new PhpParser\Node\Stmt\ClassConst(
				$const_consts,
				$flags,
				$attributes
			);
		}

		return new PhpParser\Node\Stmt\Const_(
			$const_consts,
			$attributes
		);
	}
}