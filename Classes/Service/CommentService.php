<?php
namespace Breadlesscode\Blog\Service;

use Breadlesscode\Blog\Dto\CommentDto;
use Neos\ContentRepository\Domain\Model\NodeInterface;

class CommentService
{
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
     * @param NodeInterface $blogPostNode
     * @param NodeInterface $commentNode
     */
    public function addToPost(NodeInterface $blogPostNode, NodeInterface $commentNode)
    {
        $commentCollection = $blogPostNode->getNode('comments');
        $commentCollection->moveInto($commentNode);
    }
}
