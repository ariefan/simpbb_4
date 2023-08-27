<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Spop */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Spops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="spop-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DETAIL</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KECAMATAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KELURAHAN')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_BLOK')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_URUT')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_JNS_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'JNS_TRANSAKSI_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_SPPT_LAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'SUBJEK_PAJAK_ID')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- data op -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DATA LETAK OBJEK PAJAK</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'JALAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'BLOK_KAV_NO_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KELURAHAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'RW_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'RT_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_STATUS_WP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'LUAS_BUMI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_ZNT')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'JNS_BUMI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NILAI_SISTEM_BUMI')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.data op -->
            <!-- bersama -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DATA BERSAMA</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'KD_PROPINSI_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_DATI2_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KECAMATAN_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KELURAHAN_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_BLOK_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_URUT_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_JNS_OP_BERSAMA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.bersama -->
        </div>
        <!-- /.row -->
        <br />
        <!-- break -->
        <div class="row">
            <!-- data asal -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DATA ASAL</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'KD_PROPINSI_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_DATI2_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KECAMATAN_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_KELURAHAN_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_BLOK_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_URUT_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'KD_JNS_OP_ASAL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.data asal -->
            <!-- pendataan op -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DETAIL PENDATAAN OP</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'TGL_PENDATAAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NM_PENDATAAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_PENDATA')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.pendataan op -->
            <!-- pemeriksaan op -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>DETAIL PEMERIKSAAN OP</h5>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'TGL_PEMERIKSAAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NM_PEMERIKSAAN_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NIP_PEMERIKSA_OP')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                        <?= $form->field($model, 'NO_PERSIL')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                    </div>
                </div>
            </div>
            <!-- /.pemeriksaan op -->
        </div>
        <!-- /.row -->
    </div>

    <div class="card-footer">
        <?= Html::a('Update', ['update', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>