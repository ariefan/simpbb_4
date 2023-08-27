<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\SpptE */

$this->title = 'Proses';
$this->params['breadcrumbs'][] = ['label' => 'Sppt E', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$year = [];
for($i=date('Y');$i>date('Y')-10;$i--){
    $year[$i] = $i;
}

?>
<div class="sppt-e-create">
    <?php $form = ActiveForm::begin(['id'=>'form-sppt']); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'KD_KECAMATAN')->dropDownList(ArrayHelper::map(\app\models\RefKecamatan::find()->select(["KD_KECAMATAN AS KD_KECAMATAN, CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS NM_KECAMATAN"])->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),['id'=>'KD_KECAMATAN']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'KD_KELURAHAN')->widget(DepDrop::classname(), [
                'options' => ['id'=>'KD_KELURAHAN'],
                'pluginOptions'=>[
                    'depends'=>['KD_KECAMATAN'],
                    'placeholder' => 'Pilih Kelurahan...',
                    'initialize' => $model->isNewRecord ? false : true,
                    'url' => Url::to(['/ref-kelurahan/kelurahan']),
                    'params'=> ['KD_KELURAHAN_SELECTED'], 
                ]
            ]) ?>
        </div>
    </div>
    
    <?= Html::hiddenInput('KD_KELURAHAN_SELECTED', $model->isNewRecord ? '' : $model->KD_KELURAHAN, ['id'=>'KD_KELURAHAN_SELECTED']); ?>

    <div class="row">
        <div class="col-md-3">
            <label>Tahun</label>
            <?= Html::dropDownList('tahun',null,$year,['class'=>'form-control','id'=>'tahun']) ?>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>PBB Start</label>
                <input type="number" value="0" name="pbb_start" id="pbb_start" class="form-control">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>PBB End</label>
                <input type="number" value="2000000" name="pbb_end" id="pbb_end" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Auto Reload per</label>
                <input class="form-control" type="number" value="10" name="reload_per">
            </div>
        </div>
        
    </div>
    <br/>
    <button id="refresh" type="button" class="btn btn-default">Load Statistik</button>
    <br/>

    <div class="spinner" id="spinner-1" style="display:none">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>

    <br/>
    
    <div id="stat"></div>
    <br/>

    <div id="sukses"></div>
    <?= Html::submitButton('Buat PDF e-SPPT', ['class' => 'btn btn-danger','value'=>'kalibrasi','name'=>'kalibrasi']) ?>

    <br/>
    <div class="spinner" id="spinner-2" style="display:none">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>

    <br/>
    <div id="hasil-proses">
        <div class="progress-group">
            <span class="progress-text">Proses Pembuatan e-SpPT</span>
            <span class="progress-number" id="progress-sppt"></span>

            <div class="progress sm">
              <div class="progress-bar progress-bar-green" style="width: 80%"></div>
            </div>
        </div>

    </div>
    

    <?php ActiveForm::end(); ?>
</div>


<?php
$this->registerJs("
  jQuery(document).ready(function() {
      $('#hasil-proses').hide();
      $('#refresh').click(function(){
          getStatSppt();
      });

      $('#form-sppt').on('submit', function (e) {
          e.preventDefault();

          if($(':input[type=\"submit\"]').prop('disabled')){
            return;
          }
          
          $(':input[type=\"submit\"]').prop('disabled', true);
          $('#spinner-2').show();

          $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: $('#form-sppt').serialize(),
            success: function (data) {
                if(data=='No'){
                    alert('Tidak ada Data');
                    $('#spinner-2').hide();
                    $(':input[type=\"submit\"]').prop('disabled', false);
                    return;
                }

                var d = data.split('|');
                var terbuat = parseFloat(d[0]);
                var total = parseFloat(d[1]);
                
                $('#spinner-2').hide();
                $('.progress-number').html('<b>'+d[0]+'</b>/'+d[1]);
                var percent = d[0]/d[1]*100;
                $('.progress-bar').attr('style','width: '+percent+'%');
                $('#hasil-proses').show();
                if(percent<100.0){
                    console.log(percent);
                    $(':input[type=\"submit\"]').prop('disabled', false);
                    $('#form-sppt').submit();
                }
            }
          });

      });


      function getStatSppt(){
        $('#stat').html('');
        $('#spinner-1').show();

        var KD_KECAMATAN = $('#KD_KECAMATAN').val();
        var KD_KELURAHAN = $('#KD_KELURAHAN').val();
        var tahun = $('#tahun').val();
        var pbb_start = $('#pbb_start').val();
        var pbb_end = $('#pbb_end').val();

        $.get('".Url::toRoute('sppt-e/stat')."',{KD_KECAMATAN:KD_KECAMATAN, KD_KELURAHAN:KD_KELURAHAN, tahun:tahun, pbb_start:pbb_start, pbb_end:pbb_end})
                .done(function(data){
                  $('#spinner-1').hide();
                  $('#stat').html(data)
                 
                });



      }
      
  });
",View::POS_END);

?>
