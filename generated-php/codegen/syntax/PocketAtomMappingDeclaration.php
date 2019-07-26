<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fba031f8ad0749f072ce252bac0c5e06>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketAtomMappingDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_atom_mapping_declaration';
    /**
     * @var Node
     */
    private $_glyph;
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_left_paren;
    /**
     * @var Node
     */
    private $_mappings;
    /**
     * @var Node
     */
    private $_right_paren;
    /**
     * @var Node
     */
    private $_semicolon;
    public function __construct(Node $glyph, Node $name, Node $left_paren, Node $mappings, Node $right_paren, Node $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_glyph = $glyph;
        $this->_name = $name;
        $this->_left_paren = $left_paren;
        $this->_mappings = $mappings;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
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
        $glyph = Node::fromJSON($json['pocket_atom_mapping_glyph'], $file, $offset, $source, 'Node');
        $glyph = $glyph !== null ? $glyph : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $glyph->getWidth();
        $name = Node::fromJSON($json['pocket_atom_mapping_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $left_paren = Node::fromJSON($json['pocket_atom_mapping_left_paren'], $file, $offset, $source, 'Node');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $mappings = Node::fromJSON($json['pocket_atom_mapping_mappings'], $file, $offset, $source, 'Node');
        $mappings = $mappings !== null ? $mappings : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $mappings->getWidth();
        $right_paren = Node::fromJSON($json['pocket_atom_mapping_right_paren'], $file, $offset, $source, 'Node');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $semicolon = Node::fromJSON($json['pocket_atom_mapping_semicolon'], $file, $offset, $source, 'Node');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($glyph, $name, $left_paren, $mappings, $right_paren, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['glyph' => $this->_glyph, 'name' => $this->_name, 'left_paren' => $this->_left_paren, 'mappings' => $this->_mappings, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon]);
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
        $glyph = $rewriter($this->_glyph, $parents);
        $name = $rewriter($this->_name, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $mappings = $rewriter($this->_mappings, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($glyph === $this->_glyph && $name === $this->_name && $left_paren === $this->_left_paren && $mappings === $this->_mappings && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($glyph, $name, $left_paren, $mappings, $right_paren, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getGlyphUNTYPED()
    {
        return $this->_glyph;
    }
    /**
     * @return static
     */
    public function withGlyph(Node $value)
    {
        if ($value === $this->_glyph) {
            return $this;
        }
        return new static($value, $this->_name, $this->_left_paren, $this->_mappings, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasGlyph()
    {
        return $this->_glyph !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getGlyph()
    {
        return $this->_glyph;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getGlyphx()
    {
        return $this->getGlyph();
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(Node $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_glyph, $value, $this->_left_paren, $this->_mappings, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(Node $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_glyph, $this->_name, $value, $this->_mappings, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftParen()
    {
        return $this->_left_paren;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getMappingsUNTYPED()
    {
        return $this->_mappings;
    }
    /**
     * @return static
     */
    public function withMappings(Node $value)
    {
        if ($value === $this->_mappings) {
            return $this;
        }
        return new static($this->_glyph, $this->_name, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasMappings()
    {
        return $this->_mappings !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getMappings()
    {
        return $this->_mappings;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getMappingsx()
    {
        return $this->getMappings();
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(Node $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_glyph, $this->_name, $this->_left_paren, $this->_mappings, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightParen()
    {
        return $this->_right_paren;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(Node $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_glyph, $this->_name, $this->_left_paren, $this->_mappings, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolon()
    {
        return $this->_semicolon;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

