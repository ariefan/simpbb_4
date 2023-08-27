<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpopSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spop-search">

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

    <?php // echo $form->field($model, 'SUBJEK_PAJAK_ID') ?>

    <?php // echo $form->field($model, 'NO_FORMULIR_SPOP') ?>

    <?php // echo $form->field($model, 'JNS_TRANSAKSI_OP') ?>

    <?php // echo $form->field($model, 'KD_PROPINSI_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_DATI2_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_KECAMATAN_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_KELURAHAN_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_BLOK_BERSAMA') ?>

    <?php // echo $form->field($model, 'NO_URUT_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_JNS_OP_BERSAMA') ?>

    <?php // echo $form->field($model, 'KD_PROPINSI_ASAL') ?>

    <?php // echo $form->field($model, 'KD_DATI2_ASAL') ?>

    <?php // echo $form->field($model, 'KD_KECAMATAN_ASAL') ?>

    <?php // echo $form->field($model, 'KD_KELURAHAN_ASAL') ?>

    <?php // echo $form->field($model, 'KD_BLOK_ASAL') ?>

    <?php // echo $form->field($model, 'NO_URUT_ASAL') ?>

    <?php // echo $form->field($model, 'KD_JNS_OP_ASAL') ?>

    <?php // echo $form->field($model, 'NO_SPPT_LAMA') ?>

    <?php // echo $form->field($model, 'JALAN_OP') ?>

    <?php // echo $form->field($model, 'BLOK_KAV_NO_OP') ?>

    <?php // echo $form->field($model, 'KELURAHAN_OP') ?>

    <?php // echo $form->field($model, 'RW_OP') ?>

    <?php // echo $form->field($model, 'RT_OP') ?>

    <?php // echo $form->field($model, 'KD_STATUS_WP') ?>

    <?php // echo $form->field($model, 'LUAS_BUMI') ?>

    <?php // echo $form->field($model, 'KD_ZNT') ?>

    <?php // echo $form->field($model, 'JNS_BUMI') ?>

    <?php // echo $form->field($model, 'NILAI_SISTEM_BUMI') ?>

    <?php // echo $form->field($model, 'TGL_PENDATAAN_OP') ?>

    <?php // echo $form->field($model, 'NM_PENDATAAN_OP') ?>

    <?php // echo $form->field($model, 'NIP_PENDATA') ?>

    <?php // echo $form->field($model, 'TGL_PEMERIKSAAN_OP') ?>

    <?php // echo $form->field($model, 'NM_PEMERIKSAAN_OP') ?>

    <?php // echo $form->field($model, 'NIP_PEMERIKSA_OP') ?>

    <?php // echo $form->field($model, 'NO_PERSIL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
