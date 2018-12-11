<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.12.2018
 * Time: 21:55
 */

namespace app\controllers;


use app\models\User;

class UserController extends Controller
{
    public function actionUser()
    {
        $id = $_GET['user_id'];
        $user = User::getOne($id);
        echo $this->render('user', ['user' => $user]);
    }
}