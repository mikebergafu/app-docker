<?php

namespace App\Helpers;

class JSUtils
{

    public static function jsAlert($key, $data){
        return "<script>alert('".$key.":".json_encode($data)."');</script>";
    }

    public static function jsConsole($key, $data){
        return "<script>console.log('".$key.":".json_encode($data)."');</script>";
    }

    public static function jsPrompt($question){
        $y=0;
        $p = "<script>prompt('".$question.",".$y."');</script>";
        $y = strip_tags($p);
        echo $p;
        if($y > 2){
            return self::jsAlert('res', 'more than '.  $y);
        }
        return  self::jsAlert('res', 'Under 2');

    }

    public static function jsConfirm($question){
        return "<script>Confirm('".$question."');</script>";
    }

}
