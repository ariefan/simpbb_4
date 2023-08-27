<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatOpBangunanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-op-bangunan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KD_PROPINSI') ?>

    <?= $form->field($model, 'KD_DATI2') ?>

    <?= $form->field($model, 'KD_KECAMATAN') ?>

    <?= $form->field($model, 'KD_KELURAHAN') ?>

    <?= $form->field($model, 'KD_BLOK') ?>

    <?php // echo $form->field($model, 'NO_URUT') ?>

    <?php // echo $form->field($model, 'KD_JNS_OP') ?>

    <?php // echo $form->field($model, 'NO_BNG') ?>

    <?php // echo $form->field($model, 'KD_JPB') ?>

    <?php // echo $form->field($model, 'NO_FORMULIR_LSPOP') ?>

    <?php // echo $form->field($model, 'THN_DIBANGUN_BNG') ?>

    <?php // echo $form->field($model, 'THN_RENOVASI_BNG') ?>

    <?php // echo $form->field($model, 'LUAS_BNG') ?>

    <?php // echo $form->field($model, 'JML_LANTAI_BNG') ?>

    <?php // echo $form->field($model, 'KONDISI_BNG') ?>

    <?php // echo $form->field($model, 'JNS_KONSTRUKSI_BNG') ?>

    <?php // echo $form->field($model, 'JNS_ATAP_BNG') ?>

    <?php // echo $form->field($model, 'KD_DINDING') ?>

    <?php // echo $form->field($model, 'KD_LANTAI') ?>

    <?php // echo $form->field($model, 'KD_LANGIT_LANGIT') ?>

    <?php // echo $form->field($model, 'NILAI_SISTEM_BNG') ?>

    <?php // echo $form->field($model, 'JNS_TRANSAKSI_BNG') ?>

    <?php // echo $form->field($model, 'TGL_PENDATAAN_BNG') ?>

    <?php // echo $form->field($model, 'NIP_PENDATA_BNG') ?>

    <?php // echo $form->field($model, 'TGL_PEMERIKSAAN_BNG') ?>

    <?php // echo $form->field($model, 'NIP_PEMERIKSA_BNG') ?>

    <?php // echo $form->field($model, 'TGL_PEREKAMAN_BNG') ?>

    <?php // echo $form->field($model, 'NIP_PEREKAM_BNG') ?>

    <?php // echo $form->field($model, 'TGL_KUNJUNGAN_KEMBALI') ?>

    <?php // echo $form->field($model, 'NILAI_INDIVIDU') ?>

    <?php // echo $form->field($model, 'AKTIF') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
