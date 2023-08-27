<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;
use app\models\Konfigurasi;

$Konfigurasi = new Konfigurasi();

$this->title = 'Salinan SPPT';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
  <?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
  	<label for="nop" class="control-label">NOP</label>
  	<?php 
    echo MaskedInput::widget([
        'name' => 'nop',
        'mask' => '99.99.999.999.999.9999.9',
    ]);
    ?>
  </div>
  <div class="form-group">
      <label for="input5" class="control-label">Tahun</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun" value="<?= date('Y') ?>">
      </div>
  </div>
  <div class="form-group">
      <label for="ttd" class="control-label">TTD</label>
      <select class="form-control" id="ttd" name="ttd">
        <?php foreach($Konfigurasi->ttd_salinan as $key=>$value){
          echo "<option value=$key>".$value['NAMA']."</option>";
        } ?>
      </select>
  </div>
  
  <div class="form-group">
        <?= Html::submitButton('Cetak Salinan', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
