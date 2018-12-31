<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f7c9d9ab6d269b1ca25ef4d051464d8c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class EndOfFile extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_token;
    public function __construct(EditableNode $token)
    {
        parent::__construct('end_of_file');
        $this->_token = $token;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $token = EditableNode::fromJSON($json['end_of_file_token'], $file, $offset, $source);
        $offset += $token->getWidth();
        return new static($token);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['token' => $this->_token];
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
        $token = $this->_token->rewrite($rewriter, $parents);
        if ($token === $this->_token) {
            return $this;
        }
        return new static($token);
    }
    /**
     * @return EditableNode
     */
    public function getTokenUNTYPED()
    {
        return $this->_token;
    }
    /**
     * @return static
     */
    public function withToken(EditableNode $value)
    {
        if ($value === $this->_token) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasToken()
    {
        return !$this->_token->isMissing();
    }
    /**
     * @return EndOfFileToken
     */
    /**
     * @return EndOfFileToken
     */
    public function getToken()
    {
        return TypeAssert\instance_of(EndOfFileToken::class, $this->_token);
    }
    /**
     * @return EndOfFileToken
     */
    /**
     * @return EndOfFileToken
     */
    public function getTokenx()
    {
        return $this->getToken();
    }
}

