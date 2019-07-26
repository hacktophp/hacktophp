<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1468fce2cc9469fda2c1192f8d28f405>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeConstraint extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_constraint';
    /**
     * @var Token
     */
    private $_keyword;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(Token $keyword, ITypeSpecifier $type, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_type = $type;
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
        $keyword = Node::fromJSON($json['constraint_keyword'], $file, $offset, $source, 'Token');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $type = Node::fromJSON($json['constraint_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'type' => $this->_type]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($keyword === $this->_keyword && $type === $this->_type) {
            return $this;
        }
        return new static($keyword, $type);
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(Token $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return AsToken | SuperToken
     */
    /**
     * @return Token
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(Token::class, $this->_keyword);
    }
    /**
     * @return AsToken | SuperToken
     */
    /**
     * @return Token
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

