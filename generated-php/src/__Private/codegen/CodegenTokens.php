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

use HH\Lib\{C as C, Str as Str, Vec as Vec};
use Facebook\HackCodegen\{CodegenClass as CodegenClass, CodegenConstructor as CodegenConstructor, CodegenMethod as CodegenMethod, HackBuilderValues as HackBuilderValues};
final class CodegenTokens extends CodegenBase
{
    /**
     * @return array<int, mixed>
     */
    private function getTokenSpecs()
    {
        $tokens = $this->getSchemaTokens();
        $leading_trailing = array(array('name' => 'leading', 'type' => 'EditableNode', 'override' => true), array('name' => 'trailing', 'type' => 'EditableNode', 'override' => true));
        $no_text = \array_map(function ($token) use($leading_trailing) {
            return array('kind' => $token['token_kind'], 'description' => $token['token_kind'], 'text' => '', 'fields' => $leading_trailing);
        }, $tokens['noText']);
        $fixed_text = \array_map(function ($token) use($leading_trailing) {
            return array('kind' => $token['token_kind'], 'description' => (string) $token['token_text'], 'text' => $token['token_text'], 'fields' => $leading_trailing);
        }, $tokens['fixedText']);
        $variable_text = \array_map(function ($token) use($leading_trailing) {
            return array('kind' => $token['token_kind'], 'description' => StrP\underscored($token['token_kind']), 'text' => null, 'fields' => Vec\concat($leading_trailing, array(array('name' => 'text', 'type' => 'string', 'override' => false))));
        }, $tokens['variableText']);
        return Vec\concat($no_text, $fixed_text, $variable_text);
    }
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $tokens = $this->getTokenSpecs();
        foreach ($tokens as $token) {
            $cg->codegenFile($this->getOutputDirectory() . '/tokens/' . $token['kind'] . 'Token.php')->setNamespace('Facebook\\HHAST')->addClass($this->generateClassForToken($token))->save();
        }
    }
    /**
     * @param mixed $token
     *
     * @return CodegenClass
     */
    public function generateClassForToken($token)
    {
        $cg = $this->getCodegenFactory();
        $cc = $cg->codegenClass($token['kind'] . 'Token')->setIsFinal()->setExtends($this->generateExtends($token))->addConstant($cg->codegenClassConstant('KIND')->setType('string')->setValue($token['description'], HackBuilderValues::export()))->setConstructor($this->generateConstructor($token))->addMethods($this->generateFieldMethods($token))->addMethod($this->generateRewriteChildrenMethod($token));
        $text = $token['text'];
        if ($text !== null) {
            if (Str\uppercase($text) === Str\lowercase($text)) {
                $cc->addConstant($cg->codegenClassConstant('TEXT')->setType('string')->setValue($text, HackBuilderValues::export()));
            }
        }
        return $cc;
    }
    /**
     * @param mixed $token
     *
     * @return string
     */
    public function generateExtends($token)
    {
        $cls = 'EditableTokenWithFixedText';
        $text = $token['text'];
        if ($text !== null && Str\uppercase($text) !== Str\lowercase($text)) {
            $cls = 'EditableTokenWithVariableText';
        } else {
            foreach ($token['fields'] as $field) {
                if ($field['name'] === 'text') {
                    $cls = 'EditableTokenWithVariableText';
                }
            }
        }
        return $cls;
    }
    /**
     * @param mixed $token
     *
     * @return CodegenConstructor
     */
    public function generateConstructor($token)
    {
        $cg = $this->getCodegenFactory();
        $it = $cg->codegenConstructor()->addParameters(\array_map(function ($field) {
            return Str\format('%s $%s', $field['type'], $field['name']);
        }, $token['fields']));
        $parent_args = \array_map(function ($field) {
            return '$' . $field['name'];
        }, $token['fields']);
        $text = $token['text'];
        if ($text !== null) {
            if (Str\uppercase($text) !== Str\lowercase($text)) {
                $it->addParameterf('string $token_text = %s', \var_export($text, true));
                $parent_args[] = '$token_text';
            }
        }
        $it->setBody($cg->codegenHackBuilder()->addMultilineCall('parent::__construct', $parent_args)->getCode());
        return $it;
    }
    /**
     * @param mixed $token
     *
     * @return iterable<mixed, CodegenMethod>
     */
    private function generateFieldMethods($token)
    {
        $cg = $this->getCodegenFactory();
        foreach ($token['fields'] as $field) {
            $underscored = $field['name'];
            $upper_camel = StrP\upper_camel($underscored);
            if ($field['type'] !== 'string') {
                (yield $cg->codegenMethodf('has%s', $upper_camel)->setReturnType('bool')->setBodyf('return !$this->get%s()->isMissing();', $upper_camel));
            }
            (yield $cg->codegenMethodf('with%s', $upper_camel)->setIsOverride($field['override'])->addParameterf('%s $value', $field['type'])->setReturnType('this')->setBody($cg->codegenHackBuilder()->startIfBlockf('$value === $this->get%s()', $upper_camel)->addReturnf('$this')->endIfBlock()->add('return ')->addMultilineCall('new self', \array_map(function ($inner) use($field) {
                return $inner === $field ? '$value' : '$this->get' . StrP\upper_camel($inner['name']) . '()';
            }, $token['fields']))->getCode()));
        }
    }
    /**
     * @param mixed $token
     *
     * @return CodegenMethod
     */
    private function generateRewriteChildrenMethod($token)
    {
        $cg = $this->getCodegenFactory();
        return $cg->codegenMethod('rewriteDescendants')->setIsOverride()->addParameter('self::TRewriter $rewriter')->addParameter('?vec<EditableNode> $parents = null')->setReturnType('this')->setBody($cg->codegenHackBuilder()->addLine('$parents = $parents === null ? vec[] : vec($parents);')->addLine('$parents[] = $this;')->addLines(\array_map(function ($field) {
            return $field['type'] === 'string' ? Str\format('$%s = $this->get%s();', $field['name'], StrP\upper_camel($field['name'])) : Str\format('$%s = $this->get%s()->rewrite($rewriter, $parents);', $field['name'], StrP\upper_camel($field['name']));
        }, $token['fields']))->addLine('if (')->indent()->addLines((function ($lines) use($idx) {
            $idx = C\last_keyx($lines);
            $lines[$idx] = Str\strip_suffix($lines[$idx], ' &&');
            return $lines;
        })(\array_map(function ($field) {
            return Str\format('$%s === $this->get%s() &&', $field['name'], StrP\upper_camel($field['name']));
        }, $token['fields'])))->unindent()->addLine(') {')->indent()->addLine('return $this;')->unindent()->addLine('}')->add('return ')->addMultilineCall('new self', \array_map(function ($field) {
            return '$' . $field['name'];
        }, $token['fields']))->getCode());
    }
}

