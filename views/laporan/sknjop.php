<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;


$this->title = 'SK NJOP';
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
    ]);
    ?>
  </div>
  <div class="form-group">
      <label for="input5" class="control-label">No Surat</label>
      <div>
        <input type="text" class="form-control" id="no_surat" placeholder="Ketik No Surat" name="no_surat">
      </div>
  </div>
  <div class="form-group">
      <label for="input5" class="control-label">No Pelayanan</label>
      <div>
        <input type="text" class="form-control" id="no_pelayanan" placeholder="Ketik No Pelayanan" name="no_pelayanan">
      </div>
  </div>
  <div class="form-group">
      <label for="input5" class="control-label">Tahun</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun" value="<?= date('Y') ?>">
      </div>
  </div>
  <div class="form-group">
      <label for="baru" class="control-label">Baru</label>
      <div>
        <input type="checkbox" name="baru" id="baru" />
      </div>
  </div>
  <div class="form-group">
      <label for="ttd" class="control-label">Tanda Tangan</label>
      <div>
        <input type="checkbox" name="ttd" id="ttd" />
      </div>
  </div>
  
  
  <div class="form-group">
        <?= Html::submitButton('Cetak SK NJOP', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
