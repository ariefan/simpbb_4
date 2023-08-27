<?php

namespace app\controllers;

class VController extends \yii\web\Controller
{
    public function actionValidate($token)
    {
    	$d = \app\models\PencatatanEmail::updateAll(['IS_VERIFIED'=>1],['token'=>$token]);
    	echo 'Terima Kasih Telah Melakukan Validasi Email :)';
    	exit;
    }

}
