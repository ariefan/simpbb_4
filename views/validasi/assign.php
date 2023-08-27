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
                <label class="control-label" for="PBB_MIN">PBB Min</label>
                <input type="number" id="PBB_MIN" class="form-control" value="0">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="PBB_MAX">PBB Max</label>
                <input type="number" id="PBB_MAX" class="form-control" value="1000000000">
            </div>
        </div>
    </div>

     <button type="button" id="tampilkan_nop" class="btn btn-primary">Lihat NOP</button>

     <hr/>


    <div class="spinner" style="display:none">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
    <div class="row" id="lihat-nop">
         
    </div>
     <hr/>

    <h3>Assign</h3>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'VALIDASI_KE')->textInput(['placeholder'=>'Tidak Usah di Update']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'IS_CETAK')->dropDownList([''=>'Tidak Usah di Update',0 => 'Belum', 1 => 'Sudah']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'IS_VALIDATED')->dropDownList([''=>'Tidak Usah di Update',0 => 'Belum', 1 => 'Sudah']) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'KELOMPOK')->textInput(['placeholder'=>'Tidak Usah di Update']) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'KATEGORI')->dropDownList([''=>'Tidak Usah di Update']+ArrayHelper::map(ValidasiKategori::find()->asArray()->all(), 'kategori_id', 'kategori_nama')) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'KETERANGAN')->textInput(['placeholder'=>'Tidak Usah di Update']) ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs("
    jQuery(document).ready(function() {
        $('#KD_KECAMATAN').trigger('change');

        function getNop(){
            $('#lihat-nop').html('');
            $('.spinner').show()
            $.get('".Url::toRoute('validasi/nop')."',{KD_KECAMATAN:$('#KD_KECAMATAN').val(),KD_KELURAHAN:$('#KD_KELURAHAN').val(),KD_BLOK:$('#KD_BLOK').val(),PBB_MIN:$('#PBB_MIN').val(),PBB_MAX:$('#PBB_MAX').val()})
            .done(function(data){
              $('.spinner').hide()
              $('#lihat-nop').html(data)
              $(\"#checkAll\").click(function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });
            });
          }

        $('#tampilkan_nop').click(function(){
            getNop();
        })

    })

",View::POS_END);

?>