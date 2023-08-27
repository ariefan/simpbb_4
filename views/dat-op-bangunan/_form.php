<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatOpBangunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dat-op-bangunan-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- NOP & JNS Transaksi -->
                </div>
                <div class="box-body">                
                    <?= $form->field($model, 'KD_PROPINSI')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    <?= $form->field($model, 'KD_DATI2')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    <?= $form->field($model, 'KD_KECAMATAN')->dropDownList(ArrayHelper::map(\app\models\RefKecamatan::find()->select(["KD_KECAMATAN AS KD_KECAMATAN, CONCAT('[', KD_KECAMATAN, '] ', NM_KECAMATAN) AS NM_KECAMATAN"])->asArray()->all(),'KD_KECAMATAN','NM_KECAMATAN'),['id'=>'KD_KECAMATAN']) ?>
                    <?= Html::hiddenInput('KD_KELURAHAN_SELECTED', $model->isNewRecord ? '' : $model->KD_KELURAHAN, ['id'=>'KD_KELURAHAN_SELECTED']); ?>
                    <?= $form->field($model, 'KD_KELURAHAN')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'KD_KELURAHAN'],
                        'pluginOptions'=>[
                            'depends'=>['KD_KECAMATAN'],
                            'placeholder' => 'Pilih Kelurahan...',
                            'initialize' => $model->isNewRecord ? false : true,
                            'url' => Url::to(['/ref-kelurahan/kelurahan']),
                            'params'=> ['KD_KELURAHAN_SELECTED'], 
                        ]
                    ]) ?>
                    <?= Html::hiddenInput('KD_BLOK_SELECTED', $model->isNewRecord ? '' : $model->KD_BLOK, ['id'=>'KD_BLOK_SELECTED']); ?>
                    <?= $form->field($model, 'KD_BLOK')->widget(DepDrop::classname(), [
                        'options' => ['id'=>'KD_BLOK'],
                        'pluginOptions'=>[
                            'depends'=>['KD_KELURAHAN'],
                            'placeholder' => 'Pilih Blok...',
                            'initialize' => $model->isNewRecord ? false : true,
                            'url' => Url::to(['/ref-kelurahan/blok']),
                            'params'=> ['KD_BLOK_SELECTED', 'KD_KECAMATAN'], 
                        ]
                    ]) ?>
                    <?= $form->field($model, 'NO_URUT')->textInput(['maxlength' => true, 'id' => 'NO_URUT']) ?>
                    <?= $form->field($model, 'KD_JNS_OP')->textInput(['value'=> $model->KD_JNS_OP]) ?>
                    <?= $form->field($model, 'JNS_TRANSAKSI_BNG')->dropDownList(['1' => 'Perekaman Data Baru', '2' => 'Pemutakhiran', '3' => 'Penghapusan Data', '4' => 'Penilaian Massal']); ?>
                </div>
             </div>
        </div>
        <div class="col-md-4">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- NOP & JNS Transaksi -->
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'NO_BNG')->textInput() ?>
                    <?= $form->field($model, 'NO_FORMULIR_LSPOP')->textInput(['maxlength' => true]) ?>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Data Tambahan Bangunan
                </div>
                <div class="box-body">
                    <div id="jpb2">
                        <?= $form->field($model_jpb2, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb2, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb2, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb2, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb2, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb2, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb2, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb2, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb2, 'KLS_JPB2')->dropDownList([
                            '1' => 'KELAS 1',
                            '2' => 'KELAS 2',
                            '3' => 'KELAS 3',
                            '4' => 'KELAS 4',
                        ]); ?>
                    </div>
                    <div id="jpb3">
                        <?= $form->field($model_jpb3, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb3, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb3, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb3, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb3, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb3, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb3, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb3, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb3, 'TYPE_KONSTRUKSI')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb3, 'TING_KOLOM_JPB3')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb3, 'LBR_BENT_JPB3')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb3, 'LUAS_MEZZANINE_JPB3')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb3, 'KELILING_DINDING_JPB3')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb3, 'DAYA_DUKUNG_LANTAI_JPB3')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb4">
                        <?= $form->field($model_jpb4, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb4, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb4, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb4, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb4, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb4, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb4, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb4, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb4, 'KLS_JPB4')->dropDownList([
                                '1' => 'KELAS 1', 
                                '2' => 'KELAS 2', 
                                '3' => 'KELAS 3',
                        ]); ?>
                    </div>
                    <div id="jpb5">
                        <?= $form->field($model_jpb5, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb5, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb5, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb5, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb5, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb5, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb5, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb5, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb5, 'KLS_JPB5')->dropDownList([
                                '1' => 'KELAS 1', 
                                '2' => 'KELAS 2', 
                                '3' => 'KELAS 3',
                                '4' => 'KELAS 4',
                        ]); ?>
                        <?= $form->field($model_jpb5, 'LUAS_KMR_JPB5_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb5, 'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb6">
                        <?= $form->field($model_jpb6, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb6, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb6, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb6, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb6, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb6, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb6, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb6, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb6, 'KLS_JPB6')->dropDownList([
                                '1' => 'KELAS 1', 
                                '2' => 'KELAS 2',
                        ]); ?>
                    </div>
                    <div id="jpb7">
                        <?= $form->field($model_jpb7, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb7, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb7, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb7, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb7, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb7, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb7, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb7, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb7, 'JNS_JPB7')->dropDownList([
                                '1' => 'NON RESORT', 
                                '2' => 'RESORT',
                        ]); ?>
                        <?= $form->field($model_jpb7, 'BINTANG_JPB7')->dropDownList([
                                '1' => 'NON BINTANG', 
                                '2' => 'BINTANG 5', 
                                '3' => 'BINTANG 4',
                                '4' => 'BINTANG 3',
                                '5' => 'BINTANG 1-2',
                                '6' => 'NON BINTANG',
                        ]); ?>
                        <?= $form->field($model_jpb7, 'JML_KMR_JPB7')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb7, 'LUAS_KMR_JPB7_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb7, 'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb8">
                        <?= $form->field($model_jpb8, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb8, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb8, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb8, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb8, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb8, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb8, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb8, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb8, 'TYPE_KONSTRUKSI')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb8, 'TING_KOLOM_JPB8')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb8, 'LBR_BENT_JPB8')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb8, 'LUAS_MEZZANINE_JPB8')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb8, 'KELILING_DINDING_JPB8')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb8, 'DAYA_DUKUNG_LANTAI_JPB8')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb9">
                        <?= $form->field($model_jpb9, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb9, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb9, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb9, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb9, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb9, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb9, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb9, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb9, 'KLS_JPB9')->dropDownList([
                                '1' => 'KELAS 1', 
                                '2' => 'KELAS 2', 
                                '3' => 'KELAS 3',
                                '4' => 'KELAS 4',
                        ]); ?>
                    </div>
                    <div id="jpb12">
                        <?= $form->field($model_jpb12, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb12, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb12, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb12, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb12, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb12, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb12, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb12, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb12, 'TYPE_JPB12')->dropDownList([
                                '1' => 'TIPE 1', 
                                '2' => 'TIPE 2', 
                                '3' => 'TIPE 3',
                                '4' => 'TIPE 4',
                        ]); ?>
                    </div>
                    <div id="jpb13">
                        <?= $form->field($model_jpb13, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb13, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb13, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb13, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb13, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb13, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb13, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb13, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb13, 'KLS_JPB13')->dropDownList([
                                '1' => 'KELAS 1', 
                                '2' => 'KELAS 2', 
                                '3' => 'KELAS 3',
                                '4' => 'KELAS 4',
                        ]); ?>
                        <?= $form->field($model_jpb13, 'JML_JPB13')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb13, 'LUAS_JPB13_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model_jpb13, 'LUAS_JPB13_LAIN_DGN_AC_SENT')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb14">
                        <?= $form->field($model_jpb14, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb14, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb14, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb14, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb14, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb14, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb14, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb14, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb14, 'LUAS_KANOPI_JPB14')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb15">
                        <?= $form->field($model_jpb15, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb15, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb15, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb15, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb15, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb15, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb15, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb15, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb15, 'LETAK_TANGKI_JPB15')->dropDownList([
                                '1' => 'DI ATAS TANAH', 
                                '2' => 'DI BAWAH TANAH',
                        ]); ?>
                        <?= $form->field($model_jpb15, 'KAPASITAS_TANGKI_JPB15')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div id="jpb16">
                        <?= $form->field($model_jpb16, 'KD_PROPINSI')->hiddenInput(['value'=> $model->KD_PROPINSI])->label(false).
                            $form->field($model_jpb16, 'KD_DATI2')->hiddenInput(['value'=> $model->KD_DATI2])->label(false).
                            $form->field($model_jpb16, 'KD_KECAMATAN')->hiddenInput(['value'=> $model->KD_KECAMATAN])->label(false).
                            $form->field($model_jpb16, 'KD_KELURAHAN')->hiddenInput(['value'=> $model->KD_KELURAHAN])->label(false).
                            $form->field($model_jpb16, 'KD_BLOK')->hiddenInput(['value'=> $model->KD_BLOK])->label(false).
                            $form->field($model_jpb16, 'NO_URUT')->hiddenInput(['value'=> $model->NO_URUT])->label(false).
                            $form->field($model_jpb16, 'KD_JNS_OP')->hiddenInput(['value'=> $model->KD_JNS_OP])->label(false).
                            $form->field($model_jpb16, 'NO_BNG')->hiddenInput(['value'=> $model->NO_BNG])->label(false);
                        ?>
                        <?= $form->field($model_jpb16, 'KLS_JPB16')->dropDownList([
                                '1' => 'KELAS 1',
                                '2' => 'KELAS 2',
                        ]); ?>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4">
             <div class="box box-primary">
                <div class="box-header with-border">
                    Data Letak Objek Pajak
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'KD_JPB')->dropDownList([
                        '01' => 'PERUMAHAN', 
                        '02' => 'PERKANTORAN SWASTA', 
                        '03' => 'PABRIK',
                        '04' => 'TOKO/APOTIK/PASAR/RUKO',
                        '05' => 'RUMAH SAKIT/KLINIK',
                        '06' => 'OLAH RAGA/REKREASI',
                        '07' => 'HOTEL/WISMA',
                        '08' => 'BENGKEL/GUDANG/PERTANIAN',
                        '09' => 'GEDUNG PEMERINTAH',
                        '10' => 'LAIN-LAIN',
                        '11' => 'BANGUNAN TIDAK KENA PAJAK',
                        '12' => 'BANGUNAN PARKIR',
                        '13' => 'APARTEMEN',
                        '14' => 'POMPA BENSIN',
                        '15' => 'TANGKI MINYAK',
                        '16' => 'GEDUNG SEKOLAH',
                    ], ['id'=> 'KD_JPB']); ?>
                    <?= $form->field($model, 'THN_DIBANGUN_BNG')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'THN_RENOVASI_BNG')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'LUAS_BNG')->textInput() ?>
                    <?= $form->field($model, 'JML_LANTAI_BNG')->textInput() ?>
                    <?= $form->field($model, 'KONDISI_BNG')->dropDownList([
                        '1' => 'SANGAT BAIK', 
                        '2' => 'BAIK', 
                        '3' => 'SEDANG',
                        '4' => 'JELEK',
                    ]); ?>
                    <?= $form->field($model, 'JNS_KONSTRUKSI_BNG')->dropDownList([
                        '1' => 'BAJA', 
                        '2' => 'BETON', 
                        '3' => 'BATU BATA',
                        '4' => 'KAYU',
                    ]); ?>
                    <?= $form->field($model, 'JNS_ATAP_BNG')->dropDownList([
                        '1' => 'DECRABON/BETON/GTG GLAZUR', 
                        '2' => 'GTG BETON/ALUMUNIUM', 
                        '3' => 'GTG BIASA/SIRAP',
                        '4' => 'ASBES',
                        '5' => 'SENG',
                    ]); ?>
                    <?= $form->field($model, 'KD_DINDING')->dropDownList([
                        '1' => 'KACA/ALUMUNIUM', 
                        '2' => 'BETON', 
                        '3' => 'BATU BATA/CONBLOK',
                        '4' => 'KAYU',
                        '5' => 'SENG',
                        '6' => 'TIDAK ADA',
                    ]); ?>
                    <?= $form->field($model, 'KD_LANTAI')->dropDownList([
                        '1' => 'MARMER', 
                        '2' => 'KERAMIK', 
                        '3' => 'TERASO',
                        '4' => 'UBIN PC/PAPAN',
                        '5' => 'SEMEN',
                    ]); ?>
                    <?= $form->field($model, 'KD_LANGIT_LANGIT')->dropDownList([
                        '1' => 'AKUSTIK/JATI', 
                        '2' => 'TRIPLEK/ASBES BAMBU', 
                        '3' => 'TIDAK ADA',
                    ]); ?>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                        Fasilitas Baangunan
                </div>
                <div class="box-body">
                    <?= Html::label("AC SPLIT", '') ?><?= Html::textInput("fasilitas[01]", $fasilitas['01'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC WINDOWS", '') ?><?= Html::textInput("fasilitas[02]", $fasilitas['02'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC CENTRAL", '') ?><br><?= Html::checkbox('fasilitas[11]', 1, ['label' => 'ADA', 'checked'=> $fasilitas[11] == 0 ? false : true]) ?><br>
                    <!-- <?= Html::label("AC SENTRAL KANTOR", '') ?><?= Html::textInput("fasilitas[03]", $fasilitas['03'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC CENTRAL KAMAR HOTEL", '') ?><?= Html::textInput("fasilitas[04]", $fasilitas['04'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC CENTRAL RUANG LAIN HOTEL", '') ?><?= Html::textInput("fasilitas[05]", $fasilitas['05'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC CENTRAL PERTOKOAN", '') ?><?= Html::textInput("fasilitas[06]", $fasilitas['06'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC CENTRAL KAMAR RUMAH SAKIT", '') ?><?= Html::textInput("fasilitas[07]", $fasilitas['07'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC SENTRAL RUANG LAIN RUMAH SAKIT", '') ?><?= Html::textInput("fasilitas[08]", $fasilitas['08'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC SENTRAL APARTEMEN", '') ?><?= Html::textInput("fasilitas[09]", $fasilitas['09'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC SENTRAL RUANG LAIN APARTEMEN", '') ?><?= Html::textInput("fasilitas[10]", $fasilitas['10'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("AC SENTRAL BANGUNAN LAIN", '') ?><?= Html::textInput("fasilitas[11]", $fasilitas['11'], ['class' => 'form-control', 'type' => 'number']) ?> -->
                    <?= Html::label("KOLAM RENANG DIPLESTER", '') ?><?= Html::textInput("fasilitas[12]", $fasilitas['12'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("KOLAM RENANG DENGAN PELAPIS", '') ?><?= Html::textInput("fasilitas[13]", $fasilitas['13'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PERKERASAN KONSTRUKSI RINGAN", '') ?><?= Html::textInput("fasilitas[14]", $fasilitas['14'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PERKERASAN KONSTRUKSI SEDANG", '') ?><?= Html::textInput("fasilitas[15]", $fasilitas['15'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PERKERASAN KONSTRUKSI BERAT", '') ?><?= Html::textInput("fasilitas[16]", $fasilitas['16'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PENUTUP PERKERASAN", '') ?><?= Html::textInput("fasilitas[17]", $fasilitas['17'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN BETON DG LAMPU", '') ?><?= Html::textInput("fasilitas[18]", $fasilitas['18'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN ASPAL DG LAMPU", '') ?><?= Html::textInput("fasilitas[19]", $fasilitas['19'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN TANAH LIAT DG LAMPU", '') ?><?= Html::textInput("fasilitas[20]", $fasilitas['20'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN BETON TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[21]", $fasilitas['21'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN ASPAL TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[22]", $fasilitas['22'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS 1 BAN TANAH LIAT TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[23]", $fasilitas['23'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN BETON DG LAMPU", '') ?><?= Html::textInput("fasilitas[24]", $fasilitas['24'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN ASPAL DG LAMPU", '') ?><?= Html::textInput("fasilitas[25]", $fasilitas['25'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN TANAH LIAT DG LAMPU", '') ?><?= Html::textInput("fasilitas[26]", $fasilitas['26'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN BETON TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[27]", $fasilitas['27'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN ASPAL TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[28]", $fasilitas['28'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LAP.TENIS > 1 BAN TANAH LIAT TANPA LAMPU", '') ?><?= Html::textInput("fasilitas[29]", $fasilitas['29'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LIFT PENUMPANG BIASA", '') ?><?= Html::textInput("fasilitas[30]", $fasilitas['30'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LIFT KAPSUL", '') ?><?= Html::textInput("fasilitas[31]", $fasilitas['31'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LIFT BARANG", '') ?><?= Html::textInput("fasilitas[32]", $fasilitas['32'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("TANGGA BERJALAN (ESCALATOR) <= 0.80 M", '') ?><?= Html::textInput("fasilitas[33]", $fasilitas['33'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("TANGGA BERJALAN (ESCALATOR) > 0.80 M", '') ?><?= Html::textInput("fasilitas[34]", $fasilitas['34'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PAGAR BAJA / BESI", '') ?><?= Html::textInput("fasilitas[35]", $fasilitas['35'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PAGAR BATA / BATAKO", '') ?><?= Html::textInput("fasilitas[36]", $fasilitas['36'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("PROTEKSI API", '') ?><br>
                    <?= Html::checkbox('fasilitas[37]', 1, ['label' => 'HYDRANT', 'checked'=> $fasilitas[37] == 0 ? false : true]) ?><br>
                    <?= Html::checkbox('fasilitas[38]', 1, ['label' => 'FIRE ALARM', 'checked'=> $fasilitas[38] == 0 ? false : true]) ?><br>
                    <?= Html::checkbox('fasilitas[39]', 1, ['label' => 'SPLINKLER', 'checked'=> $fasilitas[39] == 0 ? false : true]) ?><br>
                    <?= Html::label("GENSET", '') ?><?= Html::textInput("fasilitas[40]", $fasilitas['40'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("SALURAN PESAWAT PABX", '') ?><?= Html::textInput("fasilitas[41]", $fasilitas['41'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("SUMUR ARTESIS", '') ?><?= Html::textInput("fasilitas[42]", $fasilitas['42'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("BOILER HOTEL", '') ?><?= Html::textInput("fasilitas[43]", $fasilitas['43'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("LISTRIK", '') ?><?= Html::textInput("fasilitas[44]", $fasilitas['44'], ['class' => 'form-control', 'type' => 'number']) ?>
                    <?= Html::label("BOILER APARTEMEN", '') ?><?= Html::textInput("fasilitas[45]", $fasilitas['45'], ['class' => 'form-control', 'type' => 'number']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Fasilitas Bangunan
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'NILAI_SISTEM_BNG')->textInput(['id' => 'NILAI_SISTEM_BNG', 'maxlength' => true, 'readonly'=> true]) ?>
                    <div id="kelas">
                        KELAS: <?= $kelas['KELAS_BANGUNAN'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NJOP: <?= $kelas['NJOP_BANGUNAN'] ?>
                    </div>
                    <?= $form->field($model, 'TGL_PENDATAAN_BNG')->textInput(['type' => 'date', 'readonly'=> true]) ?>
                    <?= $form->field($model, 'NIP_PENDATA_BNG')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    <?= $form->field($model, 'TGL_PEMERIKSAAN_BNG')->textInput(['type' => 'date']) ?>
                    <?= $form->field($model, 'NIP_PEMERIKSA_BNG')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'TGL_PEREKAMAN_BNG')->textInput(['type' => 'date', 'readonly'=> true]) ?>
                    <?= $form->field($model, 'NIP_PEREKAM_BNG')->textInput(['maxlength' => true, 'readonly'=> true]) ?>
                    <?= $form->field($model, 'TGL_KUNJUNGAN_KEMBALI')->textInput(['type' => 'date']) ?>
                    <?= $form->field($model, 'NILAI_INDIVIDU')->textInput(['type'=> 'number']) ?>
                    <?= $form->field($model, 'AKTIF')->textInput() ?>
                </div>
            </div>
        </div>
    </div>


        <div class="row">
            <div class="col-sm-4">                

            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-12">
                <?= Html::submitButton('Save', ['class' => 'btn btn-sm btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
$kdjpb = $model->KD_JPB;
$script = <<< JS

function hideJpb(){    
    $("#jpb2").hide();
    $("#jpb3").hide();
    $("#jpb4").hide();
    $("#jpb5").hide();
    $("#jpb6").hide();
    $("#jpb7").hide();
    $("#jpb8").hide();
    $("#jpb9").hide();
    $("#jpb12").hide();
    $("#jpb13").hide();
    $("#jpb14").hide();
    $("#jpb15").hide();
    $("#jpb16").hide();
}

function cekJpb(kdjpb){
    switch(kdjpb) {
        case '02':
            $("#jpb2").show();
            break;
        case '03':
            $("#jpb3").show();
            break;
        case '04':
            $("#jpb4").show();
            break;
        case '05':
            $("#jpb5").show();
            break;
        case '06':
            $("#jpb6").show();
            break;
        case '07':
            $("#jpb7").show();
            break;
        case '08':
            $("#jpb8").show();
            break;
        case '09':
            $("#jpb9").show();
            break;
        case '12':
            $("#jpb9").show();
            break;
        case '13':
            $("#jpb9").show();
            break;
        case '14':
            $("#jpb9").show();
            break;
        case '15':
            $("#jpb9").show();
            break;
        case '16':
            $("#jpb9").show();
            break;
    }
}

$(document).ready(function(){
    hideJpb();
    cekJpb('$kdjpb');
    $("#KD_JPB").change(function() {
        hideJpb();
        cekJpb(this.value);
    });
});
JS;
$this->registerJs($script);
?>