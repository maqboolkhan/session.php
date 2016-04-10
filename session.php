<?php
/**
 * A very humble session class!
 */
class Session
{
    private $protected_fields = array();

    function __construct($fields = [], $start = true)
    {
        $this->protected_fields = $fields;
        if ($start) {
           $this->start();
        }
    }

    public function __set($prop, $val)
    {
        if (!in_array($prop, $this->protected_fields))
            $_SESSION[$prop] = $val;
        else
            if (!isset($_SESSION[$prop]))
                $_SESSION[$prop] = $val;
            else
                throw new Exception("Session key " . $prop . " is protected first remove it safely then write to it!", 1);
    }

    public function __get($prop)
    {
        return $_SESSION[$prop];
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function start()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }

    public function regenerate_id()
    {
        session_regenerate_id();
    }

    public function data()
    {
        return $_SESSION;
    }

    public function clear()
    {
        $_SESSION = [];
    }
}