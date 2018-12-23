<?php
namespace Facebook\HHAST\Linters;

final class File
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $contents;
    /**
     * @var string
     */
    public function __construct(string $path, string $contents);
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }
    /**
     * @return static
     */
    public function withContents(string $contents)
    {
        if ($contents === $this->contents) {
            return $this;
        }
        return new self($this->path, $contents);
    }
}

