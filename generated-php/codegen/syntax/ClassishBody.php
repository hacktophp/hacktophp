<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<032ecf7e80fd86006b0b16e82224248f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ClassishBody extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'classish_body';
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<IClassBodyDeclaration>|null
     */
    private $_elements;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<IClassBodyDeclaration>|null $elements
     */
    public function __construct(LeftBraceToken $left_brace, ?NodeList $elements, RightBraceToken $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_brace = $left_brace;
        $this->_elements = $elements;
        $this->_right_brace = $right_brace;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $left_brace = Node::fromJSON($json['classish_body_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $elements = Node::fromJSON($json['classish_body_elements'], $file, $offset, $source, 'NodeList<IClassBodyDeclaration>');
        $offset += (($__tmp1__ = $elements) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['classish_body_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_brace, $elements, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_brace' => $this->_left_brace, 'elements' => $this->_elements, 'right_brace' => $this->_right_brace]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $left_brace = $rewriter($this->_left_brace, $parents);
        $elements = $this->_elements === null ? null : $rewriter($this->_elements, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($left_brace === $this->_left_brace && $elements === $this->_elements && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $elements, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($value, $this->_elements, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getElementsUNTYPED()
    {
        return $this->_elements;
    }
    /**
     * @param NodeList<IClassBodyDeclaration>|null $value
     *
     * @return static
     */
    public function withElements(?NodeList $value)
    {
        if ($value === $this->_elements) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasElements()
    {
        return $this->_elements !== null;
    }
    /**
     * @return NodeList<ConstDeclaration> | NodeList<IClassBodyDeclaration> |
     * NodeList<MethodishDeclaration> | NodeList<IHasAttributeSpec> |
     * NodeList<PropertyDeclaration> | NodeList<RequireClause> |
     * NodeList<TraitUse> | NodeList<TraitUseConflictResolution> |
     * NodeList<TypeConstDeclaration> | NodeList<XHPChildrenDeclaration> |
     * NodeList<XHPClassAttributeDeclaration> | null
     */
    /**
     * @return NodeList<IClassBodyDeclaration>|null
     */
    public function getElements()
    {
        return $this->_elements;
    }
    /**
     * @return NodeList<ConstDeclaration> | NodeList<IClassBodyDeclaration> |
     * NodeList<MethodishDeclaration> | NodeList<IHasAttributeSpec> |
     * NodeList<PropertyDeclaration> | NodeList<RequireClause> |
     * NodeList<TraitUse> | NodeList<TraitUseConflictResolution> |
     * NodeList<TypeConstDeclaration> | NodeList<XHPChildrenDeclaration> |
     * NodeList<XHPClassAttributeDeclaration>
     */
    /**
     * @return NodeList<IClassBodyDeclaration>
     */
    public function getElementsx()
    {
        return TypeAssert\not_null($this->getElements());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_left_brace, $this->_elements, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

