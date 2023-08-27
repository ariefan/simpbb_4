<?php
use app\models\RefJnsPelayanan;
use app\models\StatusPelayanan;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

$this->title = "Laporan Pelayanan";
?>

<div class="pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
		      <label class="control-label">Tanggal Awal</label>
		      <div>
		        <input type="date" class="form-control" placeholder="Tanggal Pelayanan Awal" name="tgl_awal">
		      </div>
		  	</div> 
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
		      <label class="control-label">Tanggal Akhir</label>
		      <div>
		        <input type="date" class="form-control" placeholder="Tanggal Pelayanan Akhir" name="tgl_akhir">
		      </div>
		  	</div>	
    	</div>
    </div>
  	
  	
  	<div class="form-group">
      <label class="control-label">Jenis Pelayanan</label>
      <?= Select2::widget([
			    'name' => 'jenis_pelayanan',
			    'data' => ArrayHelper::map(RefJnsPelayanan::find()->asArray()->all(), 'KD_JNS_PELAYANAN', 'NM_JENIS_PELAYANAN'),
			    'options' => [
			        'placeholder' => 'Pilih Jenis Pelayanan ...',
			    ],
			]) ?>
  		
  	</div>

  	<div class="form-group">
      <label class="control-label">Status Pelayanan</label>
      <?= Select2::widget([
			    'name' => 'status_pelayanan',
			    'data' => ArrayHelper::map(StatusPelayanan::find()->orderBy('urutan')->asArray()->all(), 'id', 'nama'),
			    'options' => [
			        'placeholder' => 'Pilih Status Pelayanan ...',
			    ],
			]) ?>
  		
  	</div>

  	<div class="form-group">
        <?= Html::submitButton('Export Excel', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>