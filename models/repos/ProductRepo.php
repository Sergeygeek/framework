<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.12.2018
 * Time: 21:00
 */

namespace app\models\repos;


use app\models\Product;

class ProductRepo extends Repo
{
    public function getTableName(): string
    {
        return "products";
    }

    public function getEntityClass(): string
    {
        return Product::class;
    }

}