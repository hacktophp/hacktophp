<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f367bb38593d8c89b34899e81b74c177>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class InclusionExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'inclusion_expression';
    /**
     * @var Token
     */
    private $_require;
    /**
     * @var IExpression
     */
    private $_filename;
    public function __construct(Token $require, IExpression $filename, ?array $source_ref = null)
    {
        $this->_require = $require;
        $this->_filename = $filename;
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
        $require = Node::fromJSON($json['inclusion_require'], $file, $offset, $source, 'Token');
        $require = $require !== null ? $require : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $require->getWidth();
        $filename = Node::fromJSON($json['inclusion_filename'], $file, $offset, $source, 'IExpression');
        $filename = $filename !== null ? $filename : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $filename->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($require, $filename, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['require' => $this->_require, 'filename' => $this->_filename]);
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
        $require = $rewriter($this->_require, $parents);
        $filename = $rewriter($this->_filename, $parents);
        if ($require === $this->_require && $filename === $this->_filename) {
            return $this;
        }
        return new static($require, $filename);
    }
    /**
     * @return null|Node
     */
    public function getRequireUNTYPED()
    {
        return $this->_require;
    }
    /**
     * @return static
     */
    public function withRequire(Token $value)
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
        return $this->_require !== null;
    }
    /**
     * @return IncludeToken | Include_onceToken | RequireToken | Require_onceToken
     */
    /**
     * @return Token
     */
    public function getRequire()
    {
        return TypeAssert\instance_of(Token::class, $this->_require);
    }
    /**
     * @return IncludeToken | Include_onceToken | RequireToken | Require_onceToken
     */
    /**
     * @return Token
     */
    public function getRequirex()
    {
        return $this->getRequire();
    }
    /**
     * @return null|Node
     */
    public function getFilenameUNTYPED()
    {
        return $this->_filename;
    }
    /**
     * @return static
     */
    public function withFilename(IExpression $value)
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
        return $this->_filename !== null;
    }
    /**
     * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getFilename()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_filename);
    }
    /**
     * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getFilenamex()
    {
        return $this->getFilename();
    }
}

