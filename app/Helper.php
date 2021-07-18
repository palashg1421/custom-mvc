<?php
/**
 * @package MVC
 * Helper class of the application with static methods which loads every time
 */

namespace App;

class Helper
{
    public static function printer($data)
    {
        echo "<pre class='color-array'>";
        if($data) print_r($data);
        else var_dump($data);
        echo "</pre>";
    }

    public static function baseUri()
    {
        return pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME);
    }

    public static function baseUrl()
    {
        return $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME);
    }

    public static function setFlash($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    public static function hasFlash($key)
    {
        if( $_SESSION[$key] ) return true;
        else return false;
    }

    public static function getFlash($key)
    {
        $msg = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $msg;
    }

    public static function redirect($path)
    {
        echo $path;
        //die();
        header("Location: ./$path");
    }

    public static function getMessage($key)
    {
        $message = [];

        $message['DB_UNKNOWN_ERROR']    = 'Unknown error occur';
        $message['DB_INVALID_HOST']     = 'Invalid database host';
        $message['DB_INVALID_USER']     = 'Invalid database username';
        $message['DB_INVALID_PASS']     = 'Invalid database password';
        $message['DB_INVALID_BASE']     = 'Database not found';

        if( isset($message[$key]) )
            return $message[$key];
        else
            return 'no related message found';
    }
}
