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
     * {@inheritdoc}
     *
     * @param FlowQuery $flowQuery the FlowQuery object
     * @param array $arguments the arguments for this operation
     * @return void
     * @throws FlowQueryException
     */
    public function evaluate(FlowQuery $flowQuery, array $arguments)
    {
        if (!is_string($arguments[0])) {
            throw new FlowQueryException('The first parameter of '.self::$shortName.' should be a string');
        }

        $context = \array_filter($flowQuery->getContext(), function(NodeInterface $node) use ($arguments) {
            return $node->getProperty('author') === $arguments[0];
        });
        $flowQuery->setContext($context);
    }
}
