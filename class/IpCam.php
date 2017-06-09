<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 09.06.2017
 * Time: 10:23
 */
class IpCam
{
    /**
     * @param $ipcameraurl
     * @return string PictureUrl
     */
    public static function getPicture($ipcameraurl){
        $img = 'pic/' . time() .  rand(1,1000). '.png';
        $camera = "";
        $i = 0;
        while (strlen($camera) == 0 && $i != 5){
            $camera = file_get_contents($ipcameraurl);
            sleep(1);
        }
        file_put_contents($img, $camera);
        return $img;
    }

    public static function getPictureRaw($ipcameraurl){
        return file_get_contents(self::getPicture($ipcameraurl));
    }
}