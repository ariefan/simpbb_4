<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Spop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spop-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">

                <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                <?= $form->field($model, 'KD_KECAMATAN')->dropDownList(ArrayHelper::map(\app\models\RefKecamatan::find()->select(["KD_KECAMATAN AS KD_KECAMATAN, CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS NM_KECAMATAN"])->asArray()->all(), 'KD_KECAMATAN', 'NM_KECAMATAN'), ['id' => 'KD_KECAMATAN']) ?>
                <?= Html::hiddenInput('KD_KELURAHAN_SELECTED', $model->isNewRecord ? '' : $model->KD_KELURAHAN, ['id' => 'KD_KELURAHAN_SELECTED']); ?>
                <?= $form->field($model, 'KD_KELURAHAN')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'KD_KELURAHAN'],
                    'pluginOptions' => [
                        'depends' => ['KD_KECAMATAN'],
                        'placeholder' => 'Pilih Kelurahan...',
                        'initialize' => $model->isNewRecord ? false : true,
                        'url' => Url::to(['/ref-kelurahan/kelurahan']),
                        'params' => ['KD_KELURAHAN_SELECTED'],
                    ]
                ]) ?>
                <?= Html::hiddenInput('KD_BLOK_SELECTED', $model->isNewRecord ? '' : $model->KD_BLOK, ['id' => 'KD_BLOK_SELECTED']); ?>
                <?= $form->field($model, 'KD_BLOK')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'KD_BLOK'],
                    'pluginOptions' => [
                        'depends' => ['KD_KELURAHAN'],
                        'placeholder' => 'Pilih Blok...',
                        'initialize' => $model->isNewRecord ? false : true,
                        'url' => Url::to(['/ref-kelurahan/blok']),
                        'params' => ['KD_BLOK_SELECTED', 'KD_KECAMATAN'],
                    ]
                ]) ?>
                <?= $form->field($model, 'NO_URUT')->textInput(['maxlength' => true, 'id' => 'NO_URUT']) ?>
                <?= $form->field($model, 'KD_JNS_OP')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'JNS_TRANSAKSI_OP')->dropDownList(['1' => 'Perekaman Data', '2' => 'Pemutakhiran Data', '3' => 'Penghapusan Data']); ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'NOP_BERSAMA')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'NO_FORMULIR_SPOP')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'NOP_ASAL')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'NO_SPPT_LAMA')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Data Letak Objek Pajak</div>
                    <div class="card-body">
                        <?= $form->field($model, 'JALAN_OP')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'BLOK_KAV_NO_OP')->textInput(['maxlength' => true]) ?>
                        <!-- <?= $form->field($model, 'KELURAHAN_OP')->textInput(['maxlength' => true]) ?> -->
                        <?= $form->field($model, 'RW_OP')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'RT_OP')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'KD_STATUS_WP')->dropDownList([
                            '1' => '1. PEMILIK',
                            '2' => '2. PENYEWA',
                            '3' => '3. PENGELOLA',
                            '4' => '4. PEMAKAI',
                            '5' => '5. SENGKETA',
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Data Subjek Pajak</div>
                    <div class="card-body">
                        <?= $form->field($model, 'SUBJEK_PAJAK_ID')->textInput(['maxlength' => true, 'id' => 'SUBJEK_PAJAK_ID']) ?>
                        <?= $form->field($model_wp, 'NM_WP')->textInput(['maxlength' => true, 'id' => 'NM_WP']) ?>
                        <?= $form->field($model_wp, 'JALAN_WP')->textInput(['maxlength' => true, 'id' => 'JALAN_WP']) ?>
                        <?= $form->field($model_wp, 'BLOK_KAV_NO_WP')->textInput(['maxlength' => true, 'id' => 'BLOK_KAV_NO_WP']) ?>
                        <?= $form->field($model_wp, 'RW_WP')->textInput(['maxlength' => true, 'id' => 'RW_WP']) ?>
                        <?= $form->field($model_wp, 'RT_WP')->textInput(['maxlength' => true, 'id' => 'RT_WP']) ?>
                        <?= $form->field($model_wp, 'KELURAHAN_WP')->textInput(['maxlength' => true, 'id' => 'KELURAHAN_WP']) ?>
                        <?= $form->field($model_wp, 'KOTA_WP')->textInput(['maxlength' => true, 'id' => 'KOTA_WP']) ?>
                        <?= $form->field($model_wp, 'KD_POS_WP')->textInput(['maxlength' => true, 'id' => 'KD_POS_WP']) ?>
                        <?= $form->field($model_wp, 'TELP_WP')->textInput(['maxlength' => true, 'id' => 'TELP_WP']) ?>
                        <?= $form->field($model_wp, 'NPWP')->textInput(['maxlength' => true, 'id' => 'NPWP']) ?>
                        <?= $form->field($model_wp, 'STATUS_PEKERJAAN_WP')->dropDownList([
                            '1' => '1. PNS',
                            '2' => '2. ABRI',
                            '3' => '3. Pensiunan',
                            '4' => '4. Badan',
                            '5' => '5. Lainnya',
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Data Tanah</div>
                    <div class="card-body">
                        <?= $form->field($model, 'LUAS_BUMI')->textInput(['type' => 'number']) ?>
                        <?= $form->field($model, 'KD_ZNT')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'JNS_BUMI')->dropDownList([
                            '1' => 'Tanah + Bangunan',
                            '2' => 'Kavling Siap Bangun',
                            '3' => 'Tanah Kosong',
                            '4' => 'Fasilitas umum',
                        ]); ?>
                        <?= $form->field($model, 'NILAI_SISTEM_BUMI')->textInput(['type' => 'number']) ?>
                        <div id="kelas">
                            KELAS: <?= $kelas['KELAS_BUMI'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NJOP: <?= $kelas['NJOP_BUMI'] ?>
                        </div>
                        <?= $form->field($model, 'TGL_PENDATAAN_OP')->textInput(['type' => 'date', 'readonly' => true]) ?>
                        <!-- <?= $form->field($model, 'NM_PENDATAAN_OP')->textInput(['maxlength' => true]) ?> -->
                        <?= $form->field($model, 'NIP_PENDATA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'TGL_PEMERIKSAAN_OP')->textInput(['type' => 'date']) ?>
                        <!-- <?= $form->field($model, 'NM_PEMERIKSAAN_OP')->textInput(['maxlength' => true]) ?> -->
                        <?= $form->field($model, 'NIP_PEMERIKSA_OP')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'NO_PERSIL')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <!-- <?= var_dump(Yii::$app->function->nop_split('517101000100100010')); ?> -->
            </div>
        </div>
    </div>

    <div class="card-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>



<?php
$url = Url::toRoute(['dat-subjek-pajak/get']);
$url2 = Url::toRoute(['ref-kelurahan/maxurut']);
$script = <<< JS
function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

$(document).ready(function(){
  var action = "$action";
  var url = "$url";
  $("#SUBJEK_PAJAK_ID").keyup(function(event){ 
      if($('#SUBJEK_PAJAK_ID').val().length > 2){
        $.get(url, {id: $("#SUBJEK_PAJAK_ID").val()}).done(function(data) {	
          $("#NM_WP").val(data.NM_WP);
          $("#JALAN_WP").val(data.JALAN_WP);
          $("#BLOK_KAV_NO_WP").val(BLOK_KAV_NO_WP.NM_WP);
          $("#RW_WP").val(data.RW_WP);
          $("#RT_WP").val(data.RT_WP);
          $("#KELURAHAN_WP").val(data.KELURAHAN_WP);
          $("#KOTA_WP").val(data.KOTA_WP);
          $("#KD_POS_WP").val(data.KD_POS_WP);
          $("#TELP_WP").val(data.TELP_WP);
          $("#STATUS_PEKERJAAN_WP").val(data.STATUS_PEKERJAAN_WP);
        });
      }
  }); 
  
  var url2 = "$url2";
  $('#KD_BLOK').on('change', function() {
    $.get(url2, {KD_KECAMATAN: $("#KD_KECAMATAN").val(), KD_KELURAHAN: $("#KD_KELURAHAN").val(), KD_BLOK: this.value}).done(function(data) {	
        $("#NO_URUT").val(pad(data, 4));
    });
  });
});
JS;
$this->registerJs($script);
?>