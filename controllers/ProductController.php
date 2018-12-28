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
        $session = App::call()->session;
        $is_loged = false;
        if($session->getAll('user_id')){
            $is_loged = true;
        }
        $products = (new ProductRepo())->getAll();
        $catalog = $this->renderTemplate('catalog', ['products' => $products]);
        $header = $this->renderTemplate('header', ['is_loged' => $is_loged]);
        echo $this->render('content', ['catalog' => $catalog,
                                                'header' => $header]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $product = (new ProductRepo())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}