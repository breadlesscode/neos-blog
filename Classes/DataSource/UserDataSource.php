<?php
namespace Breadlesscode\Blog\DataSource;

use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Neos\Domain\Repository\UserRepository;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;

class UserDataSource extends AbstractDataSource
{
    /**
     * @var string
     */
    static protected $identifier = 'breadlesscode-blog-user-datasource';

    /**
     * @Flow\Inject()
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @Flow\Inject()
     * @var PersistenceManager
     */
    protected $persistenceManager;

    /**
     * Get data
     *
     * @param NodeInterface $node The node that is currently edited (optional)
     * @param array $arguments Additional arguments (key / value)
     * @return array JSON serializable data
     */
    public function getData(NodeInterface $node = null, array $arguments)
    {
        $users = $this->userRepository->findAll();
        $data = [];

        foreach ($users as $user)
        {
            $data[] = [
                'label' => $user->getLabel(),
                'value' => $this->persistenceManager->getIdentifierByObject($user)
            ];
        }

        return $data;
    }
}
