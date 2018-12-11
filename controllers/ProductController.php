<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.12.2018
 * Time: 21:42
 */

namespace app\controllers;

use app\models\Product;


class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Product::getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        $product->setPrice(1000);
        $product->update();
        echo $this->render('card', ['product' => $product]);
    }
}