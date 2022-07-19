<?php

namespace App\Basic;

use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    private $store;

    public function setUp():void
    {
        $this->store = new UserStore();
    }

    public function tearDown():void
    {

    }

    public function testGetUser()
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals($user['mail'], "a@b.com");
        $this->assertEquals($user['name'], "bob williams");
        $this->assertEquals($user['pass'], "12345");
    }

    public function testAddUserShortPass()
    {
        try {
            $this->store->addUser("bob williams", "bob@example.com", "ff");
        } catch (\Exception $e) {
            return;
        }

        $this->fail("Short password exception expected");
    }
}
