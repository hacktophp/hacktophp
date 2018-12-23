<?php
namespace Facebook\HHAST\__Private;

use HH\Lib\Vec as Vec;
final class CodegenTrivia extends CodegenBase
{
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $file = $cg->codegenFile($this->getOutputDirectory() . '/Trivia.php')->setNamespace('Facebook\\HHAST');
        foreach ($this->getSchema()['trivia'] as $trivia) {
            $file->addClass($cg->codegenClass($trivia['trivia_kind_name'])->setIsFinal()->setExtends('EditableTrivia')->setInterfaces(\array_map(function ($if) use($cg) {
                return $cg->codegenImplementsInterface($if);
            }, self::getMarkerInterfaces()[$trivia['trivia_kind_name']] ?? array()))->setConstructor($cg->codegenConstructor()->addParameter('string $text')->setBodyf('parent::__construct(%s, $text);', \var_export($trivia['trivia_type_name'], true)))->addMethod($cg->codegenMethod('withText')->addParameter('string $text')->setReturnType('this')->setBody($cg->codegenHackBuilder()->startIfBlock('$text === $this->getText()')->addReturnf('$this')->endIfBlock()->addReturnf('new self($text)')->getCode())));
        }
        $file->save();
    }
    /**
     * @return array<string, array<string, string>>
     */
    private static function getMarkerInterfaces()
    {
        return array('SingleLineComment' => array('IComment' => 'IComment'), 'DelimitedComment' => array('IComment' => 'IComment'));
    }
}

