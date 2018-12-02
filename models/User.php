<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 14:52
 */

namespace app\models;


class User extends Model
{
    protected $id;
    protected $name;
    protected $login;
    protected $password;

    public function __construct($tableName, $name, $login, $password)
    {
        parent::__construct($tableName);
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function addToTable(): bool
    {
        // TODO: Implement addToTable() method.
    }

    public function updateItem(int $id): bool
    {
        // TODO: Implement updateItem() method.
    }
}