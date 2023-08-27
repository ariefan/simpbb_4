<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RefKecamatan;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\web\View;
use app\models\ValidasiKategori;


$this->title = "Assign NOP";
/* @var $this yii\web\View */
/* @var $model app\models\NopDusun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nop-dusun-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'KD_KECAMATAN')->dropDownList(ArrayHelper::map(RefKecamatan::find()->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),['id'=>'KD_KECAMATAN']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'KD_KELURAHAN')->widget(DepDrop::classname(), [
                 'options' => ['id'=>'KD_KELURAHAN'],
                 'pluginOptions'=>[
                     'depends'=>['KD_KECAMATAN'],
                     'placeholder' => 'Pilih Kelurahan...',
                     'url' => Url::to(['/nop-dusun/kelurahan'])
                 ]
             ]) ?>
        </div>

        <div class="col-md-4">
             <?= $form->field($model, 'KD_BLOK')->widget(DepDrop::classname(), [
                 'options' => ['id'=>'KD_BLOK'],
                 'pluginOptions'=>[
                     'depends'=>['KD_KECAMATAN','KD_KELURAHAN'],
                     'placeholder' => 'Pilih Blok...',
                     'url' => Url::to(['/nop-dusun/blok'])
                 ]
             ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="THN_MIN">Tahun Min</label>
                <input type="number" name="THN_MIN" class="form-control" value="<?= date('Y')-10 ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="THN_MAX">Tahun Max</label>
                <input type="number" name="THN_MAX" class="form-control" value="<?= date('Y') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="PBB_MIN">PBB Min</label>
                <input type="number" name="PBB_MIN" class="form-control" value="0">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="PBB_MAX">PBB Max</label>
                <input type="number" name="PBB_MAX" class="form-control" value="1000000000">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'VALIDASI_KE')->textInput(['placeholder'=>'Semua']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'IS_CETAK')->dropDownList([''=>'Semua',0 => 'Belum', 1 => 'Sudah']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'IS_VALIDATED')->dropDownList([''=>'Semua',0 => 'Belum', 1 => 'Sudah']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'KELOMPOK')->textInput(['placeholder'=>'Semua']) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'KATEGORI')->dropDownList([''=>'Semua']+ArrayHelper::map(ValidasiKategori::find()->asArray()->all(), 'kategori_id', 'kategori_nama')) ?></div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" for="cut_off">Cut-Off Tanggal</label>
                <input type="date" name="cut_off" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'JENIS')->dropdownList([
                    'PIUTANG KPP' => 'PIUTANG KPP', 
                    'PIUTANG 2013 S/D 2015 TIDAK TERCETAK' => 'PIUTANG 2013 S/D 2015 TIDAK TERCETAK'
                ],
                ['prompt'=>'Pilih Jenis']
            ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label class="control-label">STATUS PEMBAYARAN</label>
            <select class="form-control" name="status_pembayaran_sppt">
                <option value="">SEMUA</option>
                <option value="1">LUNAS</option>
                <option value="nol">BELUM LUNAS</option>
            </select>
            <div class="help-block"></div>
            </div>        
        </div>

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Export Excel Per NOP per Tahun', ['name' => 'export', 'class' => 'btn btn-success', 'value' => 'per_nop_per_tahun']) ?>
        <?= Html::submitButton('Export Excel Per NOP', ['name' => 'export', 'class' => 'btn btn-success', 'value' => 'per_nop']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
