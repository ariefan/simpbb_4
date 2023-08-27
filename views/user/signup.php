<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
 
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'role')->dropDownList(
                        [
                            10=>'Admin',
                            20=>'Petugas Input',
                            21=>'Pencatat Email',
                            30=>'Petugas Pelayanan',
                            35=>'Printout Tunggakan',
                            40=>'Petugas SPPT'
                        ],           
                        ['prompt'=>'']    
                    );
                ?>

                <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nomor_hp')->textInput(['maxlength' => true]) ?>

                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                <?php } ?>
                
            <?php ActiveForm::end(); ?>
 
</div>