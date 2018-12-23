<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cbeab3de95b2869d73dca9b3353c9a73>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class LetStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_initializer;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $name, EditableNode $colon, EditableNode $type, EditableNode $initializer, EditableNode $semicolon)
    {
        parent::__construct('let_statement');
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_initializer = $initializer;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['let_statement_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $name = EditableNode::fromJSON($json['let_statement_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $colon = EditableNode::fromJSON($json['let_statement_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $type = EditableNode::fromJSON($json['let_statement_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $initializer = EditableNode::fromJSON($json['let_statement_initializer'], $file, $offset, $source);
        $offset += $initializer->getWidth();
        $semicolon = EditableNode::fromJSON($json['let_statement_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'type' => $this->_type, 'initializer' => $this->_initializer, 'semicolon' => $this->_semicolon);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $type === $this->_type && $initializer === $this->_initializer && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_name, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return LetToken
     */
    /**
     * @return LetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(LetToken::class, $this->_keyword);
    }
    /**
     * @return LetToken
     */
    /**
     * @return LetToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
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
    /**
     * @return EditableNode
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_keyword, $this->_name, $value, $this->_type, $this->_initializer, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        if ($this->_colon->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $this->_name, $this->_colon, $value, $this->_initializer, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | null |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @return static
     */
    public function withInitializer(EditableNode $value)
    {
        if ($value === $this->_initializer) {
            return $this;
        }
        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return !$this->_initializer->isMissing();
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getInitializer()
    {
        return TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getInitializerx()
    {
        return $this->getInitializer();
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $this->_initializer, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
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

