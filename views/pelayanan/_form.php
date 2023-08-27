<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\RefJnsPelayanan;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Pelayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'NO_PELAYANAN')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'TANGGAL_PELAYANAN')->textInput(['type' => 'date']) ?>

            <?=
                $form->field($model, 'KD_JNS_PELAYANAN')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(RefJnsPelayanan::find()->asArray()->all(), 'KD_JNS_PELAYANAN', 'NM_JENIS_PELAYANAN'),
                    'options' => ['placeholder' => 'Pilih Pelayanan ...'],
                ])
            ?>


            <div class="form-group">
                <label>Lampiran Dokumen</label>
                <table class="table">
                    <tr>
                        <th>Check</th>
                        <th>Dokumen</th>
                    </tr>
                    <?php foreach ($dok_pelayanan as $v) : ?>
                        <tr>
                            <td><input type="checkbox" name="pelayanan_dokumen[<?= $v['id'] ?>]" value="1"></td>
                            <td><?= $v['id'] ?>. <?= $v['name'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
        <div class="col-md-6">

            <?= $form->field($model, 'NAMA_PEMOHON')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ALAMAT_PEMOHON')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <label for="nop" class="control-label">NOP</label>
                <?php
                echo MaskedInput::widget([
                    'name' => 'nop',
                    'mask' => '99.99.999.999.999.9999.9',
                ]);
                ?>
            </div>

            <?= $form->field($model, 'KETERANGAN')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'LETAK_OP')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'KECAMATAN')->dropDownList(ArrayHelper::map(\app\models\RefKecamatan::find()->asArray()->all(), 'KD_KECAMATAN', 'NM_KECAMATAN'), ['id' => 'KD_KECAMATAN']) ?>

            <?= $form->field($model, 'KELURAHAN')->widget(DepDrop::classname(), [
                'options' => ['id' => 'KD_KELURAHAN'],
                'pluginOptions' => [
                    'depends' => ['KD_KECAMATAN'],
                    'placeholder' => 'Pilih Kelurahan...',
                    'url' => Url::to(['/nop-dusun/kelurahan'])
                ]
            ]) ?>

            <?= $form->field($model, 'CATATAN')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'TANGGAL_PERKIRAAN_SELESAI')->textInput(['type' => 'date']) ?>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Buat' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>








    <?php ActiveForm::end(); ?>

</div>