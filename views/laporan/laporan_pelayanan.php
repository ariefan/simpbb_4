<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\RefJnsPelayanan;
use kartik\select2\Select2;
use kartik\date\DatePicker;


$this->title = 'Laporan Pelayanan';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
  <div class="card-header"><?= $this->title ?></div>
  <div class="card-body">
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
      <label class="control-label">Jenis Pelayanan</label>
      <?=
      Select2::widget([
          'name' => 'jns_pelayanan',
          'data' => ArrayHelper::map(RefJnsPelayanan::find()->asArray()->all(),'KD_JNS_PELAYANAN','NM_JENIS_PELAYANAN'),
          'options' => [
              'placeholder' => 'Pilih Jenis Pelayanan',
              'multiple' => true
          ],
      ]) ?>

      <label for="input5" class="control-label">Tahun</label>
      <div>
        <input type="number" class="form-control" id="tahun" placeholder="Tahun Pajak" name="tahun_awal" value="<?= date('Y')-2 ?>">
      </div>
  </div>  
  
  <div class="form-group">
        <?= Html::a('Lihat Laporan Pelayanan', Url::to(['/laporan/pelayanan-grid']) , ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Hitung Ulang Laporan Pelayanan', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
</div>
