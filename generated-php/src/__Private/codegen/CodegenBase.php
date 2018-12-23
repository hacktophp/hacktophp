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

use Facebook\HackCodegen\{HackCodegenConfig as HackCodegenConfig, HackCodegenFactory as HackCodegenFactory, HackfmtFormatter as HackfmtFormatter};
use HH\Lib\{C as C, Dict as Dict, Vec as Vec};
abstract class CodegenBase
{
    /**
     * @var array{trivia:iterable<mixed, array{trivia_kind_name:string, trivia_type_name:string}>, tokens:iterable<mixed, array{token_kind:string, token_text:null|string}>, AST:iterable<mixed, array{kind_name:string, type_name:string, description:string, prefix:string, fields:iterable<mixed, array{field_name:string}>}>, description:string, version:string}
     */
    private $schema;
    /**
     * @var array<string, array<string, string>>
     */
    private $relationships;
    /**
     * @var array<string, array<string, string>>
     */
    public function __construct($schema, array $relationships)
    {
        $this->relationships = $relationships;
        $this->schema = array('trivia' => Vec\sort_by($schema['trivia'], function ($t) {
            return $t['trivia_kind_name'];
        }), 'tokens' => Vec\sort_by($schema['tokens'], function ($t) {
            return $t['token_kind'];
        }), 'AST' => Vec\sort_by($schema['AST'], function ($t) {
            return $t['kind_name'];
        }), 'version' => $schema['version']);
    }
    /**
     * @return void
     */
    public abstract function generate();
    /**
     * @return string
     */
    protected function getOutputDirectory()
    {
        return __DIR__ . '/../../../codegen';
    }
    /**
     * @return HackCodegenFactory
     */
    protected final function getCodegenFactory()
    {
        $config = new HackCodegenConfig();
        return new HackCodegenFactory($config->withFormatter(new HackfmtFormatter($config)));
    }
    /**
     * @return array{trivia:iterable<mixed, array{trivia_kind_name:string, trivia_type_name:string}>, tokens:iterable<mixed, array{token_kind:string, token_text:null|string}>, AST:iterable<mixed, array{kind_name:string, type_name:string, description:string, prefix:string, fields:iterable<mixed, array{field_name:string}>}>, description:string, version:string}
     */
    protected final function getSchema()
    {
        return $this->schema;
    }
    /**
     * @return array<string, array<string, string>>
     */
    protected final function getRelationships()
    {
        return $this->relationships;
    }
    /**
     * @return array{noText:array<int, array{token_kind:string, token_text:null|string}>, fixedText:array<int, array{token_kind:string, token_text:null|string}>, variableText:array<int, array{token_kind:string, token_text:null|string}>}
     */
    protected function getSchemaTokens()
    {
        $ret = array('noText' => array(), 'fixedText' => array(), 'variableText' => array());
        $asts = $this->getSchemaASTByKindName();
        foreach ($this->schema['tokens'] as $token) {
            if ($token['token_text'] !== null) {
                $ret['fixedText'][] = $token;
                continue;
            }
            if (C\contains_key($asts, $token['token_kind'])) {
                $ret['noText'][] = $token;
                continue;
            }
            $ret['variableText'][] = $token;
        }
        return $ret;
    }
    /**
     * @return array<string, array{kind_name:string, type_name:string, description:string, prefix:string, fields:iterable<mixed, array{field_name:string}>}>
     */
    protected function getSchemaASTByKindName()
    {
        return Dict\pull($this->schema['AST'], function ($v) {
            return $v;
        }, function ($v) {
            return $v['kind_name'];
        });
    }
    /**
     * @return array<string, string>
     */
    protected static function getHandWrittenSyntaxKinds()
    {
        return array('Missing' => 'Missing', 'SyntaxList' => 'SyntaxList', 'Token' => 'Token');
    }
}

