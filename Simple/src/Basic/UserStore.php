<?php

namespace App\Basic;

class UserStore
{
    private array $users = [];

    /**
     * @param string $name
     * @param string $mail
     * @param string $pass
     * @return bool
     * @throws \Exception
     * Добавляет пользователей в массив $users с ключом эл.почты.
     * Если пользователь уже существует или короткий пароль, то выкидывает предупреждение.
     */
    public function addUser(string $name, string $mail, string $pass):bool
    {
        if (isset($this->users[$mail])) {
            throw new \Exception(
                "User {$mail} already in the system"
            );
        }

        if (strlen($pass) < 5) {
            throw new \Exception(
                "Password must have 5 or more letters"
            );
        }

        $this->users[$mail] = [
            'pass' => $pass,
            'mail' => $mail,
            'name' => $name
        ];

        return true;
    }

    /**
     * @param string $mail
     * Проверяет наличие ключа электронной почты в массиве $users
     * Если такая почта есть, то добавляет этому ключу поле 'failed' с текущим временем
     */
    public function notifyPasswordFailure(string $mail)
    {
        if (isset($this->users[$mail])) {
            $this->users[$mail]['failed'] = time();
        }
    }

    /**
     * @param string $mail
     * @return array
     * Возвращает пользователя по ключу эл.почты.
     */
    public function getUser(string $mail):array
    {
        return ($this->users[$mail]);
    }
}
