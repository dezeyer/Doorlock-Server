<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 14:41
 */
class loginSession{

    /**
     * @param $password
     * @return bool
     */
    public static function login($password){
        global $_SESSION;
        if($password == "123456"){ // Admin Password
            $_SESSION["adminLogin"] = true;
           return true;
        }
        $_SESSION["adminLogin"] = false;
        return false;
    }

    /**
     * @return bool
     */
    public static function isLoggedIn(){
        global $_SESSION, $_GET;
        if(isset($_SESSION["adminLogin"]) && $_SESSION["adminLogin"]){
            return true;
        }
        if($_GET["p"] != "login"){
            header("Location: /?p=login&return=".urlencode($_SERVER["REQUEST_URI"]));
            exit();
        }
    }
}