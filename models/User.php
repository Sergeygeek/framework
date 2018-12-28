<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 14:52
 */

namespace app\models;


class User extends Record
{
    public $id;
    public $name;
    public $surname;
    public $login;
    public $password;

    public function __construct($name = null, $surname = null, $login = null, $password = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->login = $login;
        $this->password = $password;
    }

    public static function getTableName()  : string
    {
        return "users";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOne()
    {

    }
}