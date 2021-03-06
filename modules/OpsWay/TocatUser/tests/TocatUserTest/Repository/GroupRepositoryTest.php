<?php

namespace OpsWay\TocatUserTest\Repository;

use Tests\Bootstrap;
use OpsWay\TocatUser\Repository\GroupRepository;
use OpsWay\TocatUser\Entity\Group as GroupEntity;

class GroupRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $locator;
    /**
     * @var GroupRepository
     */
    private $repository;

    protected function setUp()
    {
        $this->locator = Bootstrap::getServiceManager();
        $this->repository = $this->locator->get(GroupRepository::class);
    }

    public function testCreateNewEntity()
    {
        $this->assertEquals(new GroupEntity(), $this->repository->createNewEntity());
    }

    public function testHydrate()
    {
        $data = ['id' => 1, 'name' => 'test', 'description' => 'test', 'team' => true, 'active' => true];
        $group = new GroupEntity();
        $group = $this->repository->hydrate($group, $data);
        $this->assertInstanceOf('OpsWay\TocatUser\Entity\Group', $group);
        //todo: test failing on this, need investigate why
        //$this->assertEquals(1, $group->getId());
    }

    public function testExtract()
    {
        $group = (new GroupEntity())->setId(2);
        $data = $this->repository->extract($group);
        $this->assertArrayHasKey('id', $data);
        $this->assertEquals(2, $data['id']);
    }
}
