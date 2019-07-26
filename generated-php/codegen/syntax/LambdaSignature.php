<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ae3ec45cb8a1ecef07d32c47aec8b222>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class LambdaSignature extends Node implements ILambdaSignature
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'lambda_signature';
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IParameter>>|null
     */
    private $_parameters;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var null|ColonToken
     */
    private $_colon;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @param NodeList<ListItem<IParameter>>|null $parameters
     */
    public function __construct(LeftParenToken $left_paren, ?NodeList $parameters, RightParenToken $right_paren, ?ColonToken $colon, ?ITypeSpecifier $type, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
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
        $left_paren = Node::fromJSON($json['lambda_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $parameters = Node::fromJSON($json['lambda_parameters'], $file, $offset, $source, 'NodeList<ListItem<IParameter>>');
        $offset += (($__tmp1__ = $parameters) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['lambda_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $colon = Node::fromJSON($json['lambda_colon'], $file, $offset, $source, 'ColonToken');
        $offset += (($__tmp2__ = $colon) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['lambda_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp3__ = $type) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_paren, $parameters, $right_paren, $colon, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $parameters = $this->_parameters === null ? null : $rewriter($this->_parameters, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $colon = $this->_colon === null ? null : $rewriter($this->_colon, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        if ($left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type) {
            return $this;
        }
        return new static($left_paren, $parameters, $right_paren, $colon, $type);
    }
    /**
     * @return null|Node
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($value, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @param NodeList<ListItem<IParameter>>|null $value
     *
     * @return static
     */
    public function withParameters(?NodeList $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return $this->_parameters !== null;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<VariadicParameter>> | null
     */
    /**
     * @return NodeList<ListItem<IParameter>>|null
     */
    public function getParameters()
    {
        return $this->_parameters;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<VariadicParameter>>
     */
    /**
     * @return NodeList<ListItem<IParameter>>
     */
    public function getParametersx()
    {
        return TypeAssert\not_null($this->getParameters());
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(RightParenToken $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $value, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return null|Node
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(?ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        return $this->_colon;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return TypeAssert\not_null($this->getColon());
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
    public function withType(?ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier
     * | null | SimpleTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier
     * | SimpleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
    }
}

