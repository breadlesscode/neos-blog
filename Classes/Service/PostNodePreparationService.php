<?php

namespace Breadlesscode\Blog\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\FlowQuery\FlowQuery;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;

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
     * @Flow\Inject
     * @var PersistenceManager
     */
    protected $persistenceManager;

    /**
     * this functions listens to the nodeAdded event
     */
    public function afterNodeAdded(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $this->setAuthorOfPostNodeToCurrentUser($node);
        $this->setCategoryOfPostNodeToParentCategory($node);
    }
    /**
     * this functions listens to the nodeMoved event
     */
    public function afterNodeMoved(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

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
        $userIdentifier = $this->persistenceManager->getIdentifierByObject($currentUser);

        $node->setProperty('author', $userIdentifier);
    }
    /**
     * sets the parent category to the category property of the blog post node
     *
     * @param NodeInterface $node
     * @return void
     */
    protected function setCategoryOfPostNodeToParentCategory(NodeInterface $node)
    {
        $parentCategories =  (new FlowQuery([$node]))
            ->parent('[instanceof '. self::DOCUMENT_CATEGORY_TYPE .']')
            ->get();
        
        $node->setProperty('categories', $parentCategories);
    }
}
