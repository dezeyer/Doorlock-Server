<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 22:24
 */
class msg
{
    public static function alert($msg,$class,$dismissable = false){
        $return =  "
        <div class=\"alert $class alert-dismissable\">";
        if($dismissable)
            $return .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        $return .= $msg."
        </div>
        ";
        return $return;
    }
    public static function alert_success($msg,$dismissable = false){
        return self::alert($msg,"alert-success",$dismissable);
    }
    public static function alert_success_link($msg,$href,$hrefmsg,$dismissable = false){
        return self::alert_success($msg."<a href=\"$href\" class=\"alert-link\">$hrefmsg</a>",$dismissable);
    }

    public static function alert_danger($msg,$dismissable = false){
        return self::alert($msg,"alert-danger",$dismissable);
    }
    public static function alert_danger_link($msg,$href,$hrefmsg,$dismissable = false){
        return self::alert_success($msg."<a href=\"$href\" class=\"alert-link\">$hrefmsg</a>",$dismissable);
    }
}