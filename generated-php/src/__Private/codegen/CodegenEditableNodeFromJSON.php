<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\__Private;

use HH\Lib\C;
use Facebook\HackCodegen\HackBuilderValues;
final class CodegenEditableNodeFromJSON extends CodegenBase
{
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $cg->codegenFile($this->getOutputDirectory() . '/editable_node_from_json.php')->setNamespace('Facebook\\HHAST\\__Private')->useNamespace('Facebook\\HHAST')->addFunction($cg->codegenFunction('editable_node_from_json')->setReturnType('HHAST\\EditableNode')->addParameter('dict<string, mixed> $json')->addParameter('string $file')->addParameter('int $offset')->addParameter('string $source')->setBody($cg->codegenHackBuilder()->startSwitch('(string) $json[\'kind\']')->addCase('token', HackBuilderValues::export())->add('return ')->addMultilineCall('HHAST\\Token::fromJSON', ['/* HH_IGNORE_ERROR[4110] */ $json[\'token\']', '$file', '$offset', '$source'])->unindent()->addCase('list', HackBuilderValues::export())->returnCasef('HHAST\\EditableList::fromJSON($json, $file, $offset, $source)')->addCase('missing', HackBuilderValues::export())->addReturnf('HHAST\\Missing()')->unindent()->addCaseBlocks($this->getSchema()['trivia'], function ($trivia, $body) {
            $body->addCase($trivia['trivia_type_name'], HackBuilderValues::export())->addReturnf('HHAST\\%s::fromJSON($json, $file, $offset, $source)', $trivia['trivia_kind_name'])->unindent();
        })->addCaseBlocks((new Vector($this->getSchema()['AST']))->filter(function ($ast) {
            return !C\contains_key(self::getHandWrittenSyntaxKinds(), $ast['kind_name']);
        }), function ($ast, $body) {
            $body->addCase($ast['description'], HackBuilderValues::export())->addReturnf('HHAST\\%s::fromJSON($json, $file, $offset, $source)', $ast['kind_name'])->unindent();
        })->addDefault()->addMultilineCall('throw new HHAST\\UnsupportedASTNodeError', ['$file', '$offset', '(string) $json[\'kind\']'])->endDefault()->endSwitch()->getCode()))->save();
    }
}

