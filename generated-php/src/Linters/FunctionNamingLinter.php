<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{ClassishDeclaration as ClassishDeclaration, ConstructToken as ConstructToken, DestructToken as DestructToken, EditableList as EditableList, EditableNode as EditableNode, EditableToken as EditableToken, EndOfLine as EndOfLine, FunctionDeclaration as FunctionDeclaration, IFunctionishDeclaration as IFunctionishDeclaration, MethodishDeclaration as MethodishDeclaration, StaticToken as StaticToken};
use Facebook\HHAST as HHAST;
use HH\Lib\{C as C, Str as Str, Vec as Vec};
abstract class FunctionNamingLinter extends ASTLinter
{
    /**
     * @return string
     */
    public abstract function getSuggestedNameForFunction(string $name, FunctionDeclaration $fun);
    /**
     * @return string
     */
    public abstract function getSuggestedNameForInstanceMethod(string $name, MethodishDeclaration $meth);
    /**
     * @return string
     */
    public abstract function getSuggestedNameForStaticMethod(string $name, MethodishDeclaration $meth);
    /**
     * @return string
     */
    protected function getErrorDescription(string $what, ?string $class, string $name, string $suggestion)
    {
        if ($class === null) {
            return Str\format('%s "%s()" does not match conventions; consider renaming to "%s"', $what, $name, $suggestion);
        }
        return Str\format('%s "%s()" in class "%s" does not match conventions; consider renaming ' . 'to "%s"', $what, $name, $class, $suggestion);
    }
    /**
     * @return IFunctionishDeclaration::class
     */
    protected static final function getTargetType()
    {
        return IFunctionishDeclaration::class;
    }
    /**
     * @return null|EditableToken
     */
    private function getCurrentNameNodeForFunctionOrMethod(EditableNode $node)
    {
        if ($node instanceof FunctionDeclaration) {
            return $node->getDeclarationHeader()->getName();
        }
        if ($node instanceof MethodishDeclaration) {
            return $node->getFunctionDeclHeader()->getName();
        }
        return null;
    }
    /**
     * @param array<int, EditableNode> $parents
     *
     * @return null|FunctionNamingLintError
     */
    public final function getLintErrorForNode(IFunctionishDeclaration $node, array $parents)
    {
        $token = $this->getCurrentNameNodeForFunctionOrMethod($node);
        if ($token === null) {
            return null;
        }
        if ($token instanceof ConstructToken || $token instanceof DestructToken) {
            return null;
        }
        $old = $token->getText();
        if (Str\starts_with($old, '__')) {
            return null;
        }
        if ($node instanceof FunctionDeclaration) {
            $what = 'Function';
            $new = $this->getSuggestedNameForFunction($old, $node);
        } else {
            if ($node instanceof MethodishDeclaration) {
                if (C\is_empty((array) (($node->getFunctionDeclHeader()->getModifiers() ? $node->getFunctionDeclHeader()->getModifiers()->getDescendantsOfType(StaticToken::class) : null) ?? array()))) {
                    $what = 'Method';
                    $new = $this->getSuggestedNameForInstanceMethod($old, $node);
                } else {
                    $what = 'Static method';
                    $new = $this->getSuggestedNameForStaticMethod($old, $node);
                }
            } else {
                invariant_violation('Can\'t handle type %s', \get_class($node));
            }
        }
        if ($old === $new) {
            return null;
        }
        $ns = HHAST\__Private\Resolution\get_current_namespace($node, $parents);
        if ($node instanceof FunctionDeclaration) {
            $class = null;
        } else {
            $class = C\find(Vec\reverse($parents), function ($c) {
                return $c instanceof ClassishDeclaration;
            });
            invariant($class instanceof ClassishDeclaration, 'failed to find a class for a method');
            $class = $class->getName() ? $class->getName()->getText() : null;
        }
        return new FunctionNamingLintError($this, $this->getErrorDescription($what, $class, $old, $new), $ns, $class, $old, $new, $node);
    }
    /**
     * @return string
     */
    public function getPrettyTextForNode(IFunctionishDeclaration $node)
    {
        if ($node instanceof FunctionDeclaration) {
            $node = $node->withBody(HHAST\Missing());
        } else {
            if ($node instanceof MethodishDeclaration) {
                $node = $node->withFunctionBody(HHAST\Missing());
            } else {
                invariant_violation('unhandled type: %s', \get_class($node));
            }
        }
        $leading = $node->getFirstTokenx()->getLeading();
        if ($leading instanceof EditableList) {
            $new = array();
            foreach (Vec\reverse($leading->toVec()) as $child) {
                $new[] = $child;
                if ($child instanceof EndOfLine) {
                    break;
                }
            }
            $leading = EditableList::createNonEmptyListOrMissing(Vec\reverse($new));
        }
        return $node->replace($node->getFirstTokenx(), $node->getFirstTokenx()->withLeading($leading))->getCode();
    }
}

