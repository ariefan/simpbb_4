<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="agen-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label class="control-label">Kode Kecamatan</label>
        <input type="text" name="kd_kecamatan" class="form-control">
    </div>

    <div class="form-group">
        <label class="control-label">Kode Kelurahan</label>
        <input type="text" name="kd_kelurahan" class="form-control">
    </div>

    <div class="form-group">
        <label class="control-label">Tanggal Pelayanan Awal</label>
        <input type="text" name="start_date" value="<?= date('Y') ?>-01-01" class="form-control">
    </div>

    <div class="form-group">
        <label class="control-label">Tanggal Pelayanan Akhir</label>
        <input type="text" name="end_date" value="<?= date('Y') ?>-12-31" class="form-control">
    </div>

    <div class="form-group">
        <?= Html::submitButton('Lihat', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>