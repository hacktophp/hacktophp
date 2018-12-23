<?php
namespace Facebook\HHAST\__Private;

use Facebook\HackCodegen\HackBuilderValues as HackBuilderValues;
final class CodegenVersion extends CodegenBase
{
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $cg->codegenFile($this->getOutputDirectory() . '/version.php')->setNamespace('Facebook\\HHAST')->addConstant($cg->codegenConstant('SCHEMA_VERSION')->setType('string')->setValue($this->getSchema()['version'], HackBuilderValues::export()))->addConstant($cg->codegenConstant('HHVM_VERSION_ID')->setType('int')->setValue(\HHVM_VERSION_ID, HackBuilderValues::export()))->save();
    }
}

