<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d50b36297f1fce73049e532add08fbda>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class RequireClause extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'require_clause';
    /**
     * @var RequireToken
     */
    private $_keyword;
    /**
     * @var Token
     */
    private $_kind;
    /**
     * @var ISimpleCreationSpecifier
     */
    private $_name;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(RequireToken $keyword, Token $kind, ISimpleCreationSpecifier $name, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_name = $name;
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
        $keyword = Node::fromJSON($json['require_keyword'], $file, $offset, $source, 'RequireToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $kind = Node::fromJSON($json['require_kind'], $file, $offset, $source, 'Token');
        $kind = $kind !== null ? $kind : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $kind->getWidth();
        $name = Node::fromJSON($json['require_name'], $file, $offset, $source, 'ISimpleCreationSpecifier');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $semicolon = Node::fromJSON($json['require_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $kind, $name, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'kind' => $this->_kind, 'name' => $this->_name, 'semicolon' => $this->_semicolon]);
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
        $kind = $rewriter($this->_kind, $parents);
        $name = $rewriter($this->_name, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $name, $semicolon);
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
    public function withKeyword(RequireToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_kind, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return RequireToken
     */
    /**
     * @return RequireToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(RequireToken::class, $this->_keyword);
    }
    /**
     * @return RequireToken
     */
    /**
     * @return RequireToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getKindUNTYPED()
    {
        return $this->_kind;
    }
    /**
     * @return static
     */
    public function withKind(Token $value)
    {
        if ($value === $this->_kind) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKind()
    {
        return $this->_kind !== null;
    }
    /**
     * @return ExtendsToken | ImplementsToken
     */
    /**
     * @return Token
     */
    public function getKind()
    {
        return TypeAssert\instance_of(Token::class, $this->_kind);
    }
    /**
     * @return ExtendsToken | ImplementsToken
     */
    /**
     * @return Token
     */
    public function getKindx()
    {
        return $this->getKind();
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
    public function withName(ISimpleCreationSpecifier $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getName()
    {
        return TypeAssert\instance_of(ISimpleCreationSpecifier::class, $this->_name);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getNamex()
    {
        return $this->getName();
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
        return new static($this->_keyword, $this->_kind, $this->_name, $value);
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

