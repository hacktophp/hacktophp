<?php
namespace Facebook\HHAST\__Private;

use Facebook\HackCodegen\{CodegenClass as CodegenClass, CodegenConstructor as CodegenConstructor, CodegenMethod as CodegenMethod, HackBuilderKeys as HackBuilderKeys, HackBuilderValues as HackBuilderValues};
use HH\Lib\{C as C, Dict as Dict, Keyset as Keyset, Str as Str, Vec as Vec};
final class CodegenSyntax extends CodegenBase
{
    /**
     * @return void
     */
    public function generate()
    {
        $cg = $this->getCodegenFactory();
        $blacklist = self::getHandWrittenSyntaxKinds();
        foreach ($this->getSchema()['AST'] as $syntax) {
            if (C\contains_key($blacklist, $syntax['kind_name'])) {
                continue;
            }
            $cg->codegenFile($this->getOutputDirectory() . '/syntax/' . $syntax['kind_name'] . '.php')->setNamespace('Facebook\\HHAST')->useNamespace('Facebook\\TypeAssert')->addClass($this->generateClass($syntax))->save();
        }
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return bool
     */
    private static function isAbstract($syntax)
    {
        return C\contains_key(self::getKindsWithManualSubclasses(), $syntax['kind_name']);
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return CodegenClass
     */
    private function generateClass($syntax)
    {
        $cg = $this->getCodegenFactory();
        $is_abstract = self::isAbstract($syntax);
        $class_name = $syntax['kind_name'];
        if ($is_abstract) {
            $class_name .= 'GeneratedBase';
        }
        return $cg->codegenClass($class_name)->addEmptyUserAttribute('__ConsistentConstruct')->setIsFinal(!$is_abstract)->setIsAbstract($is_abstract)->setExtends('EditableNode')->setInterfaces(\array_map(function ($if) use($cg) {
            return $cg->codegenImplementsInterface($if);
        }, self::getMarkerInterfaces()[$syntax['kind_name']] ?? array()))->setConstructor($this->generateConstructor($syntax))->addMethod($this->generateFromJSONMethod($syntax))->addMethod($this->generateChildrenMethod($syntax))->addMethod($this->generateRewriteChildrenMethod($syntax))->addMethods(Vec\flatten(\array_map(function ($field) use($syntax) {
            return $this->generateFieldMethods($syntax, $field['field_name']);
        }, $syntax['fields'])))->addProperties(\array_map(function ($field) use($cg) {
            return $cg->codegenProperty('_' . $field['field_name'])->setType('EditableNode');
        }, $syntax['fields']));
    }
    /**
     * @param array<string, string> $types
     *
     * @return string
     */
    private function getUnifiedSyntaxClass(array $types)
    {
        unset($types['']);
        if (C\is_empty($types)) {
            return 'EditableNode';
        }
        if (C\contains_key($types, 'missing')) {
            unset($types['missing']);
            return '?' . $this->getUnifiedSyntaxClass($types);
        }
        if (\count($types) === 1) {
            $type = C\onlyx($types);
            if ($type === 'list<>') {
                return 'EditableList<EditableNode>';
            }
            return $this->getSyntaxClass($type);
        }
        if (C\every($types, function ($t) {
            return Str\starts_with($t, 'token:');
        })) {
            return 'EditableToken';
        }
        if (C\every($types, function ($t) {
            return Str\starts_with($t, 'list<');
        })) {
            $have_empty = C\contains_key($types, 'list<>');
            if ($have_empty) {
                if (\count($types) === 1) {
                    return 'EditableList<EditableNode>';
                }
                unset($types['list<>']);
            }
            return 'EditableList<' . $this->getUnifiedSyntaxClass(Keyset\flatten(\array_map(function ($t) {
                return \explode('|', Str\strip_suffix(Str\strip_prefix($t, 'list<'), '>'));
            }, $types))) . '>';
        }
        return 'EditableNode';
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return Traversable<CodegenMethod>
     */
    private function generateFieldMethods($syntax, string $underscored)
    {
        $spec = $this->getTypeSpecForField($syntax, $underscored);
        $upper_camel = StrP\upper_camel($underscored);
        $types = $spec['possibleTypes'];
        $cg = $this->getCodegenFactory();
        (yield $cg->codegenMethodf('get%sUNTYPED', $upper_camel)->setReturnType('EditableNode')->setBodyf('return $this->_%s;', $underscored));
        (yield $cg->codegenMethodf('with%s', $upper_camel)->setReturnType('this')->addParameter('EditableNode $value')->setBody($cg->codegenHackBuilder()->startIfBlockf('$value === $this->_%s', $underscored)->addReturnf('$this')->endIfBlock()->add('return new ')->addMultilineCall('static', \array_map(function ($inner) use($underscored) {
            return $inner['field_name'] === $underscored ? '$value' : '$this->_' . $inner['field_name'];
        }, $syntax['fields']))->getCode()));
        (yield $cg->codegenMethodf('has%s', $upper_camel)->setReturnType('bool')->setBodyf('return !$this->_%s->isMissing();', $underscored));
        $type = $spec['nullable'] ? '?' . $spec['class'] : $spec['class'];
        if (!$spec['nullable']) {
            (yield $cg->codegenMethodf('get%s', $upper_camel)->setDocBlock('@return ' . \implode(' | ', $types))->setReturnType($type)->setBodyf('return TypeAssert\\instance_of(%s::class, $this->_%s);', C\firstx(\explode('<', $type)), $underscored));
            (yield $cg->codegenMethodf('get%sx', $upper_camel)->setDocBlock('@return ' . \implode(' | ', $types))->setReturnType($type)->setBodyf('return $this->get%s();', $upper_camel));
            return;
        }
        (yield $cg->codegenMethodf('get%s', $upper_camel)->setDocBlock('@return ' . \implode(' | ', \array_map(function ($type) {
            return $type === 'Missing' ? 'null' : $type;
        }, $types)))->setReturnType($type)->setBody($cg->codegenHackBuilder()->startIfBlockf('$this->_%s->isMissing()', $underscored)->addReturnf('null')->endIfBlock()->addReturnf('TypeAssert\\instance_of(%s::class, $this->_%s)', C\firstx(\explode('<', $spec['class'])), $underscored)->getCode()));
        (yield $cg->codegenMethodf('get%sx', $upper_camel)->setDocBlock('@return ' . \implode(' | ', Vec\filter($types, function ($type) {
            return $type !== 'Missing';
        })))->setReturnType($spec['class'])->setBodyf('return TypeAssert\\instance_of(%s::class, $this->_%s);', C\firstx(\explode('<', $spec['class'])), $underscored));
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return CodegenConstructor
     */
    private function generateConstructor($syntax)
    {
        $cg = $this->getCodegenFactory();
        return $cg->codegenConstructor()->addParameters(\array_map(function ($field) {
            return 'EditableNode $' . $field['field_name'];
        }, $syntax['fields']))->setBody($cg->codegenHackBuilder()->addLinef('parent::__construct(%s);', \var_export($syntax['type_name'], true))->addLines(\array_map(function ($field) {
            return Str\format('$this->_%s = $%s;', $field['field_name'], $field['field_name']);
        }, $syntax['fields']))->getCode());
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return CodegenMethod
     */
    private function generateFromJSONMethod($syntax)
    {
        $cg = $this->getCodegenFactory();
        $body = $cg->codegenHackBuilder();
        foreach ($syntax['fields'] as $field) {
            $body->addf('$%s = ', $field['field_name'])->addMultilineCall('EditableNode::fromJSON', array(Str\format('/* UNSAFE_EXPR */ $json[\'%s_%s\']', $syntax['prefix'], $field['field_name']), '$file', '$offset', '$source'))->addLinef('$offset += $%s->getWidth();', $field['field_name']);
        }
        return $cg->codegenMethod('fromJSON')->setIsOverride()->setIsStatic()->addParameter('dict<string, mixed> $json')->addParameter('string $file')->addParameter('int $offset')->addParameter('string $source')->setReturnType('this')->setBody($body->addMultilineCall('return new static', \array_map(function ($field) {
            return '$' . $field['field_name'];
        }, $syntax['fields']))->getCode());
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return CodegenMethod
     */
    private function generateChildrenMethod($syntax)
    {
        $cg = $this->getCodegenFactory();
        return $cg->codegenMethod('getChildren')->setIsOverride()->setReturnType('dict<string, EditableNode>')->setBody($cg->codegenHackBuilder()->add('return ')->addValue(Dict\pull(\array_map(function ($field) {
            return $field['field_name'];
        }, $syntax['fields']), function ($field) {
            return '$this->_' . $field;
        }, function ($field) {
            return $field;
        }), HackBuilderValues::dict(HackBuilderKeys::export(), HackBuilderValues::literal()))->add(';')->getCode());
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return CodegenMethod
     */
    private function generateRewriteChildrenMethod($syntax)
    {
        $cg = $this->getCodegenFactory();
        $fields = \array_map(function ($field) {
            return $field['field_name'];
        }, $syntax['fields']);
        return $cg->codegenMethod('rewriteDescendants')->setIsOverride()->addParameter('self::TRewriter $rewriter')->addParameter('?vec<EditableNode> $parents = null')->setReturnType('this')->setBody($cg->codegenHackBuilder()->addLine('$parents = $parents === null ? vec[] : vec($parents);')->addLine('$parents[] = $this;')->addLines(\array_map(function ($field) {
            return Str\format('$%s = $this->_%s->rewrite($rewriter, $parents);', $field, $field);
        }, $fields))->addLine('if (')->indent()->addLines((function ($lines) use($idx) {
            $idx = C\last_keyx($lines);
            $lines[$idx] = Str\strip_suffix($lines[$idx], ' &&');
            return $lines;
        })(\array_map(function ($field) {
            return Str\format('$%s === $this->_%s &&', $field, $field);
        }, $fields)))->unindent()->addLine(') {')->indent()->addLine('return $this;')->unindent()->addLine('}')->add('return ')->addMultilineCall('new static', \array_map(function ($field) {
            return '$' . $field;
        }, $fields))->getCode());
    }
    /**
     * @param array{kind_name:string, type_name:string, description:string, prefix:string, fields:Schema\Traversable<array{field_name:string}>} $syntax
     *
     * @return mixed
     */
    private function getTypeSpecForField($syntax, string $field)
    {
        $key = Str\format('%s.%s_%s', $syntax['description'], $syntax['prefix'], $field);
        $specs = $this->getRelationships();
        if (!C\contains_key($specs, $key)) {
            return array('class' => 'EditableNode', 'nullable' => false, 'possibleTypes' => array('unknown' => 'unknown'));
        }
        $children = Keyset\filter($specs[$key], function ($c) {
            return $c !== 'error';
        });
        $possible_types = Keyset\map($children, function ($child) {
            return $this->getSyntaxClass($child);
        });
        $nullable = C\contains_key($children, 'missing');
        if ($nullable) {
            $children = Keyset\filter($children, function ($child) {
                return $child !== 'missing';
            });
        }
        return array('class' => $this->getUnifiedSyntaxClass($children), 'nullable' => $nullable, 'possibleTypes' => $possible_types);
    }
    /**
     * @return string
     */
    private function getSyntaxClass(string $child)
    {
        if ($child === 'token') {
            return 'EditableToken';
        }
        if ($child === 'list<>') {
            return 'EditableList<EditableNode>';
        }
        if (Str\starts_with_ci($child, 'list<')) {
            return 'EditableList<' . $this->getUnifiedSyntaxClass((array) \explode('|', Str\strip_suffix(Str\strip_prefix($child, 'list<'), '>'))) . '>';
        }
        if (Str\starts_with($child, 'token')) {
            return $this->getTokenClassForChild($child);
        }
        $ast = C\find($this->getSchema()['AST'], function ($syntax) use($child) {
            return $syntax['description'] === $child;
        });
        invariant($ast !== null, 'Could not look up syntax "%s"', $child);
        return $ast['kind_name'];
    }
    /**
     * @return string
     */
    private function getTokenClassForChild(string $child)
    {
        $child = Str\strip_prefix($child, 'token:');
        $tokens = $this->getSchema()['tokens'];
        $token = C\find($tokens, function ($token) use($child) {
            return $token['token_text'] === $child;
        });
        if ($token !== null) {
            return $token['token_kind'] . 'Token';
        }
        $token = C\find($tokens, function ($token) use($child) {
            return StrP\underscored($token['token_kind']) === $child;
        });
        invariant($token !== null, 'Failed to find token for "%s"', $child);
        return $token['token_kind'] . 'Token';
    }
    /**
     * @return array<string, array<string, string>>
     */
    private static function getMarkerInterfaces()
    {
        return array('AlternateElseClause' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'AlternateElseifClause' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'AlternateElseifStatement' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'AlternateLoopStatement' => array('IControlFlowStatement' => 'IControlFlowStatement', 'ILoopStatement' => 'ILoopStatement'), 'AlternateSwitchStatement' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'DoStatement' => array('IControlFlowStatement' => 'IControlFlowStatement', 'ILoopStatement' => 'ILoopStatement'), 'ElseClause' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'ElseifClause' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'ForStatement' => array('IControlFlowStatement' => 'IControlFlowStatement', 'ILoopStatement' => 'ILoopStatement'), 'ForeachStatement' => array('IControlFlowStatement' => 'IControlFlowStatement', 'ILoopStatement' => 'ILoopStatement'), 'FunctionDeclaration' => array('IFunctionishDeclaration' => 'IFunctionishDeclaration'), 'IfStatement' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'MethodishDeclaration' => array('IFunctionishDeclaration' => 'IFunctionishDeclaration'), 'NamespaceUseDeclaration' => array('INamespaceUseDeclaration' => 'INamespaceUseDeclaration'), 'NamespaceGroupUseDeclaration' => array('INamespaceUseDeclaration' => 'INamespaceUseDeclaration'), 'SwitchStatement' => array('IControlFlowStatement' => 'IControlFlowStatement'), 'WhileStatement' => array('IControlFlowStatement' => 'IControlFlowStatement', 'ILoopStatement' => 'ILoopStatement'));
    }
    /**
     * @return array<string, string>
     */
    private static function getKindsWithManualSubclasses()
    {
        return array('AlternateLoopStatement' => 'AlternateLoopStatement', 'NamespaceDeclaration' => 'NamespaceDeclaration');
    }
}

