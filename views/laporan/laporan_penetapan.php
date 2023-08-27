<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;


$this->title = 'Laporan Penetapan';
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
      <label class="control-label">Tanggal Awal</label>
      <div>
        <?= 
          DatePicker::widget([
              'name' => 'start_date', 
              'value' => date('Y').'-01-01',
              'options' => ['placeholder' => 'Tanggal Mulai'],
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
    <label class="control-label">Tanggal Akhir</label>
    <div>
        <?= 
          DatePicker::widget([
              'name' => 'end_date', 
              'value' => date('Y').'-12-31',
              'options' => ['placeholder' => 'Tanggal Akhir'],
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
      <label for="input5" class="control-label">Tahun</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun_awal" value="<?= date('Y')-2 ?>">
      </div>
  </div>  
  
  <div class="form-group">
        <?= Html::a('Lihat Laporan Penetapan', Url::to(['/site/penetapan']) , ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Hitung Ulang Laporan Penetapan', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
