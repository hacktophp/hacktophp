<?php
namespace Facebook\HHAST;

use HH\Lib\Str as Str;
abstract class EditableTrivia extends EditableNode
{
    /**
     * @var string
     */
    private $_text;
    public function __construct(string $trivia_kind, string $text)
    {
        parent::__construct($trivia_kind);
        $this->_text = $text;
    }
    /**
     * @return string
     */
    public function getText()
    {
        return $this->_text;
    }
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_text;
    }
    /**
     * @return int
     */
    public function getWidth()
    {
        return \strlen($this->_text);
    }
    /**
     * @return bool
     */
    public final function isTrivia()
    {
        return true;
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array();
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return EditableTrivia
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        return __Private\editable_trivia_from_json($json, $file, $offset, $source);
    }
    /**
     * @param mixed $_rewriter
     * @param array<int, EditableNode>|null $_parents
     *
     * @return static
     */
    public final function rewriteDescendants($_rewriter, ?array $_parents = null)
    {
        return $this;
    }
}

