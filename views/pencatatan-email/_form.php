<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\PencatatanEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pencatatan-email-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label for="nop" class="control-label">NOP</label>
        <?php 
        echo \yii\widgets\MaskedInput::widget([
            'name' => 'nop',
            'id' => 'nop',
            'mask' => '99.99.999.999.999.9999.9',
        ]);
        ?>
    </div>
    <div class="spinner" style="display:none">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
    <?= $form->field($model, 'NM_WP_SPPT')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_PENERIMA')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'NIK')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KEPEMILIKAN')->dropDownList([ 'Pemilik' => 'Pemilik', 'Anak' => 'Anak', 'Cucu' => 'Cucu', 'Lainnya' => 'Lainnya', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'KEPEMILIKAN_LAINNYA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$this->registerJs("
  jQuery(document).ready(function() {
      $('#nop').focusout(function(){
          getNOP();
      });

      function getNOP(){
        var nop = $('#nop').val();
        $('.spinner').show();

        $.get('".\yii\helpers\Url::toRoute('pencatatan-email/get-nop')."',{nop:nop})
        .done(function(data){
          $('.spinner').hide();
          $('#pencatatanemail-nm_wp_sppt').val(data);
          $('#pencatatanemail-nama_penerima').val(data);
        });
      }
      
  });
",View::POS_END)

?>
