<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.12.2018
 * Time: 6:12
 */

namespace app\services;


class Session
{
    public function __construct()
    {
        session_start();
    }

    public function getAll($key)
    {
        return $_SESSION[$key];
    }

    public function setArrKey($name, $key, $value)
    {
        return $_SESSION[$name][$key] = $value;
    }

    public function setKey($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public function addToArrKey($name, $key, $value)
    {
        return $_SESSION[$name][$key] += $value;
    }

    public function addToKey($key, $value)
    {
        return $_SESSION[$key] += $value;
    }
}