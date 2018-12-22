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

    public function __construct($sessionName)
    {
        session_start();
        $this->sessionName = $sessionName;
        $_SESSION[$sessionName];
    }

    public function get($key)
    {
        return $_SESSION[$this->sessionName][$key];
    }

    public function getAll()
    {
        return $_SESSION[$this->sessionName];
    }

    public function set($key, $value)
    {
        return $_SESSION[$this->sessionName][$key] = $value;
    }

    public function add($key, $value)
    {
        return $_SESSION[$this->sessionName][$key] .= $value;
    }
}