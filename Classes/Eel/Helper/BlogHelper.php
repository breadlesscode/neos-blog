<?php
namespace Breadlesscode\Blog\Eel\Helper;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Neos\Domain\Repository\UserRepository;
use Neos\Flow\Annotations as Flow;

class BlogHelper implements ProtectedContextAwareInterface
{
    /**
     * @var UserRepository
     * @Flow\Inject()
     */
    protected $userRepo;

    /**
     * get a specific user by the identifier
     *
     * @param string $userIdentifier
     * @return string
     */
    public function getUserByIdentifier(string $userIdentifier)
    {
        return $this->userRepo->findByIdentifier($userIdentifier);
    }

    /**
    * All methods are considered safe, i.e. can be executed from within Eel
    *
    * @param string $methodName
    * @return boolean
    */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
