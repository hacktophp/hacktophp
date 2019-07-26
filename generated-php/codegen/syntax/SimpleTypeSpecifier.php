<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b631f9963aa9791b63d5b45339f25b67>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SimpleTypeSpecifier extends Node implements ISimpleCreationSpecifier, ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'simple_type_specifier';
    /**
     * @var Node
     */
    private $_specifier;
    public function __construct(Node $specifier, ?__Private\SourceRef $source_ref = null)
    {
        $this->_specifier = $specifier;
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
        $specifier = Node::fromJSON($json['simple_type_specifier'], $file, $offset, $source, 'Node');
        $specifier = $specifier !== null ? $specifier : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $specifier->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($specifier, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['specifier' => $this->_specifier]);
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
        $specifier = $rewriter($this->_specifier, $parents);
        if ($specifier === $this->_specifier) {
            return $this;
        }
        return new static($specifier);
    }
    /**
     * @return null|Node
     */
    public function getSpecifierUNTYPED()
    {
        return $this->_specifier;
    }
    /**
     * @return static
     */
    public function withSpecifier(Node $value)
    {
        if ($value === $this->_specifier) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasSpecifier()
    {
        return $this->_specifier !== null;
    }
    /**
     * @return QualifiedName | XHPClassNameToken | ArrayToken | ArraykeyToken |
     * BoolToken | BooleanToken | DarrayToken | DictToken | DoubleToken |
     * FloatToken | IntToken | IntegerToken | KeysetToken | MixedToken |
     * NameToken | NoreturnToken | NullLiteralToken | NumToken | ObjectToken |
     * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
     * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
     */
    /**
     * @return Node
     */
    public function getSpecifier()
    {
        return $this->_specifier;
    }
    /**
     * @return QualifiedName | XHPClassNameToken | ArrayToken | ArraykeyToken |
     * BoolToken | BooleanToken | DarrayToken | DictToken | DoubleToken |
     * FloatToken | IntToken | IntegerToken | KeysetToken | MixedToken |
     * NameToken | NoreturnToken | NullLiteralToken | NumToken | ObjectToken |
     * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
     * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
     */
    /**
     * @return Node
     */
    public function getSpecifierx()
    {
        return $this->getSpecifier();
    }
}

