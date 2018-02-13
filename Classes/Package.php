<?php
namespace Breadlesscode\Blog;

use Neos\Flow\Core\Bootstrap;
use Neos\Flow\Package\Package as BasePackage;

class Package extends BasePackage
{
    /**
     * Invokes custom PHP code directly after the package manager has been initialized.
     *
     * @param Bootstrap $bootstrap The current bootstrap
     * @return void
     */
    public function boot(Bootstrap $bootstrap)
    {
        $dispatcher = $bootstrap->getSignalSlotDispatcher();

        $dispatcher->connect(
            'Neos\ContentRepository\Domain\Model\Node',
            'nodeAdded',
            'Breadlesscode\Blog\Service\PostNodePreparationService',
            'afterNodeAdded'
        );
        $dispatcher->connect(
            'Neos\ContentRepository\Domain\Model\Node',
            'afterNodeMove',
            'Breadlesscode\Blog\Service\PostNodePreparationService',
            'afterNodeMoved'
        );
    }
}
