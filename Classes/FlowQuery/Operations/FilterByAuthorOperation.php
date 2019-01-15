<?php
namespace Breadlesscode\Blog\FlowQuery\Operations;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Eel\FlowQuery\FlowQuery;
use Neos\Eel\FlowQuery\FlowQueryException;
use Neos\Eel\FlowQuery\Operations\AbstractOperation;

class FilterByAuthorOperation extends AbstractOperation
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    static protected $shortName = 'filterByAuthor';

    /**
     * the nodetype name of the author page document nodetype
     */
    const AUTHOR_DOCUMENT_NODETYPE = 'Breadlesscode.Blog:Document.Author';

    /**
     * {@inheritdoc}
     *
     * @param FlowQuery $flowQuery the FlowQuery object
     * @param array $arguments the arguments for this operation
     * @return void
     * @throws FlowQueryException
     */
    public function evaluate(FlowQuery $flowQuery, array $arguments)
    {
        if (!is_string($arguments[0]) || $this->isAuthorDocumentNode($arguments[0])) {
            throw new FlowQueryException('The first parameter of '.self::$shortName.' should be a string or a node of type '.self::AUTHOR_DOCUMENT_NODETYPE.'.');
        }

        if ($arguments[0] instanceof NodeInterface) {
            $arguments[0] = $userIdentifier->getProperty('user');
        }

        if ($arguments[0] === false || $arguments[0] === null || $arguments[0] === '') {
            return;
        }

        $context = \array_filter($flowQuery->getContext(), function(NodeInterface $node) use ($arguments) {
            return $node->getProperty('author') === $arguments[0];
        });
        $flowQuery->setContext($context);
    }

    /**
     * checks the given argument if its a author page
     *
     * @param mixed $node
     * @return boolean
     */
    protected function isAuthorDocumentNode($node)
    {
        return (
            $node instanceof NodeInterface &&
            $node->getNodeType()->getName() === self::AUTHOR_DOCUMENT_NODETYPE
        );
    }
}
