<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<242454fd47152a7f4ed0d64591a427dc>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class EchoStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_expressions;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $expressions, EditableNode $semicolon)
    {
        parent::__construct('echo_statement');
        $this->_keyword = $keyword;
        $this->_expressions = $expressions;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['echo_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $expressions = EditableNode::fromJSON($json['echo_expressions'], $file, $offset, $source);
        $offset += $expressions->getWidth();
        $semicolon = EditableNode::fromJSON($json['echo_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $expressions, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'expressions' => $this->_expressions, 'semicolon' => $this->_semicolon];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $expressions = $this->_expressions->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $expressions === $this->_expressions && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $expressions, $semicolon);
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
        return new static($value, $this->_expressions, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return EchoToken
     */
    /**
     * @return EchoToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EchoToken::class, $this->_keyword);
    }
    /**
     * @return EchoToken
     */
    /**
     * @return EchoToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getExpressionsUNTYPED()
    {
        return $this->_expressions;
    }
    /**
     * @return static
     */
    public function withExpressions(EditableNode $value)
    {
        if ($value === $this->_expressions) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpressions()
    {
        return !$this->_expressions->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<ConditionalExpression> |
     * EditableList<EmptyExpression> | EditableList<FunctionCallExpression> |
     * EditableList<IssetExpression> | EditableList<LiteralExpression> |
     * EditableList<MemberSelectionExpression> | EditableList<?EditableNode> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PipeVariableExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     * | EditableList<QualifiedName> | EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<XHPExpression>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getExpressions()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_expressions);
    }
    /**
     * @return EditableList<EditableNode> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<ConditionalExpression> |
     * EditableList<EmptyExpression> | EditableList<FunctionCallExpression> |
     * EditableList<IssetExpression> | EditableList<LiteralExpression> |
     * EditableList<MemberSelectionExpression> | EditableList<?EditableNode> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PipeVariableExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     * | EditableList<QualifiedName> | EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<XHPExpression>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getExpressionsx()
    {
        return $this->getExpressions();
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
        return new static($this->_keyword, $this->_expressions, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return null | SemicolonToken
     */
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon()
    {
        if ($this->_semicolon->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
}

