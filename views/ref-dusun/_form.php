<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefDusun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-dusun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KECAMATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_KELURAHAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KD_DUSUN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NM_DUSUN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JABATAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
