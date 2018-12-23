<?php
namespace Facebook\HHAST;

use HH\Lib\{Str as Str, Vec as Vec};
final class NamespaceDeclaration extends NamespaceDeclarationGeneratedBase
{
    /**
     * @return string
     */
    public function getQualifiedNameAsString()
    {
        $name = $this->getName();
        if ($name instanceof NameToken) {
            return $name->getText();
        }
        return \implode('\\', \array_map(function ($t) {
            return $t->getText();
        }, $this->getDescendantsOfType(NameToken::class)));
    }
}

