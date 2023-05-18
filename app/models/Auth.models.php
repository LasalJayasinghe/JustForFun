<?php

class Auth
{
    public static $password;

    public static function authenticate($row)
    {
        $_SESSION['USER_DATA'] = $row;
        self::$password = $row['password']; // Update the password in the Auth class
        return true;
    }
    public static function logout()
    {
        if(!empty($_SESSION['USER_DATA'])){
           unset( $_SESSION['USER_DATA']);
           session_unset();
        }
    }

    public static function logged_in()
    {
        if(!empty($_SESSION['USER_DATA']))
        {
            return true;
        }

        return false;
    }

    public static function is_admin()
    {
        if(!empty($_SESSION['USER_DATA']))
        {
            if($_SESSION['USER_DATA']->role == "admin")
            {
                return true;
            }
        }

        return false;
    }

    public static function __callStatic($func, $arg){
        $key = str_replace("get","",strtolower($func)); // takes the kind of function thats missing by removing the "get" part
        if(!empty($_SESSION['USER_DATA'][$key])){

            return ($_SESSION['USER_DATA'][$key]);
        }
        return 'empty';
    }

}

