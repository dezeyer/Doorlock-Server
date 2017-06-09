<?php
error_reporting(-1);
ini_set("display_errors","true");
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 14:20
 *

 */


#require
//require_once("class/login.php");
//require_once("class/page.php");
//require_once("class/msg.php");
require_once("class/sqlitedb.php");
require_once("class/IpCam.php");

require_once("class/chip.php");
require_once("class/doorclient.php");
require_once("class/log.php");

$db = new sqlitedb();
$dc = "doorclient";
$ch = "check";
$lo = "login";
$pi = "pin";



if(!isset($_GET[$dc])){
    rstd(5,"var $dc missing");
}
if(!isset($_GET[$ch]) && !isset($_GET[$lo]) || isset($_GET[$ch]) && trim($_GET[$ch]) == "" || isset($_GET[$lo]) && trim($_GET[$lo]) == ""){
    rstd(5,"var $ch or $lo missing");
}
if(isset($_GET[$lo]) && !isset($_GET[$pi])){
    rstd(5,"var $pi missing");
}
if(($rdc = $db->getDoorClientByID($_GET[$dc])) == null){
    rstd(5,"$dc does not exist");
}
$s = $db->getChipStatusByChipID($_GET[$ch]);
$r = $db->getChipByChipID($_GET[$ch]);
if(isset($_GET[$dc]) && $_GET[$ch]){
    if($s == 0){
        rstd(0,"Chip nicht vorhanden.*",$r,$rdc);
    }elseif($s == 1){
        rstd(1,"Chip nicht vorhanden.",$r,$rdc);
    }elseif($s == 2){
        rstd(2,"Hallo ".$r->getName().", Pin eingeben:",$r,$rdc);
    }
}
if(isset($_GET[$dc]) && isset($_GET[$lo]) && isset($_GET[$pi])){
    if($_GET[$pi] == $r->getPin()){
        rstd(3,"Zugriff: Tuer oeffnet",$r,$rdc);
    }else{
        rstd(4,"Kein Zugriff",$r,$rdc);
    }
}

/**
 * @param $code
 * @param $msg
 * @param chip $chip
 * @param doorclient $doorclient
 */
function rstd($code,$msg,$chip = null,$doorclient = null)
{
    global $db;
    echo $code . "\n" . $msg;
    $img = "";
    if ($doorclient != null && $doorclient->getIpcamera() != "") {
        $img = IpCam::getPicture($doorclient->getIpcamera());
    }
    if($chip != null){
        $db->addLog($chip->getDbid(),$doorclient->getDbid(),$code,$img);
    }
    exit;
}
