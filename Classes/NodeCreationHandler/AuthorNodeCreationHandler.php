<?php
namespace Breadlesscode\Blog\NodeCreationHandler;

/*
 * This file is part of the Neos.Neos.Ui package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Breadlesscode\Blog\Service\PostNodePreparationService;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Neos\Domain\Model\User;
use Neos\Neos\Ui\NodeCreationHandler\NodeCreationHandlerInterface;
use Neos\Neos\Domain\Repository\UserRepository;
use Neos\Neos\Utility\NodeUriPathSegmentGenerator;

class AuthorNodeCreationHandler implements NodeCreationHandlerInterface
{
    /**
     * @var UserRepository
     * @Flow\Inject()
     */
    protected $userRepo;

    /**
     * @Flow\Inject
     * @var NodeUriPathSegmentGenerator
     */
    protected $nodeUriPathSegmentGenerator;

    /**
     * Set the node title for the newly created Document node
     *
     * @param NodeInterface $node The newly created node
     * @param array $data incoming data from the creationDialog
     * @return void
     * @throws \Neos\Neos\Exception
     */
    public function handle(NodeInterface $node, array $data)
    {
        if (!$node->getNodeType()->isOfType(PostNodePreparationService::DOCUMENT_AUTHOR_TYPE)) {
            return;
        }
        /** @var User $user */
        $user = $this->userRepo->findByIdentifier($data['user']);

        $node->setProperty('user', $data['user']);
        $node->setProperty('title', $user->getLabel());
        $node->setProperty('uriPathSegment', $this->nodeUriPathSegmentGenerator->generateUriPathSegment($node, $user->getLabel()));
    }
}
