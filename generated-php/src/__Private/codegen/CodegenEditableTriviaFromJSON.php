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

use Facebook\HackCodegen\HackBuilderValues as HackBuilderValues;
final class CodegenEditableTriviaFromJSON extends CodegenBase
{
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $cg->codegenFile($this->getOutputDirectory() . '/editable_trivia_from_json.php')->setNamespace('Facebook\\HHAST\\__Private')->useNamespace('Facebook\\HHAST')->addFunction($cg->codegenFunction('editable_trivia_from_json')->setReturnType('HHAST\\EditableTrivia')->addParameter('dict<string, mixed> $json')->addParameter('string $file')->addParameter('int $offset')->addParameter('string $source')->setBody($cg->codegenHackBuilder()->addAssignment('$trivia_text', '\\substr($source, $offset, $json[\'width\'])', HackBuilderValues::literal())->startSwitch('(string) $json[\'kind\']')->addCaseBlocks(new Vector($this->getSchema()['trivia']), function ($trivia, $body) {
            return $body->addCase($trivia['trivia_type_name'], HackBuilderValues::export())->returnCasef('new HHAST\\%s($trivia_text)', $trivia['trivia_kind_name']);
        })->addDefault()->addMultilineCall('throw new HHAST\\UnsupportedASTNodeError', array('$file', '$offset', '(string) $json[\'kind\']'))->endDefault()->endSwitch()->getCode()))->save();
    }
}

