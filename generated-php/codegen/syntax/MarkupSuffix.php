<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4e3899ccecc0b87eb43c86aa29206487>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class MarkupSuffix extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'markup_suffix';
    /**
     * @var LessThanQuestionToken
     */
    private $_less_than_question;
    /**
     * @var NameToken
     */
    private $_name;
    public function __construct(LessThanQuestionToken $less_than_question, NameToken $name, ?__Private\SourceRef $source_ref = null)
    {
        $this->_less_than_question = $less_than_question;
        $this->_name = $name;
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
        $less_than_question = Node::fromJSON($json['markup_suffix_less_than_question'], $file, $offset, $source, 'LessThanQuestionToken');
        $less_than_question = $less_than_question !== null ? $less_than_question : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $less_than_question->getWidth();
        $name = Node::fromJSON($json['markup_suffix_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($less_than_question, $name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['less_than_question' => $this->_less_than_question, 'name' => $this->_name]);
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
        $less_than_question = $rewriter($this->_less_than_question, $parents);
        $name = $rewriter($this->_name, $parents);
        if ($less_than_question === $this->_less_than_question && $name === $this->_name) {
            return $this;
        }
        return new static($less_than_question, $name);
    }
    /**
     * @return null|Node
     */
    public function getLessThanQuestionUNTYPED()
    {
        return $this->_less_than_question;
    }
    /**
     * @return static
     */
    public function withLessThanQuestion(LessThanQuestionToken $value)
    {
        if ($value === $this->_less_than_question) {
            return $this;
        }
        return new static($value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasLessThanQuestion()
    {
        return $this->_less_than_question !== null;
    }
    /**
     * @return LessThanQuestionToken
     */
    /**
     * @return LessThanQuestionToken
     */
    public function getLessThanQuestion()
    {
        return TypeAssert\instance_of(LessThanQuestionToken::class, $this->_less_than_question);
    }
    /**
     * @return LessThanQuestionToken
     */
    /**
     * @return LessThanQuestionToken
     */
    public function getLessThanQuestionx()
    {
        return $this->getLessThanQuestion();
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
    public function withName(NameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_less_than_question, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

