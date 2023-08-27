<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$tahun = [];
for($i=date('Y');$i>date('Y')-5;$i--){
    $tahun[$i] = $i;
}

/* @var $this yii\web\View */
/* @var $model app\models\SpptE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sppt-e-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label for="nop" class="control-label">NOP</label>
        <?php 
        echo \yii\widgets\MaskedInput::widget([
            'name' => 'nop',
            'mask' => '99.99.999.999.999.9999.9',
        ]);
        ?>
      </div>

    <?= $form->field($model, 'THN_PAJAK_SPPT')->dropDownList(['items' => $tahun]) ?>

    <?= $form->field($model, 'NM_WP_SPPT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGL_PEMBAYARAN_TERAKHIR')->textInput(['type'=>'date']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<br/>