<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatSubjekPajakSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-subjek-pajak-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SUBJEK_PAJAK_ID') ?>

    <?= $form->field($model, 'NM_WP') ?>

    <?= $form->field($model, 'JALAN_WP') ?>

    <?= $form->field($model, 'BLOK_KAV_NO_WP') ?>

    <?= $form->field($model, 'RW_WP') ?>

    <?php // echo $form->field($model, 'RT_WP') ?>

    <?php // echo $form->field($model, 'KELURAHAN_WP') ?>

    <?php // echo $form->field($model, 'KOTA_WP') ?>

    <?php // echo $form->field($model, 'KD_POS_WP') ?>

    <?php // echo $form->field($model, 'TELP_WP') ?>

    <?php // echo $form->field($model, 'NPWP') ?>

    <?php // echo $form->field($model, 'STATUS_PEKERJAAN_WP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
