<?php
namespace Breadlesscode\Blog\Service;

use Breadlesscode\Blog\Dto\CommentDto;
use Breadlesscode\Blog\Exception\InvalidNodeTypeException;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Domain\Service\ContextFactoryInterface;

class CommentService
{
    /**
     * node type of the commentable mixin
     */
    const COMMENTABLE_NODE_TYPE = 'Breadlesscode.Blog:Mixin.Commentable';

    /**
     * @Flow\Inject
     * @var ContextFactoryInterface
     */
    private $contextFactory;

    /**
     * creates a comment node from the CommentDto
     *
     * @param CommentDto $comment
     * @return NodeInterface
     */
    public function createNode(CommentDto $comment): NodeInterface
    {
        $commentNode = null;

        return $commentNode;
    }

    /**
     * adds a comment node to a blog post node
     *
     * @param NodeInterface $commentableNode
     * @param NodeInterface $commentNode
     * @throws InvalidNodeTypeException
     */
    public function addToPost(NodeInterface $commentableNode, NodeInterface $commentNode)
    {
        if (!$commentableNode->getNodeType()->isOfType(self::COMMENTABLE_NODE_TYPE)) {
            throw new InvalidNodeTypeException('The commentable node type should implement the mixin '.self::COMMENTABLE_NODE_TYPE, 1536244558);
        }

        $commentCollection = $commentableNode->getNode('comments');
        $commentCollection->moveInto($commentNode);
    }

    /**
     * @param string $commentableIdentifier
     * @return NodeInterface|null
     * @throws \Exception
     */
    public function findCommentable(string $commentableIdentifier): ?NodeInterface
    {
        $commentableNode = $this->getContext()->getNodeByIdentifier($commentableIdentifier);

        if (!$commentableNode->getNodeType()->isOfType(self::COMMENTABLE_NODE_TYPE)) {
            throw new InvalidNodeTypeException('The commentable node type should implement the mixin '.self::COMMENTABLE_NODE_TYPE, 1536244558);
        }

        return $commentableNode;
    }

    /**
     * @return \Neos\ContentRepository\Domain\Service\Context
     * @throws \Exception
     */
    protected function getContext()
    {
        return $this->contextFactory->create([
            'workspaceName' => 'live',
            'currentDateTime' => new \Neos\Flow\Utility\Now(),
            'dimensions' => [],
            'invisibleContentShown' => true,
            'removedContentShown' => false,
            'inaccessibleContentShown' => false
        ]);
    }

}
