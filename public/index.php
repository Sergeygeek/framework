<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/AutoLoader.php";

spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);
$product = new \app\models\Product('products', 'Клавиатура', 'Крутая клавиатура', '1500', 1);
$user = new \app\models\User('users', 'Sergey', 'serg', '12345');