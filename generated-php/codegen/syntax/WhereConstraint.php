<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0e8e5dbf2149904fdaf69382718ef837>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class WhereConstraint extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'where_constraint';
    /**
     * @var ITypeSpecifier
     */
    private $_left_type;
    /**
     * @var Token
     */
    private $_operator;
    /**
     * @var ITypeSpecifier
     */
    private $_right_type;
    public function __construct(ITypeSpecifier $left_type, Token $operator, ITypeSpecifier $right_type, ?array $source_ref = null)
    {
        $this->_left_type = $left_type;
        $this->_operator = $operator;
        $this->_right_type = $right_type;
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
        $left_type = Node::fromJSON($json['where_constraint_left_type'], $file, $offset, $source, 'ITypeSpecifier');
        $left_type = $left_type !== null ? $left_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_type->getWidth();
        $operator = Node::fromJSON($json['where_constraint_operator'], $file, $offset, $source, 'Token');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $right_type = Node::fromJSON($json['where_constraint_right_type'], $file, $offset, $source, 'ITypeSpecifier');
        $right_type = $right_type !== null ? $right_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_type, $operator, $right_type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_type' => $this->_left_type, 'operator' => $this->_operator, 'right_type' => $this->_right_type]);
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
        $left_type = $rewriter($this->_left_type, $parents);
        $operator = $rewriter($this->_operator, $parents);
        $right_type = $rewriter($this->_right_type, $parents);
        if ($left_type === $this->_left_type && $operator === $this->_operator && $right_type === $this->_right_type) {
            return $this;
        }
        return new static($left_type, $operator, $right_type);
    }
    /**
     * @return null|Node
     */
    public function getLeftTypeUNTYPED()
    {
        return $this->_left_type;
    }
    /**
     * @return static
     */
    public function withLeftType(ITypeSpecifier $value)
    {
        if ($value === $this->_left_type) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasLeftType()
    {
        return $this->_left_type !== null;
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getLeftType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_left_type);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getLeftTypex()
    {
        return $this->getLeftType();
    }
    /**
     * @return null|Node
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(Token $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_left_type, $value, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return EqualToken | AsToken | SuperToken
     */
    /**
     * @return Token
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(Token::class, $this->_operator);
    }
    /**
     * @return EqualToken | AsToken | SuperToken
     */
    /**
     * @return Token
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return null|Node
     */
    public function getRightTypeUNTYPED()
    {
        return $this->_right_type;
    }
    /**
     * @return static
     */
    public function withRightType(ITypeSpecifier $value)
    {
        if ($value === $this->_right_type) {
            return $this;
        }
        return new static($this->_left_type, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasRightType()
    {
        return $this->_right_type !== null;
    }
    /**
     * @return DictionaryTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getRightType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_right_type);
    }
    /**
     * @return DictionaryTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | TypeConstant |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getRightTypex()
    {
        return $this->getRightType();
    }
}

