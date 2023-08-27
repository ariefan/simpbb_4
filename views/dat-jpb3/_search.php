<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb3Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-jpb3-search">

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

    <?php // echo $form->field($model, 'TYPE_KONSTRUKSI') ?>

    <?php // echo $form->field($model, 'TING_KOLOM_JPB3') ?>

    <?php // echo $form->field($model, 'LBR_BENT_JPB3') ?>

    <?php // echo $form->field($model, 'LUAS_MEZZANINE_JPB3') ?>

    <?php // echo $form->field($model, 'KELILING_DINDING_JPB3') ?>

    <?php // echo $form->field($model, 'DAYA_DUKUNG_LANTAI_JPB3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
