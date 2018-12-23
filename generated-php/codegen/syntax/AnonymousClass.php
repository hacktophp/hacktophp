<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<533a10eaae1a3979d443a0b51fc556ee>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class AnonymousClass extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_class_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_argument_list;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_extends_keyword;
    /**
     * @var EditableNode
     */
    private $_extends_list;
    /**
     * @var EditableNode
     */
    private $_implements_keyword;
    /**
     * @var EditableNode
     */
    private $_implements_list;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $class_keyword, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren, EditableNode $extends_keyword, EditableNode $extends_list, EditableNode $implements_keyword, EditableNode $implements_list, EditableNode $body)
    {
        parent::__construct('anonymous_class');
        $this->_class_keyword = $class_keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $class_keyword = EditableNode::fromJSON($json['anonymous_class_class_keyword'], $file, $offset, $source);
        $offset += $class_keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['anonymous_class_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $argument_list = EditableNode::fromJSON($json['anonymous_class_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['anonymous_class_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $extends_keyword = EditableNode::fromJSON($json['anonymous_class_extends_keyword'], $file, $offset, $source);
        $offset += $extends_keyword->getWidth();
        $extends_list = EditableNode::fromJSON($json['anonymous_class_extends_list'], $file, $offset, $source);
        $offset += $extends_list->getWidth();
        $implements_keyword = EditableNode::fromJSON($json['anonymous_class_implements_keyword'], $file, $offset, $source);
        $offset += $implements_keyword->getWidth();
        $implements_list = EditableNode::fromJSON($json['anonymous_class_implements_list'], $file, $offset, $source);
        $offset += $implements_list->getWidth();
        $body = EditableNode::fromJSON($json['anonymous_class_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($class_keyword, $left_paren, $argument_list, $right_paren, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('class_keyword' => $this->_class_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'body' => $this->_body);
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
        $class_keyword = $this->_class_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
        $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
        $implements_keyword = $this->_implements_keyword->rewrite($rewriter, $parents);
        $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($class_keyword === $this->_class_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $body === $this->_body) {
            return $this;
        }
        return new static($class_keyword, $left_paren, $argument_list, $right_paren, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }
    /**
     * @return EditableNode
     */
    public function getClassKeywordUNTYPED()
    {
        return $this->_class_keyword;
    }
    /**
     * @return static
     */
    public function withClassKeyword(EditableNode $value)
    {
        if ($value === $this->_class_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasClassKeyword()
    {
        return !$this->_class_keyword->isMissing();
    }
    /**
     * @return ClassToken
     */
    /**
     * @return ClassToken
     */
    public function getClassKeyword()
    {
        return TypeAssert\instance_of(ClassToken::class, $this->_class_keyword);
    }
    /**
     * @return ClassToken
     */
    /**
     * @return ClassToken
     */
    public function getClassKeywordx()
    {
        return $this->getClassKeyword();
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
        return new static($this->_class_keyword, $value, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return null | LeftParenToken
     */
    /**
     * @return null|LeftParenToken
     */
    public function getLeftParen()
    {
        if ($this->_left_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return EditableNode
     */
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(EditableNode $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<LiteralExpression>
     * | EditableList<MemberSelectionExpression> |
     * EditableList<VariableExpression> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getArgumentList()
    {
        if ($this->_argument_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<LiteralExpression>
     * | EditableList<MemberSelectionExpression> |
     * EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getArgumentListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
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
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        if ($this->_right_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return EditableNode
     */
    public function getExtendsKeywordUNTYPED()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return static
     */
    public function withExtendsKeyword(EditableNode $value)
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsKeyword()
    {
        return !$this->_extends_keyword->isMissing();
    }
    /**
     * @return null | ExtendsToken
     */
    /**
     * @return null|ExtendsToken
     */
    public function getExtendsKeyword()
    {
        if ($this->_extends_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
    }
    /**
     * @return ExtendsToken
     */
    /**
     * @return ExtendsToken
     */
    public function getExtendsKeywordx()
    {
        return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getExtendsListUNTYPED()
    {
        return $this->_extends_list;
    }
    /**
     * @return static
     */
    public function withExtendsList(EditableNode $value)
    {
        if ($value === $this->_extends_list) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsList()
    {
        return !$this->_extends_list->isMissing();
    }
    /**
     * @return EditableList<SimpleTypeSpecifier> | null
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>|null
     */
    public function getExtendsList()
    {
        if ($this->_extends_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getExtendsListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
    }
    /**
     * @return EditableNode
     */
    public function getImplementsKeywordUNTYPED()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return static
     */
    public function withImplementsKeyword(EditableNode $value)
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsKeyword()
    {
        return !$this->_implements_keyword->isMissing();
    }
    /**
     * @return null | ImplementsToken
     */
    /**
     * @return null|ImplementsToken
     */
    public function getImplementsKeyword()
    {
        if ($this->_implements_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ImplementsToken::class, $this->_implements_keyword);
    }
    /**
     * @return ImplementsToken
     */
    /**
     * @return ImplementsToken
     */
    public function getImplementsKeywordx()
    {
        return TypeAssert\instance_of(ImplementsToken::class, $this->_implements_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getImplementsListUNTYPED()
    {
        return $this->_implements_list;
    }
    /**
     * @return static
     */
    public function withImplementsList(EditableNode $value)
    {
        if ($value === $this->_implements_list) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsList()
    {
        return !$this->_implements_list->isMissing();
    }
    /**
     * @return EditableList<SimpleTypeSpecifier> | null
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>|null
     */
    public function getImplementsList()
    {
        if ($this->_implements_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getImplementsListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
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
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return ClassishBody
     */
    /**
     * @return ClassishBody
     */
    public function getBody()
    {
        return TypeAssert\instance_of(ClassishBody::class, $this->_body);
    }
    /**
     * @return ClassishBody
     */
    /**
     * @return ClassishBody
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

