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
    /**
     * this functions listens to the nodeAdded event
     */
    public function prepareNode(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $this->setAuthorOfPostNodeToCurrentUser($node);
        $this->setCategoryOfPostNodeToParentCategory($node);
    }
    /**
     * sets the current user label to the author property of the blog post node
     *
     * @param NodeInterface $node
     * @return void
     */
    protected function setAuthorOfPostNodeToCurrentUser(NodeInterface $node)
    {
        $currentUser = $this->userDomainService->getCurrentUser();
        $node->setProperty('author', $currentUser->getLabel());
    }
    /**
     * sets the parent category to the category property of the blog post node
     *
     * @param NodeInterface $node
     * @return void
     */
    protected function setCategoryOfPostNodeToParentCategory(NodeInterface $node)
    {
        $parentCategory =  (new FlowQuery([$node]))
            ->parent('[instanceof '. self::DOCUMENT_CATEGORY_TYPE .']')
            ->get(0);
        if ($parentCategory) {
            $node->setProperty('categories', [$parentCategory]);
        }
    }
}
