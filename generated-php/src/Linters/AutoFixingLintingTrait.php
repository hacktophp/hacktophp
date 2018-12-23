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

use Facebook\HHAST\__Private\{LSP as LSP, LSPLib as LSPLib};
use HH\Lib\{C as C, Str as Str};
trait AutoFixingLinterTrait
{
    /**
     * @return string
     */
    protected function getTitleForFix(Terror $_error)
    {
        return 'Fix ' . Str\strip_suffix(C\lastx(\explode('\\', \get_class($this))), 'Linter') . ' Error';
    }
    /**
     * @return null|LSP\CodeAction
     */
    public function getCodeActionForError(Terror $error)
    {
        $fixed = $this->getFixedFile(array($error));
        if ($fixed === null) {
            return null;
        }
        return array('title' => $this->getTitleForFix($error), 'kind' => LSP\CodeActionKind::QUICK_FIX, 'edit' => array('changes' => array('file://' . \realpath($this->getFile()->getPath()) => LSPLib\create_textedits($this->getFile()->getContents(), $fixed->getContents()))));
    }
}
