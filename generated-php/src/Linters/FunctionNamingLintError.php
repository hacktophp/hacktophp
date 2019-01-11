<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\IFunctionishDeclaration;
/**
 * @template-extends ASTLintError<IFunctionishDeclaration>
 */
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

