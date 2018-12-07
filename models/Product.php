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
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $customer_id;
    protected $category_id;

    public function getTableName()  : string
    {
        return "products";
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function setParams()
    {
//        $this->id = $id;
//        $this->name = $name;
//        $this->description = $description;
//        $this->price = $price;
//        $this->customer_id = $customer_id;
//        $this->category_id = $category_id;
    }

    public function prepareParams(){
        return $this->params = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':customer_id' => $this->customer_id,
            ':category_id' => $this->category_id
        ];
    }

    public function getColumns()
    {
        return 'name, description, price, customer_id, category_id';
    }
}