<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefDati2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-dati2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_DATI2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
