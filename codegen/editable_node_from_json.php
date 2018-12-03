<?php

namespace HackToPhp\HHAST\Node\__Private;

use HackToPhp\HHAST;

require_once(dirname(__DIR__) . '/src/HHAST/Node/Missing.php');

require_once(dirname(__DIR__) . '/src/HHAST/__PRIVATE/fold_map.php');

require_once(__DIR__ . '/Trivia.php');

/**
 * @param  array<string, mixed>  $json 
 */
function editable_node_from_json(
    array $json,
    string $file,
    int $offset,
    string $source
): HHAST\Node\EditableNode {
    switch ((string)$json['kind']) {
        case 'token':
            return HHAST\Token\EditableToken::fromJSON(
                $json['token'],
                $file,
                $offset,
                $source
            );
        case 'list':
            return HHAST\Node\EditableList::fromJSON($json, $file, $offset, $source);
        case 'missing':
            return HHAST\Node\Missing();
        case 'after_halt_compiler':
            return HHAST\Node\AfterHaltCompiler::fromJSON($json, $file, $offset, $source);
        case 'delimited_comment':
            return HHAST\Node\DelimitedComment::fromJSON($json, $file, $offset, $source);
        case 'end_of_line':
            return HHAST\Node\EndOfLine::fromJSON($json, $file, $offset, $source);
        case 'extra_token_error':
            return HHAST\Node\ExtraTokenError::fromJSON($json, $file, $offset, $source);
        case 'fall_through':
            return HHAST\Node\FallThrough::fromJSON($json, $file, $offset, $source);
        case 'fix_me':
            return HHAST\Node\FixMe::fromJSON($json, $file, $offset, $source);
        case 'ignore_error':
            return HHAST\Node\IgnoreError::fromJSON($json, $file, $offset, $source);
        case 'single_line_comment':
            return HHAST\Node\SingleLineComment::fromJSON($json, $file, $offset, $source);
        case 'unsafe':
            return HHAST\Node\Unsafe::fromJSON($json, $file, $offset, $source);
        case 'unsafe_expression':
            return HHAST\Node\UnsafeExpression::fromJSON($json, $file, $offset, $source);
        case 'whitespace':
            return HHAST\Node\WhiteSpace::fromJSON($json, $file, $offset, $source);
        case 'alias_declaration':
            return HHAST\Node\AliasDeclaration::fromJSON($json, $file, $offset, $source);
        case 'alternate_else_clause':
            return
                HHAST\Node\AlternateElseClause::fromJSON($json, $file, $offset, $source);
        case 'alternate_elseif_clause':
            return
                HHAST\Node\AlternateElseifClause::fromJSON($json, $file, $offset, $source);
        case 'alternate_if_statement':
            return
                HHAST\Node\AlternateIfStatement::fromJSON($json, $file, $offset, $source);
        case 'alternate_loop_statement':
            return
                HHAST\Node\AlternateLoopStatement::fromJSON($json, $file, $offset, $source);
        case 'alternate_switch_statement':
            return HHAST\Node\AlternateSwitchStatement::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'anonymous_class':
            return HHAST\Node\AnonymousClass::fromJSON($json, $file, $offset, $source);
        case 'anonymous_function':
            return HHAST\Node\AnonymousFunction::fromJSON($json, $file, $offset, $source);
        case 'anonymous_function_use_clause':
            return HHAST\Node\AnonymousFunctionUseClause::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'array_creation_expression':
            return
                HHAST\Node\ArrayCreationExpression::fromJSON($json, $file, $offset, $source);
        case 'array_intrinsic_expression':
            return HHAST\Node\ArrayIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'as_expression':
            return HHAST\Node\AsExpression::fromJSON($json, $file, $offset, $source);
        case 'attribute_specification':
            return
                HHAST\Node\AttributeSpecification::fromJSON($json, $file, $offset, $source);
        case 'awaitable_creation_expression':
            return HHAST\Node\AwaitableCreationExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'binary_expression':
            return HHAST\Node\BinaryExpression::fromJSON($json, $file, $offset, $source);
        case 'braced_expression':
            return HHAST\Node\BracedExpression::fromJSON($json, $file, $offset, $source);
        case 'break_statement':
            return HHAST\Node\BreakStatement::fromJSON($json, $file, $offset, $source);
        case 'case_label':
            return HHAST\Node\CaseLabel::fromJSON($json, $file, $offset, $source);
        case 'cast_expression':
            return HHAST\Node\CastExpression::fromJSON($json, $file, $offset, $source);
        case 'catch_clause':
            return HHAST\Node\CatchClause::fromJSON($json, $file, $offset, $source);
        case 'classish_body':
            return HHAST\Node\ClassishBody::fromJSON($json, $file, $offset, $source);
        case 'classish_declaration':
            return
                HHAST\Node\ClassishDeclaration::fromJSON($json, $file, $offset, $source);
        case 'classname_type_specifier':
            return
                HHAST\Node\ClassnameTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'closure_parameter_type_specifier':
            return HHAST\Node\ClosureParameterTypeSpecifier::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'closure_type_specifier':
            return
                HHAST\Node\ClosureTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'collection_literal_expression':
            return HHAST\Node\CollectionLiteralExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'compound_statement':
            return HHAST\Node\CompoundStatement::fromJSON($json, $file, $offset, $source);
        case 'conditional_expression':
            return
                HHAST\Node\ConditionalExpression::fromJSON($json, $file, $offset, $source);
        case 'const_declaration':
            return HHAST\Node\ConstDeclaration::fromJSON($json, $file, $offset, $source);
        case 'constant_declarator':
            return HHAST\Node\ConstantDeclarator::fromJSON($json, $file, $offset, $source);
        case 'constructor_call':
            return HHAST\Node\ConstructorCall::fromJSON($json, $file, $offset, $source);
        case 'continue_statement':
            return HHAST\Node\ContinueStatement::fromJSON($json, $file, $offset, $source);
        case 'darray_intrinsic_expression':
            return HHAST\Node\DarrayIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'darray_type_specifier':
            return
                HHAST\Node\DarrayTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'declare_block_statement':
            return
                HHAST\Node\DeclareBlockStatement::fromJSON($json, $file, $offset, $source);
        case 'declare_directive_statement':
            return HHAST\Node\DeclareDirectiveStatement::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'decorated_expression':
            return
                HHAST\Node\DecoratedExpression::fromJSON($json, $file, $offset, $source);
        case 'default_label':
            return HHAST\Node\DefaultLabel::fromJSON($json, $file, $offset, $source);
        case 'define_expression':
            return HHAST\Node\DefineExpression::fromJSON($json, $file, $offset, $source);
        case 'dictionary_intrinsic_expression':
            return HHAST\Node\DictionaryIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'dictionary_type_specifier':
            return
                HHAST\Node\DictionaryTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'do_statement':
            return HHAST\Node\DoStatement::fromJSON($json, $file, $offset, $source);
        case 'echo_statement':
            return HHAST\Node\EchoStatement::fromJSON($json, $file, $offset, $source);
        case 'element_initializer':
            return HHAST\Node\ElementInitializer::fromJSON($json, $file, $offset, $source);
        case 'else_clause':
            return HHAST\Node\ElseClause::fromJSON($json, $file, $offset, $source);
        case 'elseif_clause':
            return HHAST\Node\ElseifClause::fromJSON($json, $file, $offset, $source);
        case 'embedded_braced_expression':
            return HHAST\Node\EmbeddedBracedExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'embedded_member_selection_expression':
            return HHAST\Node\EmbeddedMemberSelectionExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'embedded_subscript_expression':
            return HHAST\Node\EmbeddedSubscriptExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'empty_expression':
            return HHAST\Node\EmptyExpression::fromJSON($json, $file, $offset, $source);
        case 'end_of_file':
            return HHAST\Node\EndOfFile::fromJSON($json, $file, $offset, $source);
        case 'enum_declaration':
            return HHAST\Node\EnumDeclaration::fromJSON($json, $file, $offset, $source);
        case 'enumerator':
            return HHAST\Node\Enumerator::fromJSON($json, $file, $offset, $source);
        case 'error':
            return HHAST\Node\ErrorSyntax::fromJSON($json, $file, $offset, $source);
        case 'eval_expression':
            return HHAST\Node\EvalExpression::fromJSON($json, $file, $offset, $source);
        case 'expression_statement':
            return
                HHAST\Node\ExpressionStatement::fromJSON($json, $file, $offset, $source);
        case 'field_initializer':
            return HHAST\Node\FieldInitializer::fromJSON($json, $file, $offset, $source);
        case 'field_specifier':
            return HHAST\Node\FieldSpecifier::fromJSON($json, $file, $offset, $source);
        case 'finally_clause':
            return HHAST\Node\FinallyClause::fromJSON($json, $file, $offset, $source);
        case 'for_statement':
            return HHAST\Node\ForStatement::fromJSON($json, $file, $offset, $source);
        case 'foreach_statement':
            return HHAST\Node\ForeachStatement::fromJSON($json, $file, $offset, $source);
        case 'function_call_expression':
            return
                HHAST\Node\FunctionCallExpression::fromJSON($json, $file, $offset, $source);
        case 'function_call_with_type_arguments_expression':
            return HHAST\Node\FunctionCallWithTypeArgumentsExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'function_declaration':
            return
                HHAST\Node\FunctionDeclaration::fromJSON($json, $file, $offset, $source);
        case 'function_declaration_header':
            return HHAST\Node\FunctionDeclarationHeader::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'function_static_statement':
            return
                HHAST\Node\FunctionStaticStatement::fromJSON($json, $file, $offset, $source);
        case 'generic_type_specifier':
            return
                HHAST\Node\GenericTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'global_statement':
            return HHAST\Node\GlobalStatement::fromJSON($json, $file, $offset, $source);
        case 'goto_label':
            return HHAST\Node\GotoLabel::fromJSON($json, $file, $offset, $source);
        case 'goto_statement':
            return HHAST\Node\GotoStatement::fromJSON($json, $file, $offset, $source);
        case 'halt_compiler_expression':
            return
                HHAST\Node\HaltCompilerExpression::fromJSON($json, $file, $offset, $source);
        case 'if_statement':
            return HHAST\Node\IfStatement::fromJSON($json, $file, $offset, $source);
        case 'inclusion_directive':
            return HHAST\Node\InclusionDirective::fromJSON($json, $file, $offset, $source);
        case 'inclusion_expression':
            return
                HHAST\Node\InclusionExpression::fromJSON($json, $file, $offset, $source);
        case 'instanceof_expression':
            return
                HHAST\Node\InstanceofExpression::fromJSON($json, $file, $offset, $source);
        case 'is_expression':
            return HHAST\Node\IsExpression::fromJSON($json, $file, $offset, $source);
        case 'isset_expression':
            return HHAST\Node\IssetExpression::fromJSON($json, $file, $offset, $source);
        case 'keyset_intrinsic_expression':
            return HHAST\Node\KeysetIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'keyset_type_specifier':
            return
                HHAST\Node\KeysetTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'lambda_expression':
            return HHAST\Node\LambdaExpression::fromJSON($json, $file, $offset, $source);
        case 'lambda_signature':
            return HHAST\Node\LambdaSignature::fromJSON($json, $file, $offset, $source);
        case 'let_statement':
            return HHAST\Node\LetStatement::fromJSON($json, $file, $offset, $source);
        case 'list_expression':
            return HHAST\Node\ListExpression::fromJSON($json, $file, $offset, $source);
        case 'list_item':
            return HHAST\Node\ListItem::fromJSON($json, $file, $offset, $source);
        case 'literal':
            return HHAST\Node\LiteralExpression::fromJSON($json, $file, $offset, $source);
        case 'map_array_type_specifier':
            return
                HHAST\Node\MapArrayTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'markup_section':
            return HHAST\Node\MarkupSection::fromJSON($json, $file, $offset, $source);
        case 'markup_suffix':
            return HHAST\Node\MarkupSuffix::fromJSON($json, $file, $offset, $source);
        case 'member_selection_expression':
            return HHAST\Node\MemberSelectionExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'methodish_declaration':
            return
                HHAST\Node\MethodishDeclaration::fromJSON($json, $file, $offset, $source);
        case 'namespace_body':
            return HHAST\Node\NamespaceBody::fromJSON($json, $file, $offset, $source);
        case 'namespace_declaration':
            return
                HHAST\Node\NamespaceDeclaration::fromJSON($json, $file, $offset, $source);
        case 'namespace_empty_body':
            return HHAST\Node\NamespaceEmptyBody::fromJSON($json, $file, $offset, $source);
        case 'namespace_group_use_declaration':
            return HHAST\Node\NamespaceGroupUseDeclaration::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'namespace_use_clause':
            return HHAST\Node\NamespaceUseClause::fromJSON($json, $file, $offset, $source);
        case 'namespace_use_declaration':
            return
                HHAST\Node\NamespaceUseDeclaration::fromJSON($json, $file, $offset, $source);
        case 'nullable_as_expression':
            return
                HHAST\Node\NullableAsExpression::fromJSON($json, $file, $offset, $source);
        case 'nullable_type_specifier':
            return
                HHAST\Node\NullableTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'object_creation_expression':
            return HHAST\Node\ObjectCreationExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'parameter_declaration':
            return
                HHAST\Node\ParameterDeclaration::fromJSON($json, $file, $offset, $source);
        case 'parenthesized_expression':
            return
                HHAST\Node\ParenthesizedExpression::fromJSON($json, $file, $offset, $source);
        case 'php7_anonymous_function':
            return
                HHAST\Node\Php7AnonymousFunction::fromJSON($json, $file, $offset, $source);
        case 'pipe_variable':
            return
                HHAST\Node\PipeVariableExpression::fromJSON($json, $file, $offset, $source);
        case 'postfix_unary_expression':
            return
                HHAST\Node\PostfixUnaryExpression::fromJSON($json, $file, $offset, $source);
        case 'prefix_unary_expression':
            return
                HHAST\Node\PrefixUnaryExpression::fromJSON($json, $file, $offset, $source);
        case 'prefixed_string':
            return HHAST\Node\PrefixedStringExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'property_declaration':
            return
                HHAST\Node\PropertyDeclaration::fromJSON($json, $file, $offset, $source);
        case 'property_declarator':
            return HHAST\Node\PropertyDeclarator::fromJSON($json, $file, $offset, $source);
        case 'qualified_name':
            return HHAST\Node\QualifiedName::fromJSON($json, $file, $offset, $source);
        case 'reified_type_argument':
            return
                HHAST\Node\ReifiedTypeArgument::fromJSON($json, $file, $offset, $source);
        case 'require_clause':
            return HHAST\Node\RequireClause::fromJSON($json, $file, $offset, $source);
        case 'return_statement':
            return HHAST\Node\ReturnStatement::fromJSON($json, $file, $offset, $source);
        case 'safe_member_selection_expression':
            return HHAST\Node\SafeMemberSelectionExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'scope_resolution_expression':
            return HHAST\Node\ScopeResolutionExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'script':
            return HHAST\Node\Script::fromJSON($json, $file, $offset, $source);
        case 'shape_expression':
            return HHAST\Node\ShapeExpression::fromJSON($json, $file, $offset, $source);
        case 'shape_type_specifier':
            return HHAST\Node\ShapeTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'simple_initializer':
            return HHAST\Node\SimpleInitializer::fromJSON($json, $file, $offset, $source);
        case 'simple_type_specifier':
            return
                HHAST\Node\SimpleTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'soft_type_specifier':
            return HHAST\Node\SoftTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'static_declarator':
            return HHAST\Node\StaticDeclarator::fromJSON($json, $file, $offset, $source);
        case 'subscript_expression':
            return
                HHAST\Node\SubscriptExpression::fromJSON($json, $file, $offset, $source);
        case 'switch_fallthrough':
            return HHAST\Node\SwitchFallthrough::fromJSON($json, $file, $offset, $source);
        case 'switch_section':
            return HHAST\Node\SwitchSection::fromJSON($json, $file, $offset, $source);
        case 'switch_statement':
            return HHAST\Node\SwitchStatement::fromJSON($json, $file, $offset, $source);
        case 'throw_statement':
            return HHAST\Node\ThrowStatement::fromJSON($json, $file, $offset, $source);
        case 'trait_use':
            return HHAST\Node\TraitUse::fromJSON($json, $file, $offset, $source);
        case 'trait_use_alias_item':
            return HHAST\Node\TraitUseAliasItem::fromJSON($json, $file, $offset, $source);
        case 'trait_use_conflict_resolution':
            return HHAST\Node\TraitUseConflictResolution::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'trait_use_precedence_item':
            return
                HHAST\Node\TraitUsePrecedenceItem::fromJSON($json, $file, $offset, $source);
        case 'try_statement':
            return HHAST\Node\TryStatement::fromJSON($json, $file, $offset, $source);
        case 'tuple_expression':
            return HHAST\Node\TupleExpression::fromJSON($json, $file, $offset, $source);
        case 'tuple_type_explicit_specifier':
            return HHAST\Node\TupleTypeExplicitSpecifier::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'tuple_type_specifier':
            return HHAST\Node\TupleTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'type_arguments':
            return HHAST\Node\TypeArguments::fromJSON($json, $file, $offset, $source);
        case 'type_const_declaration':
            return
                HHAST\Node\TypeConstDeclaration::fromJSON($json, $file, $offset, $source);
        case 'type_constant':
            return HHAST\Node\TypeConstant::fromJSON($json, $file, $offset, $source);
        case 'type_constraint':
            return HHAST\Node\TypeConstraint::fromJSON($json, $file, $offset, $source);
        case 'type_parameter':
            return HHAST\Node\TypeParameter::fromJSON($json, $file, $offset, $source);
        case 'type_parameters':
            return HHAST\Node\TypeParameters::fromJSON($json, $file, $offset, $source);
        case 'unset_statement':
            return HHAST\Node\UnsetStatement::fromJSON($json, $file, $offset, $source);
        case 'using_statement_block_scoped':
            return HHAST\Node\UsingStatementBlockScoped::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'using_statement_function_scoped':
            return HHAST\Node\UsingStatementFunctionScoped::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'variable':
            return HHAST\Node\VariableExpression::fromJSON($json, $file, $offset, $source);
        case 'variadic_parameter':
            return HHAST\Node\VariadicParameter::fromJSON($json, $file, $offset, $source);
        case 'varray_intrinsic_expression':
            return HHAST\Node\VarrayIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'varray_type_specifier':
            return
                HHAST\Node\VarrayTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'vector_array_type_specifier':
            return HHAST\Node\VectorArrayTypeSpecifier::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'vector_intrinsic_expression':
            return HHAST\Node\VectorIntrinsicExpression::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'vector_type_specifier':
            return
                HHAST\Node\VectorTypeSpecifier::fromJSON($json, $file, $offset, $source);
        case 'where_clause':
            return HHAST\Node\WhereClause::fromJSON($json, $file, $offset, $source);
        case 'where_constraint':
            return HHAST\Node\WhereConstraint::fromJSON($json, $file, $offset, $source);
        case 'while_statement':
            return HHAST\Node\WhileStatement::fromJSON($json, $file, $offset, $source);
        case 'xhp_category_declaration':
            return
                HHAST\Node\XHPCategoryDeclaration::fromJSON($json, $file, $offset, $source);
        case 'xhp_children_declaration':
            return
                HHAST\Node\XHPChildrenDeclaration::fromJSON($json, $file, $offset, $source);
        case 'xhp_children_parenthesized_list':
            return HHAST\Node\XHPChildrenParenthesizedList::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'xhp_class_attribute':
            return HHAST\Node\XHPClassAttribute::fromJSON($json, $file, $offset, $source);
        case 'xhp_class_attribute_declaration':
            return HHAST\Node\XHPClassAttributeDeclaration::fromJSON(
                $json,
                $file,
                $offset,
                $source
            );
        case 'xhp_close':
            return HHAST\Node\XHPClose::fromJSON($json, $file, $offset, $source);
        case 'xhp_enum_type':
            return HHAST\Node\XHPEnumType::fromJSON($json, $file, $offset, $source);
        case 'xhp_expression':
            return HHAST\Node\XHPExpression::fromJSON($json, $file, $offset, $source);
        case 'xhp_open':
            return HHAST\Node\XHPOpen::fromJSON($json, $file, $offset, $source);
        case 'xhp_required':
            return HHAST\Node\XHPRequired::fromJSON($json, $file, $offset, $source);
        case 'xhp_simple_attribute':
            return HHAST\Node\XHPSimpleAttribute::fromJSON($json, $file, $offset, $source);
        case 'xhp_simple_class_attribute':
            return
                HHAST\Node\XHPSimpleClassAttribute::fromJSON($json, $file, $offset, $source);
        case 'xhp_spread_attribute':
            return HHAST\Node\XHPSpreadAttribute::fromJSON($json, $file, $offset, $source);
        case 'yield_expression':
            return HHAST\Node\YieldExpression::fromJSON($json, $file, $offset, $source);
        case 'yield_from_expression':
            return
                HHAST\Node\YieldFromExpression::fromJSON($json, $file, $offset, $source);
        default:
            throw new HHAST\Node\UnsupportedASTNodeError(
                $file,
                $offset,
                (string)$json['kind']
            );
    }
}
