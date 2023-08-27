<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;

$this->title = 'Cetak DBKB';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
  <?php $form = ActiveForm::begin(); ?>
	
  <div class="form-group">
      <label for="input5" class="control-label">Tahun</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun" value="<?= date('Y') ?>">
      </div>
  </div>
  
  <div class="form-group">
        <?= Html::submitButton('Cetak DBKB', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
