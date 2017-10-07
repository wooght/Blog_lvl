<?php
//wooght扩展
namespace App\Wooght;
class W{
  pubilc static function alert($str){
    return self::script_l()."alert('".$str."');".selef::script_r();
  }
  public static function script_l();{
    return "<script type='text/javascript'>";
  }
  public static function script_r();{
    return "</script>";
  }
}
