<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefKelurahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kelurahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KECAMATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KELURAHAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_SEKTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_KELURAHAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_KELURAHAN')->textInput() ?>

    <?= $form->field($model, 'KD_POS_KELURAHAN')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
