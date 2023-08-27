<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb7Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-jpb7-search">

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

    <?php // echo $form->field($model, 'JNS_JPB7') ?>

    <?php // echo $form->field($model, 'BINTANG_JPB7') ?>

    <?php // echo $form->field($model, 'JML_KMR_JPB7') ?>

    <?php // echo $form->field($model, 'LUAS_KMR_JPB7_DGN_AC_SENT') ?>

    <?php // echo $form->field($model, 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
