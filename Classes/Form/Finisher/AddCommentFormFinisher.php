<?php
namespace Breadlesscode\Blog\Form\Finisher;

use Breadlesscode\Blog\Dto\CommentDto;
use Breadlesscode\Blog\Exception\InvalidNodeTypeException;
use Breadlesscode\Blog\Service\CommentService;
use Neos\Form\Core\Model\AbstractFinisher;
use Neos\Flow\Annotations as Flow;

class AddCommentFormFinisher extends AbstractFinisher
{
    /**
     * @var CommentService
     * @Flow\Inject()
     */
    protected $commentService;

    /**
     * this finisher adds a comment to a given node
     */
    protected function executeInternal()
    {
        try {
            $commentableNode = $this->parseOption('node');
            $this->commentService->addComment($commentableNode, $this->getCommentDto());
        } catch (\Exception | InvalidNodeTypeException $exception) {
            $this->finisherContext->cancel();
        }
    }

    /**
     * @return CommentDto
     */
    protected function getCommentDto(): CommentDto
    {
        $comment = new CommentDto();
        $comment->setName($this->parseOption('name'));
        $comment->setEmail($this->parseOption('email'));
        $comment->setContent($this->parseOption('content'));
        $comment->setIsHidden(true);

        return $comment;
    }
}
