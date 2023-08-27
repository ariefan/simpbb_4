<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;

$this->title = 'Catatan Pembayaran';
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
      <label for="input5" class="control-label">Tahun Awal</label>
      <div>
        <input type="number" class="form-control" id="tahun_awal" placeholder="Tahun Awal" name="tahun_awal" value="1991">
      </div>
  </div>
  <div class="form-group">
  	<label for="input6" class="control-label">Tahun Akhir</label>
      <div>
        <input type="number" class="form-control" id="tahun_akhir" placeholder="Tahun Akhir" name="tahun_akhir" value="<?php echo date("Y"); ?>">
      </div>
  </div>
  <div class="form-group">
    <label for="input6" class="control-label">Hanya yang Belum Lunas</label>
      <div>
        <input type="checkbox" class="checkbox" name="only_tunggakan" value="1" />
      </div>
  </div>

  <div class="form-group">
    <label for="input6" class="control-label">Tanda Tangan</label>
      <div>
        <input type="checkbox" checked="checked" class="checkbox" name="ttd" value="1" />
      </div>
  </div>
  
  <div class="form-group" style="display: none">
    <label for="input6" class="control-label">SIM-PBB</label>
      <div>
        <input type="checkbox" checked="checked" class="checkbox" name="simpbb" value="1" />
      </div>
  </div>
  <div class="form-group">
        <?= Html::submitButton('Lihat Tunggakan', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
