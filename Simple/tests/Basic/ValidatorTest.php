<?php

namespace App\Basic;

use PHPUnit\Framework\TestCase;

class ValidatorTestBasic extends TestCase
{
    private $validator;

    public function setUp():void
    {
        $store = new UserStore();
        $store->addUser("bob williams", "bob@example.com", "12345");
        $this->validator = new Validator($store);
    }

    public function tearDown():void
    {
    }

    public function testValidateCorrectPass()
    {
        $this->assertTrue(
            $this->validator->validateUser("bob@example.com", "12345"),
            "Expecting successful validation"
        );
    }
}
