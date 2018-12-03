<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5a9b950d6b28df577677852c567b7c27>>
 */
namespace HackToPhp\HHAST\Node\__Private;
use HackToPhp\HHAST;

require_once(__DIR__ . '/Trivia.php');

/**
 * @param array<string, mixed> $json
 */
function editable_trivia_from_json(
  array $json,
  string $file,
  int $offset,
  string $source
): HHAST\Node\EditableTrivia {
  $trivia_text = \substr($source, $offset, $json['width']);
  switch ((string)$json['kind']) {
    case 'after_halt_compiler':
      return new HHAST\Node\AfterHaltCompiler($trivia_text);
    case 'delimited_comment':
      return new HHAST\Node\DelimitedComment($trivia_text);
    case 'end_of_line':
      return new HHAST\Node\EndOfLine($trivia_text);
    case 'extra_token_error':
      return new HHAST\Node\ExtraTokenError($trivia_text);
    case 'fall_through':
      return new HHAST\Node\FallThrough($trivia_text);
    case 'fix_me':
      return new HHAST\Node\FixMe($trivia_text);
    case 'ignore_error':
      return new HHAST\Node\IgnoreError($trivia_text);
    case 'single_line_comment':
      return new HHAST\Node\SingleLineComment($trivia_text);
    case 'unsafe':
      return new HHAST\Node\Unsafe($trivia_text);
    case 'unsafe_expression':
      return new HHAST\Node\UnsafeExpression($trivia_text);
    case 'whitespace':
      return new HHAST\Node\WhiteSpace($trivia_text);
    default:
      throw new HHAST\Node\UnsupportedASTNodeError(
        $file,
        $offset,
        (string)$json['kind']
      );
  }
}
