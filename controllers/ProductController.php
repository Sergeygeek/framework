<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.12.2018
 * Time: 21:42
 */

namespace app\controllers;

use app\base\App;
use app\models\repos\ProductRepo;
use app\services\Request;


class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = (new ProductRepo())->getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $product = (new ProductRepo())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}