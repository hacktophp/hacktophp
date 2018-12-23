<?php
namespace Facebook\HHAST;

use HH\Lib\{Dict as Dict, Vec as Vec, C as C};
use Facebook\TypeAssert as TypeAssert;
abstract class EditableNode
{
    /**
     * @var string
     */
    private $_syntax_kind;
    /**
     * @var null|int
     */
    protected $_width;
    public function __construct(string $syntax_kind)
    {
        $this->_syntax_kind = $syntax_kind;
    }
    /**
     * @return string
     */
    public function getSyntaxKind()
    {
        return $this->_syntax_kind;
    }
    /**
     * @return array<string, EditableNode>
     */
    public abstract function getChildren();
    /**
     * @param \Closure(EditableNode):bool $filter
     *
     * @return array<string, EditableNode>
     */
    public function getChildrenWhere(\Closure $filter)
    {
        return \array_filter($this->getChildren(), function ($child) use($filter) {
            return $filter($child);
        });
    }
    /**
     * @psalm-template T as \Facebook\HHAST\EditableNode
     *
     * @param T::class $what
     *
     * @return array<string, T>
     */
    public final function getChildrenOfType(string $what)
    {
        $out = array();
        foreach ($this->getChildren() as $k => $node) {
            if ($node instanceof $what) {
                $out[$k] = $node;
            }
        }
        return $out;
    }
    /**
     * @return array<int, EditableNode>
     */
    public function traverse()
    {
        $out = array($this);
        foreach ($this->getChildren() as $child) {
            foreach ($child->traverse() as $descendant) {
                $out[] = $descendant;
            }
        }
        return $out;
    }
    /**
     * @param array<int, EditableNode> $parents
     *
     * @return array<int, array{0:EditableNode, 1:array<int, EditableNode>}>
     */
    private function traverseImpl(array $parents)
    {
        $new_parents = (array) $parents;
        $new_parents[] = $this;
        $out = array(array($this, $parents));
        foreach ($this->getChildren() as $child) {
            foreach ($child->traverseImpl($new_parents) as list($child, $child_parents)) {
                $out[] = array($child, $child_parents);
            }
        }
        return $out;
    }
    /**
     * @return array<int, array{0:EditableNode, 1:array<int, EditableNode>}>
     */
    public function traverseWithParents()
    {
        return $this->traverseImpl(array());
    }
    /**
     * @return bool
     */
    public function isToken()
    {
        return false;
    }
    /**
     * @return bool
     */
    public function isTrivia()
    {
        return false;
    }
    /**
     * @return bool
     */
    public function isList()
    {
        return false;
    }
    /**
     * @return bool
     */
    public function isMissing()
    {
        return false;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
        if ($this->_width === null) {
            $width = 0;
            foreach ($this->getChildren() as $node) {
                $width += $node->getWidth();
            }
            $this->_width = $width;
            return $width;
        } else {
            return $this->_width;
        }
    }
    /**
     * @return string
     */
    public function getCode()
    {
        $s = '';
        foreach ($this->getChildren() as $node) {
            $s .= $node->getCode();
        }
        return $s;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return EditableNode
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        return __Private\editable_node_from_json($json, $file, $offset, $source);
    }
    /**
     * @return array<int, EditableNode>
     */
    public function toVec()
    {
        return array($this);
    }
    // Returns all the parents (and the node itself) of the first node
    // that matches a predicate, or [] if there is no such node.
    /**
     * @param \Closure(EditableNode):bool $predicate
     * @param array<int, EditableNode>|null $parents
     *
     * @return array<int, EditableNode>
     */
    public function findWithParents(\Closure $predicate, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $new_parents = $parents;
        $new_parents[] = $this;
        if ($predicate($this)) {
            return $new_parents;
        }
        foreach ($this->getChildren() as $child) {
            $result = $child->findWithParents($predicate, $new_parents);
            if (\count($result) !== 0) {
                return $result;
            }
        }
        return array();
    }
    /**
     * @param \Closure(EditableNode, array<int, EditableNode>):bool $filter
     *
     * @return array<int, EditableNode>
     */
    public function getDescendantsWhere(\Closure $filter)
    {
        $out = array();
        foreach ($this->traverseWithParents() as list($node, $parents)) {
            if ($filter($node, $parents)) {
                $out[] = $node;
            }
        }
        return $out;
    }
    /**
     * @psalm-template T as \Facebook\HHAST\EditableNode
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public function getDescendantsOfType(string $what)
    {
        $out = array();
        foreach ($this->traverse() as $child) {
            if ($child instanceof $what) {
                $out[] = $child;
            }
        }
        return $out;
    }
    /**
     * @param \Closure(EditableNode, array<int, EditableNode>|null):bool $predicate
     *
     * @return EditableNode
     */
    public function removeWhere(\Closure $predicate)
    {
        return $this->rewrite(function ($node, $parents) use($predicate) {
            return $predicate($node, $parents) ? Missing::getInstance() : $node;
        });
    }
    /**
     * @return EditableNode
     */
    public function without(EditableNode $target)
    {
        return $this->removeWhere(function ($node, $parents) use($target) {
            return $node === $target;
        });
    }
    /**
     * @return static
     */
    public function replace(EditableNode $target, EditableNode $new_node)
    {
        return $this->rewriteDescendants(function ($node, $parents) use($target, $new_node) {
            return $node === $target ? $new_node : $node;
        });
    }
    /**
     * @return EditableToken
     */
    public function getFirstTokenx()
    {
        return TypeAssert\not_null($this->getFirstToken());
    }
    /**
     * @return null|EditableToken
     */
    public function getFirstToken()
    {
        foreach ($this->getChildren() as $child) {
            if (!$child->isMissing()) {
                return $child->getFirstToken();
            }
        }
        return null;
    }
    /**
     * @return EditableToken
     */
    public function getLastTokenx()
    {
        return TypeAssert\not_null($this->getLastToken());
    }
    /**
     * @return null|EditableToken
     */
    public function getLastToken()
    {
        foreach (Vec\reverse($this->getChildren()) as $child) {
            if (!$child->isMissing()) {
                return $child->getLastToken();
            }
        }
        return null;
    }
    /**
     * @return static
     */
    public function insertBefore(EditableNode $target, EditableNode $new_node)
    {
        if ($target->isMissing()) {
            throw new \Exception('Target must not be missing in insert_before.');
        }
        if ($new_node->isMissing()) {
            return $this;
        }
        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getFirstToken();
            if ($token === null) {
                throw new \Exception('Unable to find token to insert trivia.');
            }
            $token = TypeAssert\instance_of(EditableToken::class, $token);
            $new_leading = EditableList::concat($token->getLeading(), $new_node);
            $new_token = $token->withLeading($new_leading);
            return $this->replace($token, $new_token);
        }
        return $this->replace($target, EditableList::concat($new_node, $target));
    }
    /**
     * @return static
     */
    public function insertAfter(EditableNode $target, EditableNode $new_node)
    {
        if ($target->isMissing()) {
            throw new \Exception('Target must not be missing in insert_after.');
        }
        if ($new_node->isMissing()) {
            return $this;
        }
        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getLastToken();
            if ($token === null) {
                throw new \Exception('Unable to find token to insert trivia.');
            }
            $token = TypeAssert\instance_of(EditableToken::class, $token);
            $new_trailing = EditableList::concat($new_node, $token->getTrailing());
            $new_token = $token->withTrailing($new_trailing);
            return $this->replace($token, $new_token);
        }
        return $this->replace($target, EditableList::concat($target, $new_node));
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public abstract function rewriteDescendants($rewriter, ?array $parents = null);
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return EditableNode
     */
    public function rewrite($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $with_rewritten_children = $this->rewriteDescendants($rewriter, $parents);
        return $rewriter($with_rewritten_children, $parents);
    }
}

