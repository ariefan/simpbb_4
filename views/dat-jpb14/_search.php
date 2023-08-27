<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb14Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-jpb14-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KD_PROPINSI') ?>

    <?= $form->field($model, 'KD_DATI2') ?>

    <?= $form->field($model, 'KD_KECAMATAN') ?>

    <?= $form->field($model, 'KD_KELURAHAN') ?>

    <?= $form->field($model, 'KD_BLOK') ?>

    <?php // echo $form->field($model, 'NO_URUT') ?>

    <?php // echo $form->field($model, 'KD_JNS_OP') ?>

    <?php // echo $form->field($model, 'NO_BNG') ?>

    <?php // echo $form->field($model, 'LUAS_KANOPI_JPB14') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
