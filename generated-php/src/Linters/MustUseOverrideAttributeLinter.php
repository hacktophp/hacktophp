<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{AttributeSpecification as AttributeSpecification, ClassishDeclaration as ClassishDeclaration, ClassToken as ClassToken, EditableNode as EditableNode, GenericTypeSpecifier as GenericTypeSpecifier, ListItem as ListItem, MethodishDeclaration as MethodishDeclaration, NameToken as NameToken, PrivateToken as PrivateToken};
use Facebook\TypeAssert as TypeAssert;
use function Facebook\HHAST\resolve_type as resolve_type;
use Facebook\HHAST as HHAST;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
final class MustUseOverrideAttributeLinter extends AutoFixingASTLinter
{
    /**
     * @return MethodishDeclaration::class
     */
    protected static function getTargetType()
    {
        return MethodishDeclaration::class;
    }
    /**
     * @return string
     */
    public function getTitleForFix(LintError $_)
    {
        return 'Add __Override attribute';
    }
    /**
     * @param array<int, EditableNode> $parents
     *
     * @return ASTLintError<MethodishDeclaration>|null
     */
    public function getLintErrorForNode(MethodishDeclaration $node, array $parents)
    {
        $class = TypeAssert\instance_of(ClassishDeclaration::class, C\lastx(Vec\filter($parents, function ($x) {
            return $x instanceof ClassishDeclaration;
        })));
        if ($this->canIgnoreMethod($class, $node)) {
            return null;
        }
        $super = self::findSuper($class, $parents);
        try {
            $method = Str\trim($node->getFunctionDeclHeader()->getName()->getCode());
            $reflection_method = new \ReflectionMethod($super, $method);
            return new ASTLintError($this, Str\format('%s::%s() overrides %s::%s() without <<__Override>>', TypeAssert\not_null(resolve_type(Str\trim($class->getNamex()->getCode()), $node, $parents)), $method, $reflection_method->getDeclaringClass()->getName(), $method), $node);
        } catch (\ReflectionException $e) {
            $method = Str\trim($node->getFunctionDeclHeader()->getName()->getCode());
            return null;
        }
    }
    /**
     * @param array<int, EditableNode> $parents
     *
     * @return string
     */
    private static function findSuper(ClassishDeclaration $class, array $parents)
    {
        $super = C\onlyx($class->getExtendsListx()->getChildren());
        if ($super instanceof ListItem) {
            $super = $super->getItemx();
        }
        if ($super instanceof GenericTypeSpecifier) {
            $super = $super->getClassType();
        }
        return TypeAssert\not_null(resolve_type(Str\trim($super->getCode()), $class, $parents));
    }
    /**
     * @return bool
     */
    private function canIgnoreMethod(ClassishDeclaration $class, MethodishDeclaration $method)
    {
        if (!$class->hasExtendsKeyword()) {
            return true;
        }
        $name = $method->getFunctionDeclHeader()->getName();
        if ($name instanceof HHAST\ConstructToken) {
            return true;
        }
        if ($name instanceof HHAST\DestructToken) {
            return true;
        }
        $private = C\first($method->getFunctionDeclHeader()->getModifiersx()->getDescendantsOfType(PrivateToken::class));
        if ($private !== null) {
            return true;
        }
        if (!$class->getKeyword() instanceof ClassToken) {
            return true;
        }
        $attrs = $method->getAttribute();
        if ($attrs === null) {
            return false;
        }
        $attrs = \array_map(function ($attr) {
            return $attr->getType() instanceof \Facebook\HHAST\Linters\NameToken ? $attr->getType() : null ? ($attr->getType() instanceof \Facebook\HHAST\Linters\NameToken ? $attr->getType() : null)->getText() : null;
        }, $attrs->getAttributes()->getItems());
        return C\contains($attrs, '__Override');
    }
    /**
     * @return string
     */
    public function getPrettyTextForNode(MethodishDeclaration $node)
    {
        $body = $node->getFunctionBody();
        if ($body === null) {
            return $node->getCode();
        }
        return $node->withFunctionBody($body->withStatements(HHAST\Missing())->withRightBrace(HHAST\Missing())->withLeftBrace($body->getLeftBracex()->withTrailing(HHAST\Missing())))->getCode();
    }
    /**
     * @return MethodishDeclaration
     */
    public function getFixedNode(MethodishDeclaration $node)
    {
        $attrs = $node->getAttribute();
        if ($attrs === null) {
            $first_token = $node->getFirstTokenx();
            return $node->withAttribute(new AttributeSpecification(new HHAST\LessThanLessThanToken($first_token->getLeading(), HHAST\Missing()), new HHAST\ConstructorCall(new HHAST\NameToken(HHAST\Missing(), HHAST\Missing(), '__Override'), HHAST\Missing(), HHAST\Missing(), HHAST\Missing()), new HHAST\GreaterThanGreaterThanToken(HHAST\Missing(), Str\contains(C\lastx($first_token->getLeading()->getChildren())->getCode(), '
') ? HHAST\Missing() : new HHAST\WhiteSpace('
'))))->rewriteDescendants(function ($n, $_) use($first_token) {
                return $n === $first_token ? $first_token->withLeading(C\lastx($first_token->getLeading()->getChildren())) : $n;
            });
        }
        $list = $attrs->getAttributes()->toVec();
        $list[] = new HHAST\NameToken(HHAST\Missing(), HHAST\Missing(), '__Override');
        return $node->withAttribute($attrs->withAttributes(new HHAST\EditableList($list))->rewrite(function ($child, $parents) {
            if (!$child instanceof HHAST\ListItem) {
                return $child;
            }
            if (!$child->getItem() instanceof HHAST\ConstructorCall) {
                return $child;
            }
            if ($child->hasSeparator()) {
                return $child;
            }
            return $child->withSeparator(new HHAST\CommaToken(HHAST\Missing(), new HHAST\WhiteSpace(' ')));
        }));
    }
}

