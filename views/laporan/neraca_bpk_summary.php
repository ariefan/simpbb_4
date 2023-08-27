<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;


$this->title = 'Summary Neraca BPK';
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
      <label for="input5" class="control-label">Tahun Awal</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun_awal" value="2013">
      </div>
  </div>  

  <div class="form-group">
      <label for="input5" class="control-label">Tahun Akhir</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun_akhir" value="<?= date('Y') ?>">
      </div>
  </div> 

  <div class="form-group">
      <label class="control-label">Per Tanggal Bayar</label>
      <div>
        <?= 
          DatePicker::widget([
              'name' => 'per_tanggal', 
              'value' => date('Y').'-12-31',
              'options' => ['placeholder' => 'Per Tanggal Bayar'],
              'pluginOptions' => [
                  'format' => 'yyyy-mm-dd',
                  'todayHighlight' => true,
                  'autoclose' => true
              ]
          ])

        ?>
      </div>
  </div>
  
  <div class="form-group">
        <?= Html::submitButton('Lihat Summary Neraca', ['class' => 'btn btn-warning']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
