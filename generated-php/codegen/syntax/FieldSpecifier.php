<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b8bf390826e5e47eb26e7ce511955922>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FieldSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'field_specifier';
    /**
     * @var null|QuestionToken
     */
    private $_question;
    /**
     * @var IExpression
     */
    private $_name;
    /**
     * @var EqualGreaterThanToken
     */
    private $_arrow;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(?QuestionToken $question, IExpression $name, EqualGreaterThanToken $arrow, ITypeSpecifier $type, ?__Private\SourceRef $source_ref = null)
    {
        $this->_question = $question;
        $this->_name = $name;
        $this->_arrow = $arrow;
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
        $question = Node::fromJSON($json['field_question'], $file, $offset, $source, 'QuestionToken');
        $offset += (($__tmp1__ = $question) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $name = Node::fromJSON($json['field_name'], $file, $offset, $source, 'IExpression');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $arrow = Node::fromJSON($json['field_arrow'], $file, $offset, $source, 'EqualGreaterThanToken');
        $arrow = $arrow !== null ? $arrow : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $arrow->getWidth();
        $type = Node::fromJSON($json['field_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($question, $name, $arrow, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['question' => $this->_question, 'name' => $this->_name, 'arrow' => $this->_arrow, 'type' => $this->_type]);
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
        $question = $this->_question === null ? null : $rewriter($this->_question, $parents);
        $name = $rewriter($this->_name, $parents);
        $arrow = $rewriter($this->_arrow, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($question === $this->_question && $name === $this->_name && $arrow === $this->_arrow && $type === $this->_type) {
            return $this;
        }
        return new static($question, $name, $arrow, $type);
    }
    /**
     * @return null|Node
     */
    public function getQuestionUNTYPED()
    {
        return $this->_question;
    }
    /**
     * @return static
     */
    public function withQuestion(?QuestionToken $value)
    {
        if ($value === $this->_question) {
            return $this;
        }
        return new static($value, $this->_name, $this->_arrow, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasQuestion()
    {
        return $this->_question !== null;
    }
    /**
     * @return null | QuestionToken
     */
    /**
     * @return null|QuestionToken
     */
    public function getQuestion()
    {
        return $this->_question;
    }
    /**
     * @return QuestionToken
     */
    /**
     * @return QuestionToken
     */
    public function getQuestionx()
    {
        return TypeAssert\not_null($this->getQuestion());
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(IExpression $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_question, $value, $this->_arrow, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return IExpression
     */
    public function getName()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_name);
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return IExpression
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EqualGreaterThanToken $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_question, $this->_name, $value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return $this->_arrow !== null;
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrow()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return $this->getArrow();
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
        return new static($this->_question, $this->_name, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

