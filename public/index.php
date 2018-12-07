<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/AutoLoader.php";

spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);

$product = new \app\models\Product();

//var_dump($product->updateItem(4, ['price', ], 11000));
//var_dump($product->addToTable(['Горка', 'Самая быстрая горка', 16000, 1, 2]));
