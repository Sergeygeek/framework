<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.12.2018
 * Time: 5:09
 */

namespace app\models\repos;
use app\models\User;


class UserRepo extends Repo
{
    public function getTableName(): string
    {
        return 'users';
    }

    public function getEntityClass(): string
    {
        return User::class;
    }

    public function getUserByLogin($login)
    {
        $sql = "SELECT * FROM users WHERE login = :login";
        return $this->find($sql,  [':login' => $login])[0];
    }

    public function getUserId($login)
    {
        $sql = "SELECT id FROM users WHERE login = :login";
        return $this->find($sql,  [':login' => $login]);
    }
}