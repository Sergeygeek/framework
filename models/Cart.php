<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 14:55
 */

namespace app\models;


class Cart extends Model
{
    protected $user_id;
    protected $order_id;
    protected $cart;

    public function addToCart(Product $product)
    {
        array_push($this->cart, $product);
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