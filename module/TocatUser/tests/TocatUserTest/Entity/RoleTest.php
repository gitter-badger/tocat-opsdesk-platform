<?php

namespace TocatUserTest\Entity;

use TocatUser\Entity\Role as Entity;

class RoleTest extends \PHPUnit_Framework_TestCase
{
    protected $role;

    public function setUp()
    {
        $role = new Entity;
        $this->role = $role;
    }

    public function testSetGetId()
    {
        $this->assertEquals($this->role, $this->role->setId(123));
        $this->assertEquals(123, $this->role->getId());
    }

    public function testSetGetRoleId()
    {
        $this->assertEquals($this->role, $this->role->setRoleId('test'));
        $this->assertEquals('test', $this->role->getRoleId());
    }

    public function testSetGetParent()
    {
        $this->assertEquals($this->role, $this->role->setParent(new Entity()));
        $this->assertNotEquals($this->role, $this->role->getParent());
        $this->assertEquals(new Entity(), $this->role->getParent());
    }
}
