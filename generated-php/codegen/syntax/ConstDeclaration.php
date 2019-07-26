<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5d92fb9d1ee2cb8600ae174eb7a6f2ae>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ConstDeclaration extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'const_declaration';
    /**
     * @var NodeList<AbstractToken>|null
     */
    private $_modifiers;
    /**
     * @var ConstToken
     */
    private $_keyword;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type_specifier;
    /**
     * @var NodeList<ListItem<ConstantDeclarator>>
     */
    private $_declarators;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<AbstractToken>|null $modifiers
     * @param NodeList<ListItem<ConstantDeclarator>> $declarators
     */
    public function __construct(?NodeList $modifiers, ConstToken $keyword, ?ITypeSpecifier $type_specifier, NodeList $declarators, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_type_specifier = $type_specifier;
        $this->_declarators = $declarators;
        $this->_semicolon = $semicolon;
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
        $modifiers = Node::fromJSON($json['const_modifiers'], $file, $offset, $source, 'NodeList<AbstractToken>');
        $offset += (($__tmp1__ = $modifiers) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['const_keyword'], $file, $offset, $source, 'ConstToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $type_specifier = Node::fromJSON($json['const_type_specifier'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp2__ = $type_specifier) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $declarators = Node::fromJSON($json['const_declarators'], $file, $offset, $source, 'NodeList<ListItem<ConstantDeclarator>>');
        $declarators = $declarators !== null ? $declarators : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $declarators->getWidth();
        $semicolon = Node::fromJSON($json['const_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($modifiers, $keyword, $type_specifier, $declarators, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'type_specifier' => $this->_type_specifier, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon]);
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
        $modifiers = $this->_modifiers === null ? null : $rewriter($this->_modifiers, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $type_specifier = $this->_type_specifier === null ? null : $rewriter($this->_type_specifier, $parents);
        $declarators = $rewriter($this->_declarators, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($modifiers === $this->_modifiers && $keyword === $this->_keyword && $type_specifier === $this->_type_specifier && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($modifiers, $keyword, $type_specifier, $declarators, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @param NodeList<AbstractToken>|null $value
     *
     * @return static
     */
    public function withModifiers(?NodeList $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_type_specifier, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<AbstractToken> | null
     */
    /**
     * @return NodeList<AbstractToken>|null
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<AbstractToken>
     */
    /**
     * @return NodeList<AbstractToken>
     */
    public function getModifiersx()
    {
        return TypeAssert\not_null($this->getModifiers());
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
    public function withKeyword(ConstToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_modifiers, $value, $this->_type_specifier, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ConstToken
     */
    /**
     * @return ConstToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ConstToken::class, $this->_keyword);
    }
    /**
     * @return ConstToken
     */
    /**
     * @return ConstToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getTypeSpecifierUNTYPED()
    {
        return $this->_type_specifier;
    }
    /**
     * @return static
     */
    public function withTypeSpecifier(?ITypeSpecifier $value)
    {
        if ($value === $this->_type_specifier) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $value, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeSpecifier()
    {
        return $this->_type_specifier !== null;
    }
    /**
     * @return ClassnameTypeSpecifier | DarrayTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | null | NullableTypeSpecifier
     * | SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getTypeSpecifier()
    {
        return $this->_type_specifier;
    }
    /**
     * @return ClassnameTypeSpecifier | DarrayTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | NullableTypeSpecifier |
     * SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypeSpecifierx()
    {
        return TypeAssert\not_null($this->getTypeSpecifier());
    }
    /**
     * @return null|Node
     */
    public function getDeclaratorsUNTYPED()
    {
        return $this->_declarators;
    }
    /**
     * @param NodeList<ListItem<ConstantDeclarator>> $value
     *
     * @return static
     */
    public function withDeclarators(NodeList $value)
    {
        if ($value === $this->_declarators) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_type_specifier, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasDeclarators()
    {
        return $this->_declarators !== null;
    }
    /**
     * @return NodeList<ListItem<ConstantDeclarator>>
     */
    /**
     * @return NodeList<ListItem<ConstantDeclarator>>
     */
    public function getDeclarators()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_declarators);
    }
    /**
     * @return NodeList<ListItem<ConstantDeclarator>>
     */
    /**
     * @return NodeList<ListItem<ConstantDeclarator>>
     */
    public function getDeclaratorsx()
    {
        return $this->getDeclarators();
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_type_specifier, $this->_declarators, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

