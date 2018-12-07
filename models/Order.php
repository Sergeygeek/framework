<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 15:09
 */

namespace app\models;


class Order extends Model
{
    protected $user_id;
    protected $order;

    public function __construct($tableName, $id)
    {
        parent::__construct($tableName);
        $this->user_id = $id;
    }

    public function addToOrder(Product $product)
    {
        array_push($this->order, $product);
    }

}