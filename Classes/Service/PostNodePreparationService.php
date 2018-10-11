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
    const DOCUMENT_CATEGORY_TYPE = 'Breadlesscode.Blog:Document.CategoryBlog';

    /**
     * error page type name
     */
    const DOCUMENT_POST_TYPE = 'Breadlesscode.Blog:Document.Post';

    /**
     * author page node type
     */
    const DOCUMENT_AUTHOR_TYPE = 'Breadlesscode.Blog:Document.Author';

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
     *
     * @param NodeInterface $node
     * @throws \Neos\Eel\Exception
     */
    public function afterNodeAdded(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $this->setAuthorOfPostNodeToCurrentUser($node);
        $this->addParentCategoryToPostNode($node);
    }

    /**
     * this functions listens to the nodeMoved event
     *
     * @param NodeInterface $node
     * @throws \Neos\Eel\Exception
     */
    public function beforeNodeMoved(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $this->removeParentCategoryFromPostNode($node);
    }

    /**
     * this functions listens to the nodeMoved event
     *
     * @param NodeInterface $node
     * @throws \Neos\Eel\Exception
     */
    public function afterNodeMoved(NodeInterface $node)
    {
        if (!$node->getNodeType()->isOfType(self::DOCUMENT_POST_TYPE)) {
            return;
        }

        $this->addParentCategoryToPostNode($node);
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
     * @throws \Neos\Eel\Exception
     */
    protected function removeParentCategoryFromPostNode(NodeInterface $node)
    {
        $parentCategory =  (new FlowQuery([$node]))
            ->parent('[instanceof '. self::DOCUMENT_CATEGORY_TYPE .']')
            ->get(0);

        if ($parentCategory !== null) {
            $categories = $node->getProperty('categories');
            $index = array_search($parentCategory, $categories, true);
            if ($index !== false) {
                array_splice($categories, $index, 1);
                $node->setProperty('categories', $categories);
            }
        }
    }

    /**
     * sets the parent category to the category property of the blog post node
     *
     * @param NodeInterface $node
     * @return void
     * @throws \Neos\Eel\Exception
     */
    protected function addParentCategoryToPostNode(NodeInterface $node)
    {
        $parentCategory =  (new FlowQuery([$node]))
            ->parent('[instanceof '. self::DOCUMENT_CATEGORY_TYPE .']')
            ->get(0);

        if ($parentCategory !== null) {
            $categories = $node->getProperty('categories');
            if (array_search($parentCategory, $categories, true) === false) {
                $categories[] = $parentCategory;
                $node->setProperty('categories', $categories);
            }
        }
    }
}
