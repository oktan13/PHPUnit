<?php

namespace App;

use App\Basic\UserStore;
use App\Basic\Validator;

class Runner
{
    public static function runBasic()
    {
        $store = new UserStore();
        $store->addUser(
            "bob williams",
            "bob@example.com",
            "12345"
        );
        $store->notifyPasswordFailure("bob@example.com");
        $user = $store->getUser("bob@example.com");
        dump($user);
    }

    public static function runBasic2()
    {

        $store = new UserStore();
        $store->addUser("bob williams", "bob@example.com", "12345");
        $validator = new Validator($store);
        if ($validator->validateUser("bob@example.com", "12345")) {
            print "pass, friend!\n";
        }
        $user = $store->getUser("bob@example.com");
        dump($user);
    }
}
/*
 * Запуск PHPUnit:
 * vendor\bin\phpunit tests
 * */

