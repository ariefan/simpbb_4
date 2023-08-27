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

$this->title = 'Verifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Sppt E', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$year = [];
for($i=date('Y');$i>date('Y')-10;$i--){
    $year[$i] = $i;
}

?>
<div class="sppt-e-create">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label></label>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
    <br/>
    <?= Html::submitButton('Unduh', ['class' => 'btn btn-danger','value'=>'kalibrasi','name'=>'kalibrasi']) ?>
    <?= Html::submitButton('Verifikasi', ['class' => 'btn btn-success','value'=>'unduh','name'=>'unduh']) ?>
    <?php ActiveForm::end(); ?>
</div>


<?php
$this->registerJs("
  jQuery(document).ready(function() {
      $('#refresh').click(function(){
          getStatSppt();
      });


      function getStatSppt(){
        $('#stat').html('');
        $('.spinner').show();

        var KD_KECAMATAN = $('#KD_KECAMATAN').val();
        var KD_KELURAHAN = $('#KD_KELURAHAN').val();
        var tahun = $('#tahun').val();
        var pbb_start = $('#pbb_start').val();
        var pbb_end = $('#pbb_end').val();

        $.get('".Url::toRoute('sppt-e/stat')."',{KD_KECAMATAN:KD_KECAMATAN, KD_KELURAHAN:KD_KELURAHAN, tahun:tahun, pbb_start:pbb_start, pbb_end:pbb_end})
        .done(function(data){
          $('.spinner').hide();
          $('#stat').html(data)
         
        });
      }
      
  });
",View::POS_END)

?>
