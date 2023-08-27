<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


?>
<div class="row">
    <div class="col-sm-4">
        <?= Html::hiddenInput('kd_dati2', $kd_dati2, ['maxlength' => true, 'readonly'=> true]); ?>
        <?= Html::dropDownList('KD_KECAMATAN', null,
            ArrayHelper::map(\app\models\RefKecamatan::find()->select(["KD_KECAMATAN AS KD_KECAMATAN, CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS NM_KECAMATAN"])->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),
            ['id'=>'KD_KECAMATAN', 'class'=>'form-control']) ?>
    </div>
    <div class="col-sm-4">
        <?= DepDrop::widget([
            'name' => 'KD_KELURAHAN',
            'options' => ['id'=>'KD_KELURAHAN'],
            'pluginOptions'=>[
                'depends'=>['KD_KECAMATAN'],
                'initialize' => true,
                'url' => Url::to(['/ref-kelurahan/kelurahan']),
            ]
        ]);  ?>
    </div>
    <div class="col-sm-4">
    </div>
</div>
<iframe src="gispbb" style="border:0; width:100%; height:500px;">