<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ErrorSyntax extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_error;
    public function __construct(EditableNode $error)
    {
        parent::__construct('error');
        $this->_error = $error;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $error = EditableNode::fromJSON($json['error_error'], $file, $offset, $source);
        $offset += $error->getWidth();
        return new static($error);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('error' => $this->_error);
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
        $error = $this->_error->rewrite($rewriter, $parents);
        if ($error === $this->_error) {
            return $this;
        }
        return new static($error);
    }
    /**
     * @return EditableNode
     */
    public function getErrorUNTYPED()
    {
        return $this->_error;
    }
    /**
     * @return static
     */
    public function withError(EditableNode $value)
    {
        if ($value === $this->_error) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasError()
    {
        return !$this->_error->isMissing();
    }
    /**
     * @return CommaToken | SemicolonToken | EqualToken | DecimalLiteralToken |
     * NameToken | SingleQuotedStringLiteralToken | VariableToken |
     * LeftBraceToken | RightBraceToken
     */
    /**
     * @return EditableToken
     */
    public function getError()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_error);
    }
    /**
     * @return CommaToken | SemicolonToken | EqualToken | DecimalLiteralToken |
     * NameToken | SingleQuotedStringLiteralToken | VariableToken |
     * LeftBraceToken | RightBraceToken
     */
    /**
     * @return EditableToken
     */
    public function getErrorx()
    {
        return $this->getError();
    }
}

