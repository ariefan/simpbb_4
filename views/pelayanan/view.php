<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pelayanan */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Pelayanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pelayanan-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'ID')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NAMA_PEMOHON')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'ALAMAT_PEMOHON')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_PELAYANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TANGGAL_PELAYANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KECAMATAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KELURAHAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_BLOK')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                        <?= $form->field($model, 'NO_URUT')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_JNS_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_JNS_PELAYANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TANGGAL_PERKIRAAN_SELESAI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'STATUS_PELAYANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_PETUGAS_PENERIMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NAMA_PETUGAS_PENERIMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_AR')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NAMA_AR')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'CATATAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_MASUK_PENILAI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_MASUK_PENILAI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_SELESAI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_SELESAI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_TERKONFIRMASI_WP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_TERKONFIRMASI_WP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TTD_JABATAN_KIRI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TTD_NAMA_KIRI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TTD_NIP_KIRI')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                        <?= $form->field($model, 'TTD_JABATAN_KANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TTD_NAMA_KANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TTD_NIP_KANAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_PENETAPAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_PENETAPAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_BERKAS_DITUNDA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_BERKAS_DITUNDA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'LETAK_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KECAMATAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KELURAHAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div>
    <br />
    <div class="card-footer">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <?php ActiveForm::end(); ?>
</div>