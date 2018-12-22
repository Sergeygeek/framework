<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 15:09
 */

namespace app\models;


class Order extends Record
{
    protected $order;

    public static function getTableName() : string
    {
        return 'cart';
    }


    public function addToOrder(Product $product)
    {
        array_push($this->order, $product);
    }

}