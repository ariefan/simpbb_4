<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatSubjekPajak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-subjek-pajak-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">

    <?= $form->field($model, 'SUBJEK_PAJAK_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JALAN_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BLOK_KAV_NO_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RW_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RT_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KELURAHAN_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KOTA_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_POS_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELP_WP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NPWP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS_PEKERJAAN_WP')->textInput(['maxlength' => true]) ?>


    </div>
    
    <div class="card-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
