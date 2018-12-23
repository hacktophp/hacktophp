<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\IFunctionishDeclaration as IFunctionishDeclaration;
final class FunctionNamingLintError extends ASTLintError
{
    /**
     * @var string
     */
    private $old;
    /**
     * @var string
     */
    private $new;
    public function __construct(FunctionNamingLinter $linter, string $description, ?string $ns, ?string $class, string $old, string $new, IFunctionishDeclaration $node)
    {
        parent::__construct($linter, $description, $node);
        $ns = $ns === null ? '' : $ns . '\\';
        if ($class === null) {
            $this->old = $ns . $old;
            $this->new = $ns . $new;
        } else {
            $this->old = $ns . $class . '::' . $old;
            $this->new = $ns . $class . '::' . $new;
        }
    }
}

