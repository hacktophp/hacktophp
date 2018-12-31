<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c90703af80def230422c602bc1703fb0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ForStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_initializer;
    /**
     * @var EditableNode
     */
    private $_first_semicolon;
    /**
     * @var EditableNode
     */
    private $_control;
    /**
     * @var EditableNode
     */
    private $_second_semicolon;
    /**
     * @var EditableNode
     */
    private $_end_of_loop;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $initializer, EditableNode $first_semicolon, EditableNode $control, EditableNode $second_semicolon, EditableNode $end_of_loop, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('for_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_initializer = $initializer;
        $this->_first_semicolon = $first_semicolon;
        $this->_control = $control;
        $this->_second_semicolon = $second_semicolon;
        $this->_end_of_loop = $end_of_loop;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['for_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['for_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $initializer = EditableNode::fromJSON($json['for_initializer'], $file, $offset, $source);
        $offset += $initializer->getWidth();
        $first_semicolon = EditableNode::fromJSON($json['for_first_semicolon'], $file, $offset, $source);
        $offset += $first_semicolon->getWidth();
        $control = EditableNode::fromJSON($json['for_control'], $file, $offset, $source);
        $offset += $control->getWidth();
        $second_semicolon = EditableNode::fromJSON($json['for_second_semicolon'], $file, $offset, $source);
        $offset += $second_semicolon->getWidth();
        $end_of_loop = EditableNode::fromJSON($json['for_end_of_loop'], $file, $offset, $source);
        $offset += $end_of_loop->getWidth();
        $right_paren = EditableNode::fromJSON($json['for_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $body = EditableNode::fromJSON($json['for_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($keyword, $left_paren, $initializer, $first_semicolon, $control, $second_semicolon, $end_of_loop, $right_paren, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'initializer' => $this->_initializer, 'first_semicolon' => $this->_first_semicolon, 'control' => $this->_control, 'second_semicolon' => $this->_second_semicolon, 'end_of_loop' => $this->_end_of_loop, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $first_semicolon = $this->_first_semicolon->rewrite($rewriter, $parents);
        $control = $this->_control->rewrite($rewriter, $parents);
        $second_semicolon = $this->_second_semicolon->rewrite($rewriter, $parents);
        $end_of_loop = $this->_end_of_loop->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $initializer === $this->_initializer && $first_semicolon === $this->_first_semicolon && $control === $this->_control && $second_semicolon === $this->_second_semicolon && $end_of_loop === $this->_end_of_loop && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $initializer, $first_semicolon, $control, $second_semicolon, $end_of_loop, $right_paren, $body);
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
        return new static($value, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return ForToken
     */
    /**
     * @return ForToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ForToken::class, $this->_keyword);
    }
    /**
     * @return ForToken
     */
    /**
     * @return ForToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return !$this->_initializer->isMissing();
    }
    /**
     * @return EditableList<BinaryExpression> |
     * EditableList<FunctionCallExpression> | EditableList<LiteralExpression> |
     * null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getInitializer()
    {
        if ($this->_initializer->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_initializer);
    }
    /**
     * @return EditableList<BinaryExpression> |
     * EditableList<FunctionCallExpression> | EditableList<LiteralExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getInitializerx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_initializer);
    }
    /**
     * @return EditableNode
     */
    public function getFirstSemicolonUNTYPED()
    {
        return $this->_first_semicolon;
    }
    /**
     * @return static
     */
    public function withFirstSemicolon(EditableNode $value)
    {
        if ($value === $this->_first_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $value, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasFirstSemicolon()
    {
        return !$this->_first_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getFirstSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_first_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getFirstSemicolonx()
    {
        return $this->getFirstSemicolon();
    }
    /**
     * @return EditableNode
     */
    public function getControlUNTYPED()
    {
        return $this->_control;
    }
    /**
     * @return static
     */
    public function withControl(EditableNode $value)
    {
        if ($value === $this->_control) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $value, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasControl()
    {
        return !$this->_control->isMissing();
    }
    /**
     * @return EditableList<BinaryExpression> | EditableList<EditableNode> |
     * EditableList<ConditionalExpression> | EditableList<FunctionCallExpression>
     * | EditableList<PrefixUnaryExpression> | EditableList<VariableExpression> |
     * null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getControl()
    {
        if ($this->_control->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_control);
    }
    /**
     * @return EditableList<BinaryExpression> | EditableList<EditableNode> |
     * EditableList<ConditionalExpression> | EditableList<FunctionCallExpression>
     * | EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getControlx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_control);
    }
    /**
     * @return EditableNode
     */
    public function getSecondSemicolonUNTYPED()
    {
        return $this->_second_semicolon;
    }
    /**
     * @return static
     */
    public function withSecondSemicolon(EditableNode $value)
    {
        if ($value === $this->_second_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $value, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasSecondSemicolon()
    {
        return !$this->_second_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSecondSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_second_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSecondSemicolonx()
    {
        return $this->getSecondSemicolon();
    }
    /**
     * @return EditableNode
     */
    public function getEndOfLoopUNTYPED()
    {
        return $this->_end_of_loop;
    }
    /**
     * @return static
     */
    public function withEndOfLoop(EditableNode $value)
    {
        if ($value === $this->_end_of_loop) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasEndOfLoop()
    {
        return !$this->_end_of_loop->isMissing();
    }
    /**
     * @return EditableList<BinaryExpression> |
     * EditableList<FunctionCallExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     * | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getEndOfLoop()
    {
        if ($this->_end_of_loop->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_end_of_loop);
    }
    /**
     * @return EditableList<BinaryExpression> |
     * EditableList<FunctionCallExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getEndOfLoopx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_end_of_loop);
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
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
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
     * ExpressionStatement | ForStatement | UnsetStatement
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
     * ExpressionStatement | ForStatement | UnsetStatement
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

