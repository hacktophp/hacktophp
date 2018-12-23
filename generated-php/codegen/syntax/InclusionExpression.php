<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cd6ba52db76f28fa62e7142d553e7b0b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class InclusionExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_require;
    /**
     * @var EditableNode
     */
    private $_filename;
    public function __construct(EditableNode $require, EditableNode $filename)
    {
        parent::__construct('inclusion_expression');
        $this->_require = $require;
        $this->_filename = $filename;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $require = EditableNode::fromJSON($json['inclusion_require'], $file, $offset, $source);
        $offset += $require->getWidth();
        $filename = EditableNode::fromJSON($json['inclusion_filename'], $file, $offset, $source);
        $offset += $filename->getWidth();
        return new static($require, $filename);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('require' => $this->_require, 'filename' => $this->_filename);
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
        $require = $this->_require->rewrite($rewriter, $parents);
        $filename = $this->_filename->rewrite($rewriter, $parents);
        if ($require === $this->_require && $filename === $this->_filename) {
            return $this;
        }
        return new static($require, $filename);
    }
    /**
     * @return EditableNode
     */
    public function getRequireUNTYPED()
    {
        return $this->_require;
    }
    /**
     * @return static
     */
    public function withRequire(EditableNode $value)
    {
        if ($value === $this->_require) {
            return $this;
        }
        return new static($value, $this->_filename);
    }
    /**
     * @return bool
     */
    public function hasRequire()
    {
        return !$this->_require->isMissing();
    }
    /**
     * @return IncludeToken | Include_onceToken | RequireToken | Require_onceToken
     */
    /**
     * @return EditableToken
     */
    public function getRequire()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_require);
    }
    /**
     * @return IncludeToken | Include_onceToken | RequireToken | Require_onceToken
     */
    /**
     * @return EditableToken
     */
    public function getRequirex()
    {
        return $this->getRequire();
    }
    /**
     * @return EditableNode
     */
    public function getFilenameUNTYPED()
    {
        return $this->_filename;
    }
    /**
     * @return static
     */
    public function withFilename(EditableNode $value)
    {
        if ($value === $this->_filename) {
            return $this;
        }
        return new static($this->_require, $value);
    }
    /**
     * @return bool
     */
    public function hasFilename()
    {
        return !$this->_filename->isMissing();
    }
    /**
     * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getFilename()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_filename);
    }
    /**
     * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getFilenamex()
    {
        return $this->getFilename();
    }
}

