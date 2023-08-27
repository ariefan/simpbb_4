<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-jpb3-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">

    <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KECAMATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KELURAHAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_BLOK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_URUT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_JNS_OP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_BNG')->textInput() ?>

    <?= $form->field($model, 'TYPE_KONSTRUKSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TING_KOLOM_JPB3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LBR_BENT_JPB3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LUAS_MEZZANINE_JPB3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KELILING_DINDING_JPB3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DAYA_DUKUNG_LANTAI_JPB3')->textInput(['maxlength' => true]) ?>


    </div>
    
    <div class="card-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
