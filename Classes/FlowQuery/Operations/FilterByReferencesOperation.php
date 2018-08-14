<?php
namespace Breadlesscode\Blog\FlowQuery\Operations;

use Neos\Eel\FlowQuery\FlowQuery;
use Neos\Eel\FlowQuery\Operations\AbstractOperation;
use Neos\Eel\FlowQuery\FlowQueryException;

class FilterByReferencesOperation extends AbstractOperation
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    static protected $shortName = 'filterByReferences';

    /**
     * {@inheritdoc}
     *
     * @param FlowQuery $flowQuery the FlowQuery object
     * @param array $arguments the arguments for this operation
     * @return void
     */
    public function evaluate(FlowQuery $flowQuery, array $arguments)
    {
        if (!is_string($arguments[0])) {
            throw new FlowQueryException('The first parameter of '.self::$shortName.' should be an string.');
        }
        if (!is_array($arguments[1])) {
            throw new FlowQueryException('The second parameter of '.self::$shortName.' should be an array.');
        }

        $context = \array_filter($flowQuery->getContext(), $this->getReferenceFilter($arguments[0], $arguments[1]));
        $flowQuery->setContext($context);
    }

    /**
     * this method returns a clousre which intersect references on a given property
     *
     * @param string $propertyName
     * @param array $references
     * @return \Closure
     */
    public function getReferenceFilter(string $propertyName, array $references)
    {
        return function ($node) use ($propertyName, $references) {
            $nodeReferences = $node->getProperty($propertyName);

            if ($nodeReferences === null) {
                return false;
            }
            return count(array_intersect($nodeReferences, $references)) > 0;
        };
    }
}
