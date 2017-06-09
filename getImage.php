<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 09.06.2017
 * Time: 10:40
 */
include("class/IpCam.php");

header("Content-type: image/png");
echo IpCam::getPictureRaw($_GET["svr"]);