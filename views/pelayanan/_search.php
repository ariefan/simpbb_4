<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PelayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelayanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NAMA_PEMOHON') ?>

    <?= $form->field($model, 'ALAMAT_PEMOHON') ?>

    <?= $form->field($model, 'NO_PELAYANAN') ?>

    <?= $form->field($model, 'TANGGAL_PELAYANAN') ?>

    <?php // echo $form->field($model, 'KD_PROPINSI') ?>

    <?php // echo $form->field($model, 'KD_DATI2') ?>

    <?php // echo $form->field($model, 'KD_KECAMATAN') ?>

    <?php // echo $form->field($model, 'KD_KELURAHAN') ?>

    <?php // echo $form->field($model, 'KD_BLOK') ?>

    <?php // echo $form->field($model, 'NO_URUT') ?>

    <?php // echo $form->field($model, 'KD_JNS_OP') ?>

    <?php // echo $form->field($model, 'KD_JNS_PELAYANAN') ?>

    <?php // echo $form->field($model, 'TANGGAL_PERKIRAAN_SELESAI') ?>

    <?php // echo $form->field($model, 'STATUS_PELAYANAN') ?>

    <?php // echo $form->field($model, 'NIP_PETUGAS_PENERIMA') ?>

    <?php // echo $form->field($model, 'NAMA_PETUGAS_PENERIMA') ?>

    <?php // echo $form->field($model, 'NIP_AR') ?>

    <?php // echo $form->field($model, 'NAMA_AR') ?>

    <?php // echo $form->field($model, 'CATATAN') ?>

    <?php // echo $form->field($model, 'KETERANGAN') ?>

    <?php // echo $form->field($model, 'TGL_MASUK_PENILAI') ?>

    <?php // echo $form->field($model, 'NIP_MASUK_PENILAI') ?>

    <?php // echo $form->field($model, 'TGL_SELESAI') ?>

    <?php // echo $form->field($model, 'NIP_SELESAI') ?>

    <?php // echo $form->field($model, 'TGL_TERKONFIRMASI_WP') ?>

    <?php // echo $form->field($model, 'NIP_TERKONFIRMASI_WP') ?>

    <?php // echo $form->field($model, 'TTD_JABATAN_KIRI') ?>

    <?php // echo $form->field($model, 'TTD_NAMA_KIRI') ?>

    <?php // echo $form->field($model, 'TTD_NIP_KIRI') ?>

    <?php // echo $form->field($model, 'TTD_JABATAN_KANAN') ?>

    <?php // echo $form->field($model, 'TTD_NAMA_KANAN') ?>

    <?php // echo $form->field($model, 'TTD_NIP_KANAN') ?>

    <?php // echo $form->field($model, 'TGL_PENETAPAN') ?>

    <?php // echo $form->field($model, 'NIP_PENETAPAN') ?>

    <?php // echo $form->field($model, 'TGL_BERKAS_DITUNDA') ?>

    <?php // echo $form->field($model, 'NIP_BERKAS_DITUNDA') ?>

    <?php // echo $form->field($model, 'LETAK_OP') ?>

    <?php // echo $form->field($model, 'KECAMATAN') ?>

    <?php // echo $form->field($model, 'KELURAHAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
