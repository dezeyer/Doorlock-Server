<?php
error_reporting(-1);
ini_set("display_errors","true");
date_default_timezone_set('Europe/Amsterdam');
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 14:21
 */
#require
require_once("class/login.php");
require_once("class/page.php");
require_once("class/msg.php");
require_once("class/sqlitedb.php");

require_once("class/chip.php");
require_once("class/doorclient.php");
require_once("class/log.php");

#of ?p= not set, use dash.
if(!isset($_GET["p"])){
    $query = explode("?",$_SERVER["REQUEST_URI"]);
    if(count($query) != 0){
        $query ="&".$query[1];
    }
    header("Location: /?p=chips".$query);
}

/**
 * Define all Pages.
 *      page:i -> is shown in nav and with nav,
 *      page:in -> define if show nav or showed in nav
 * @var $pages page[]
 */
$pages = array(
    "login" => page::in("Login","login.php",false,false),
    "404" => page::in("404","404.php",false,true),
    //"dash" => page::i("Dashboard","dash.php"),
    "chips" => page::i("Chips","chips.php","fa-key fa-fw"),
    "doorclients" => page::i("Türen","doorclient.php","fa-sign-in fa-fw"),
    "log" => page::i("Log","log.php","fa-list fa-fw"),
    "apidoku" => page::i("API Doku","apidoku.php","fa-share-alt fa-fw"),
    "phpliteadmin" => page::in("SQLite DB","phpliteadmin.php",true,false,"fa-database fa-fw"),
    "logout" => page::in("Logout","logout.php",true,false,"fa-times fa-fw"),
);

#Session starten
session_start();
#Redirect to Loginpage if not logged in
loginSession::isLoggedIn();

#Select Page
if(isset($pages[$_GET["p"]])){
    $page = $pages[$_GET["p"]];
}else{
    $page = $pages["404"];
}

#init sqlitedb
$db = new sqlitedb();

# uses $page
include("page/template.php");
