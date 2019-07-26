<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<50e1599f6152c2e73ef6a58dde2dc9bb>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ObjectCreationExpression extends Node implements IFunctionCallishExpression, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'object_creation_expression';
    /**
     * @var NewToken
     */
    private $_new_keyword;
    /**
     * @var ConstructorCall
     */
    private $_object;
    public function __construct(NewToken $new_keyword, ConstructorCall $object, ?__Private\SourceRef $source_ref = null)
    {
        $this->_new_keyword = $new_keyword;
        $this->_object = $object;
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
        $new_keyword = Node::fromJSON($json['object_creation_new_keyword'], $file, $offset, $source, 'NewToken');
        $new_keyword = $new_keyword !== null ? $new_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $new_keyword->getWidth();
        $object = Node::fromJSON($json['object_creation_object'], $file, $offset, $source, 'ConstructorCall');
        $object = $object !== null ? $object : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $object->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($new_keyword, $object, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['new_keyword' => $this->_new_keyword, 'object' => $this->_object]);
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
        $new_keyword = $rewriter($this->_new_keyword, $parents);
        $object = $rewriter($this->_object, $parents);
        if ($new_keyword === $this->_new_keyword && $object === $this->_object) {
            return $this;
        }
        return new static($new_keyword, $object);
    }
    /**
     * @return null|Node
     */
    public function getNewKeywordUNTYPED()
    {
        return $this->_new_keyword;
    }
    /**
     * @return static
     */
    public function withNewKeyword(NewToken $value)
    {
        if ($value === $this->_new_keyword) {
            return $this;
        }
        return new static($value, $this->_object);
    }
    /**
     * @return bool
     */
    public function hasNewKeyword()
    {
        return $this->_new_keyword !== null;
    }
    /**
     * @return NewToken
     */
    /**
     * @return NewToken
     */
    public function getNewKeyword()
    {
        return TypeAssert\instance_of(NewToken::class, $this->_new_keyword);
    }
    /**
     * @return NewToken
     */
    /**
     * @return NewToken
     */
    public function getNewKeywordx()
    {
        return $this->getNewKeyword();
    }
    /**
     * @return null|Node
     */
    public function getObjectUNTYPED()
    {
        return $this->_object;
    }
    /**
     * @return static
     */
    public function withObject(ConstructorCall $value)
    {
        if ($value === $this->_object) {
            return $this;
        }
        return new static($this->_new_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasObject()
    {
        return $this->_object !== null;
    }
    /**
     * @return ConstructorCall
     */
    /**
     * @return ConstructorCall
     */
    public function getObject()
    {
        return TypeAssert\instance_of(ConstructorCall::class, $this->_object);
    }
    /**
     * @return ConstructorCall
     */
    /**
     * @return ConstructorCall
     */
    public function getObjectx()
    {
        return $this->getObject();
    }
}

