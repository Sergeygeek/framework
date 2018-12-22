<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.12.2018
 * Time: 19:14
 */

namespace app\controllers;


use app\base\App;
use app\models\Cart;
use app\services\Request;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('cart', ['basket' => (new Cart())->getAll()]);
    }

    public function actionAdd()
    {
        $request = App::call()->request;
        if ($request->isPost()){
            $productId = (int) $request->getParams()['id'];
            $productQty = (int) $request->getParams()['qty'] ?: 1;

            (new Cart())->addToCart($productId, $productQty);
            echo json_encode(['success' => 'ok', 'message' => 'Товар был успешно добавлен в корзину']);
        }
    }
}