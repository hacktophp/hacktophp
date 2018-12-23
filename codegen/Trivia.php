<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9488bcb9d1e88f74517bcd8442aa4d83>>
 */
namespace Facebook\HHAST;

final class AfterHaltCompiler extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('after_halt_compiler', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class DelimitedComment extends EditableTrivia implements IComment {

  public function __construct(string $text) {
    parent::__construct('delimited_comment', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class EndOfLine extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('end_of_line', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class ExtraTokenError extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('extra_token_error', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class FallThrough extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('fall_through', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class FixMe extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('fix_me', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class IgnoreError extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('ignore_error', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class SingleLineComment extends EditableTrivia implements IComment {

  public function __construct(string $text) {
    parent::__construct('single_line_comment', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class Unsafe extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('unsafe', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class UnsafeExpression extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('unsafe_expression', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}

final class WhiteSpace extends EditableTrivia {

  public function __construct(string $text) {
    parent::__construct('whitespace', $text);
  }

  /**
   * @return static
   */
  public function withText(string $text) {
    if ($text === $this->getText()) {
      return $this;
    }
    return new self($text);
  }
}
