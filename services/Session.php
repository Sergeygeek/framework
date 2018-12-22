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
    protected $sessionName;

    public function __construct()
    {
        session_start();
    }

    public function getAll($key)
    {
        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public function add($key, $value)
    {
        return $_SESSION[$key] .= $value;
    }
}