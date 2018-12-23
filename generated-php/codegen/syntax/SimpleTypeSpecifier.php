<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class SimpleTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_specifier;
    public function __construct(EditableNode $specifier)
    {
        parent::__construct('simple_type_specifier');
        $this->_specifier = $specifier;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $specifier = EditableNode::fromJSON($json['simple_type_specifier'], $file, $offset, $source);
        $offset += $specifier->getWidth();
        return new static($specifier);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('specifier' => $this->_specifier);
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
        $specifier = $this->_specifier->rewrite($rewriter, $parents);
        if ($specifier === $this->_specifier) {
            return $this;
        }
        return new static($specifier);
    }
    /**
     * @return EditableNode
     */
    public function getSpecifierUNTYPED()
    {
        return $this->_specifier;
    }
    /**
     * @return static
     */
    public function withSpecifier(EditableNode $value)
    {
        if ($value === $this->_specifier) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasSpecifier()
    {
        return !$this->_specifier->isMissing();
    }
    /**
     * @return QualifiedName | XHPClassNameToken | ConstructToken | ArrayToken |
     * ArraykeyToken | BoolToken | BooleanToken | DarrayToken | DictToken |
     * DoubleToken | FloatToken | IntToken | IntegerToken | KeysetToken |
     * MixedToken | NameToken | NoreturnToken | NumToken | ObjectToken |
     * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
     * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
     */
    /**
     * @return EditableNode
     */
    public function getSpecifier()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_specifier);
    }
    /**
     * @return QualifiedName | XHPClassNameToken | ConstructToken | ArrayToken |
     * ArraykeyToken | BoolToken | BooleanToken | DarrayToken | DictToken |
     * DoubleToken | FloatToken | IntToken | IntegerToken | KeysetToken |
     * MixedToken | NameToken | NoreturnToken | NumToken | ObjectToken |
     * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
     * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
     */
    /**
     * @return EditableNode
     */
    public function getSpecifierx()
    {
        return $this->getSpecifier();
    }
}

