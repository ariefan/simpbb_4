<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Konfigurasi;
use kartik\widgets\DepDrop;

$Konfigurasi = new Konfigurasi();

$this->title = 'Cetak Masal SPPT';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
  <?php $form = ActiveForm::begin(); ?>
  <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <?= Html::textInput(['name' => 'KD_PROPINSI', 'value' => '51', 'maxlength' => true, 'readonly'=> true]) ?>
                <?= Html::textInput(['name' => 'KD_DATI2', 'value' => '71', 'maxlength' => true, 'readonly'=> true]) ?>
                <?= Html::dropDownList(\yii\helpers\ArrayHelper::map(\app\models\RefKecamatan::find()->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),['id'=>'KD_KECAMATAN']) ?>
                <?= Html::hiddenInput('KD_KELURAHAN_SELECTED', '', ['id'=>'KD_KELURAHAN_SELECTED']); ?>
                <?= DepDrop::widget([
                    'name' => 'KD_KECAMATAN',
                    'options' => ['id'=>'KD_KELURAHAN'],
                    'pluginOptions'=>[
                        'depends'=>['KD_KECAMATAN'],
                        'placeholder' => 'Pilih Kelurahan...',
                        'initialize' => false,
                        'url' => Url::to(['/ref-kelurahan/kelurahan']),
                        'params'=> ['KD_KELURAHAN_SELECTED'], 
                    ]
                ]) ?>
                <?= Html::hiddenInput('KD_BLOK_SELECTED', '', ['id'=>'KD_BLOK_SELECTED']); ?>
                <?= DepDrop::widget([
                    'name' => 'KD_KELURAHAN',
                    'options' => ['id'=>'KD_BLOK'],
                    'pluginOptions'=>[
                        'depends'=>['KD_KELURAHAN'],
                        'placeholder' => 'Pilih Blok...',
                        'initialize' => false,
                        'url' => Url::to(['/ref-kelurahan/blok']),
                        'params'=> ['KD_BLOK_SELECTED', 'KD_KECAMATAN'], 
                    ]
                ]) ?>
            </div>
          </div>
  </div>
  
  <div class="form-group">
    <?= Html::submitButton('Cetak Salinan', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</form>
</div>
