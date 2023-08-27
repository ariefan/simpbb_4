<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RefKecamatan;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;

?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
		    <label class="control-label" for="tahun">Tahun Awal</label>
		    <input type="number" required="" id="tahun" name="tahun" class="form-control" value="<?= date('Y')-20 ?>">
		</div>
	
	</div>
	<div class="col-md-6">
		<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
			<label class="control-label" for="tahun">Tahun Akhir</label>
		    <input type="number" required="" id="tahun" name="tahun" class="form-control" value="<?= date('Y') ?>">
		</div>	
	</div>	
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
		    <label class="control-label" for="tanggal_realisasi">Tanggal Awal</label>
		    <input type="date" required="" id="tanggal_realisasi" name="tanggal_realisasi" class="form-control" value="<?= date('Y-m-d') ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group field-nopdusun-thn_pajak_sppt required has-success">
		    <label class="control-label" for="tanggal_realisasi">Tanggal Akhir</label>
		    <input type="date" required="" id="tanggal_realisasi" name="tanggal_realisasi" class="form-control" value="<?= date('Y-m-d') ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<?= $form->field($model, 'KD_KECAMATAN')->dropDownList(["-"=>"SEMUA"]+ArrayHelper::map(RefKecamatan::find()->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),['id'=>'KD_KECAMATAN']) ?>
	</div>	
	<div class="col-md-6">
	    <?= $form->field($model, 'KD_KELURAHAN')->widget(DepDrop::classname(), [
	         'options' => ['id'=>'KD_KELURAHAN'],
	         'pluginOptions'=>[
	             'depends'=>['KD_KECAMATAN'],
	             'placeholder' => 'Pilih Kelurahan...',
	             'url' => Url::to(['/nop-dusun/kelurahan'])
	         ]
	     ]) ?>
     </div>
</div>

	<div class="form-group">
		<input type="submit" value="Cetak" class="btn btn-success" name="tombol">
		<input type="submit" value="Lihat" class="btn btn-primary" name="tombol">
    </div>

    <?php ActiveForm::end(); ?>
</div>
