<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class GlobalFunction extends Component
{
  public function nop_split($nop){
    $nops["KD_PROPINSI"] = substr($nop, 0, 2);
    $nops["KD_DATI2"] = substr($nop, 2, 2);
    $nops["KD_KECAMATAN"] = substr($nop, 4, 3);
    $nops["KD_KELURAHAN"] = substr($nop, 7, 3);
    $nops["KD_BLOK"] = substr($nop, 10, 3);
    $nops["NO_URUT"] = substr($nop, 13, 4);
    $nops["KD_JNS_OP"] = substr($nop, 17, 1);
    return $nops;
  }

  public function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
  }
}