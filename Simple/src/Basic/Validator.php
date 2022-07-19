<?php

namespace App\Basic;

class Validator
{
    private UserStore $store;

    public function __construct(UserStore $store)
    {
        $this->store = $store;
    }

    /**
     * @param string $mail
     * @param string $pass
     * @return bool
     * Если в массиве $users нет эл.почты, то вернет false
     * Если сверяемый пароль равен паролю из массива $users, то вернет true
     * Если эл. почта есть и пароли не равны, то добавляет этому ключу поле 'failed' с текущим временем
     */
    public function validateUser(string $mail, string $pass): bool
    {
        if (! is_array($user = $this->store->getUser($mail))) {
            return false;
        }

        if ($user['pass'] == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($mail);

        return false;
    }
}

