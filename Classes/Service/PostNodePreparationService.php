<?php

namespace Breadlesscode\Blog\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\FlowQuery\FlowQuery;
use Neos\ContentRepository\Domain\Model\NodeInterface;

/**
 * This service prepare the post node
 *
 * @Flow\Scope("singleton")
 */
class PostNodePreparationService
{
    /**
     * error page type name
     */
    const DOCUMENT_CATEGORY_TYPE = 'Breadlesscode.Blog:Document.Category';
    /**
     * error page type name
     */
    const DOCUMENT_POST_TYPE = 'Breadlesscode.Blog:Document.Post';
    /**
     * @Flow\Inject
     * @var \Neos\Neos\Domain\Service\UserService
     */
    protected $userDomainService;

    public function prepareNode(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $currentUser = $this->userDomainService->getCurrentUser();
        $node->setProperty('author', $currentUser->getLabel());

        $parentCategory =  (new FlowQuery([$node]))
            ->parent('[instanceof '. self::DOCUMENT_CATEGORY_TYPE .']')
            ->get(0);
        if ($parentCategory) {
            $node->setProperty('categories', [$parentCategory]);
        }
    }
}
