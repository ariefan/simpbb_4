<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoriMutasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="histori-mutasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_pelayanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nop_sebelum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_sebelum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lt_sebelum')->textInput() ?>

    <?= $form->field($model, 'lb_sebelum')->textInput() ?>

    <?= $form->field($model, 'pbb_sebelum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nop_sesudah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_sesudah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lt_sesudah')->textInput() ?>

    <?= $form->field($model, 'lb_sesudah')->textInput() ?>

    <?= $form->field($model, 'pbb_sesudah')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
