<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;


$this->title = 'Sppt Khusus';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
  <?php $form = ActiveForm::begin(); 

  ?>
  <?php if(Yii::$app->session->getFlash('error')):?>
      <div class="alert alert-danger" role="alert">
          <?php print_r(Yii::$app->session->getFlash('error')); ?>
      </div>
  <?php endif; ?>	
	<div class="form-group">
  	<label for="nop" class="control-label">NOP</label>
  	<?php 
    echo MaskedInput::widget([
        'name' => 'nop',
        'mask' => '99.99.999.999.999.9999.9',
        'value' => $nop
    ]);
    ?>
  </div>
  <div class="form-group">
      <label for="input5" class="control-label">Tahun Awal</label>
      <div>
        <input type="number" class="form-control" id="tahun_awal" placeholder="Tahun Pajak" name="tahun_awal" value="2003">
      </div>
  </div>  
  <div class="form-group">
      <label for="input5" class="control-label">Tahun Akhir</label>
      <div>
        <input type="number" class="form-control" id="tahun_akhir" placeholder="Tahun Pajak" name="tahun_akhir" value="<?= date('Y') ?>">
      </div>
  </div>  
  <div class="form-group">
      <label for="input5" class="control-label">Cut Off Tanggal</label>
      <div>
        <input type="date" class="form-control" id="cut_tanggal" placeholder="Tanggal" name="cut_tanggal" value="<?= date('Y-m-d') ?>">
      </div>
  </div>  
  
  <div class="form-group">
        <?= Html::submitButton('Cetak SPPT Khusus', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
