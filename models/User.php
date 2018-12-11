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
    protected $id;
    protected $name;
    protected $surname;
    protected $login;
    protected $password;

    public function __construct($id = null, $name = null, $surname = null, $login = null, $password = null)
    {
        parent::__construct();
        $this->id = $id;
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
}