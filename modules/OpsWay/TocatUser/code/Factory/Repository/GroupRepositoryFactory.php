<?php

namespace OpsWay\TocatUser\Factory\Repository;

use Doctrine\ORM\EntityManager;
use Humus\Doctrine\Hydrator\Hydrator;
use OpsWay\TocatUser\Entity\Group as GroupEntity;
use OpsWay\TocatUser\Repository\GroupRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GroupRepositoryFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return GroupRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var $em              EntityManager
         * @var $groupRepository GroupRepository
         */
        $em = $serviceLocator->get('doctrine.entitymanager.orm_default');
        $groupRepository = $em->getRepository(GroupEntity::class);
        $hydrator = new Hydrator(
            $em,
            true,
            ['id', 'name', 'description', 'team', 'active', 'users' => ['id', 'email', 'displayName']],
            false
        );
        $groupRepository->setHydrator($hydrator);

        return $groupRepository;
    }
}
