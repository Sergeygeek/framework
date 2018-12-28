<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 14:55
 */

namespace app\models;


use app\base\App;
use app\models\repos\ProductRepo;
use app\services\Session;

class Cart extends Record
{
    protected $user_id;
    protected $order_id;
    protected $cart;

    public function addToCart($productId, $productQty)
    {
        $session = App::call()->session;
        $basket = $session->getAll('basket');
        if ($basket[$productId]){
            $session->addToArrKey('basket', $productId, $productQty);
        } else {
            $session->setArrKey('basket', $productId, $productQty);
        }
    }

    public static function getTableName() : string
    {
        return 'cart';
    }

    public function getAll()
    {
        $basket = [];
        $session = App::call()->session;
        if(!empty($session->getAll('basket'))){
            $productsIds = array_keys($session->getAll('basket'));
            $products = (new ProductRepo())->getProductsByIds($productsIds);
            foreach ($products as $product){
                $basket[] = [
                    'product' => $product,
                    'count' => $session->getAll('basket')[$product->getId()]
                ];
            }
        }
        return $basket;
    }

    public function addToTable($productId, $productQty): bool
    {
        // TODO: Implement updateItem() method.
    }

    public function updateItem(int $id): bool
    {
        // TODO: Implement updateItem() method.
    }
}