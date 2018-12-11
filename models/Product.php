<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 9:18
 */

namespace app\models;


class Product extends Record
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $customer_id;
    protected $category_id;

    public function __construct($id = null, $name = null, $description = null,
                                $price = null, $customer_id = null, $category_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->customer_id = $customer_id;
        $this->category_id = $category_id;

    }

    public static function getTableName()  : string
    {
        return "products";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price)
    {
        $this->setInitParams();
        $this->price = $price;
    }

    public function getColumns()
    {
        return 'name, description, price, customer_id, category_id';
    }
}