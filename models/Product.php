<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 9:18
 */

namespace app\models;


class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $customer_id;

    public function __construct($tableName, $name, $description, $price, $customer_id)
    {
        parent::__construct($tableName);
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->customer_id = $customer_id;
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