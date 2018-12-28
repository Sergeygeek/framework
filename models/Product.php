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
    public $price;
    protected $customer_id;
    protected $category_id;

    public function __construct($id = null, $name = null, $description = null,
                                $price = null, $customer_id = null, $category_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->customer_id = $customer_id;
        $this->category_id = $category_id;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->name;
        }
    }

    public function __isset($name)
    {
        return isset($this->name);
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
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPriceWithDiscount(Discount $discountStrategy)
    {
        $discount = $discountStrategy->getBaseDiscount();
        return $this->price - $discount;
    }
}