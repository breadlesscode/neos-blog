<?php
namespace Breadlesscode\Blog\Controller;

use Breadlesscode\Blog\Exception\InvalidNodeTypeException;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Eel\FlowQuery\FlowQuery;

class CommentController extends ActionController
{
    /**
     * @param NodeInterface $blogPost
     * @throws InvalidNodeTypeException
     */
    public function addAction(NodeInterface $blogPost)
    {
        if (!$blogPost->getNodeType()->isOfType('Breadlesscode.Blog:Document.Post')) {
            throw new InvalidNodeTypeException('The given node should be of type `Breadlesscode.Blog:Document.Post`.', 1535725916);
        }
        if (!$blogPost->getNodeType()->isOfType('Breadlesscode.Blog:Mixin.Commentable')) {
            throw new InvalidNodeTypeException('The given node should implement the mixin `Breadlesscode.Blog:Mixin.Commentable`.', 1535725917);
        }


    }
}
