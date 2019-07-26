<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<498bbf8a7694f59cbba5d0abe623a1b1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class GenericTypeSpecifier extends Node implements ISimpleCreationSpecifier, ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'generic_type_specifier';
    /**
     * @var Node
     */
    private $_class_type;
    /**
     * @var TypeArguments
     */
    private $_argument_list;
    public function __construct(Node $class_type, TypeArguments $argument_list, ?__Private\SourceRef $source_ref = null)
    {
        $this->_class_type = $class_type;
        $this->_argument_list = $argument_list;
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
        $class_type = Node::fromJSON($json['generic_class_type'], $file, $offset, $source, 'Node');
        $class_type = $class_type !== null ? $class_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $class_type->getWidth();
        $argument_list = Node::fromJSON($json['generic_argument_list'], $file, $offset, $source, 'TypeArguments');
        $argument_list = $argument_list !== null ? $argument_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $argument_list->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($class_type, $argument_list, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['class_type' => $this->_class_type, 'argument_list' => $this->_argument_list]);
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
        $class_type = $rewriter($this->_class_type, $parents);
        $argument_list = $rewriter($this->_argument_list, $parents);
        if ($class_type === $this->_class_type && $argument_list === $this->_argument_list) {
            return $this;
        }
        return new static($class_type, $argument_list);
    }
    /**
     * @return null|Node
     */
    public function getClassTypeUNTYPED()
    {
        return $this->_class_type;
    }
    /**
     * @return static
     */
    public function withClassType(Node $value)
    {
        if ($value === $this->_class_type) {
            return $this;
        }
        return new static($value, $this->_argument_list);
    }
    /**
     * @return bool
     */
    public function hasClassType()
    {
        return $this->_class_type !== null;
    }
    /**
     * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
     */
    /**
     * @return Node
     */
    public function getClassType()
    {
        return $this->_class_type;
    }
    /**
     * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
     */
    /**
     * @return Node
     */
    public function getClassTypex()
    {
        return $this->getClassType();
    }
    /**
     * @return null|Node
     */
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(TypeArguments $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_class_type, $value);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return $this->_argument_list !== null;
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getArgumentList()
    {
        return TypeAssert\instance_of(TypeArguments::class, $this->_argument_list);
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getArgumentListx()
    {
        return $this->getArgumentList();
    }
}

