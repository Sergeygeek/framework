<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.12.2018
 * Time: 6:18
 */

namespace app\controllers;


use app\base\App;
use app\models\repos\UserRepo;
use app\models\User;

class EnterController extends Controller
{
    public function actionIndex()
    {
        $request = App::call()->request;
        $act = $request->getParam('act');
        echo $this->render('enter', ['act' => $act]);
    }

    public function actionLogin()
    {
        $request = App::call()->request;
        if ($request->isPost()) {
            if (empty($_POST['password']) || empty($_POST['login'])) {
                header('Location: /enter/index?act=login');
                exit;
            }
            $login = $_POST['login'];
            $user = (new UserRepo())->getUserByLogin($login);
            $password = md5($_POST['password']);
            if ($password === $user->password && $login === $user->login){
                $session = App::call()->session;
                $session->setKey('user_id', $user->id);
                $session->setKey('name', $user->name);
                $session->setKey('surname', $user->surname);
                $session->setKey('login', $user->login);
                $session->setKey('password', $user->password);
                header('Location: /product');
            }
            return NULL;
        }
    }

    public function actionReg()
    {
        $request = App::call()->request;
        if ($request->isPost()) {
            if (empty($_POST['name']) || empty($_POST['password'] || empty($_POST['login']))) {
                header('Location: /enter/reg/');
                exit;
            }
            $login = $_POST['login'];
            $name = $_POST['name'];
            $password = md5($_POST['password']);
            $surname = $_POST['surname'];
            $user = new User($name, $surname, $login, $password);
            (new UserRepo())->insert($user);
            $id = (new UserRepo())->getUserId($login);
            $session = App::call()->session;
            $session->setKey('user_id', $id);
            $session->setKey('name', $name);
            $session->setKey('surname', $surname);
            $session->setKey('password', $password);
            $session->setKey('login', $login);
            header('Location: /product');
        }
    }
}