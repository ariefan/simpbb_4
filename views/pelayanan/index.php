<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\RefJnsPelayanan;
use yii\helpers\ArrayHelper;
use app\models\StatusPelayanan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Pelayanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelayanan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Pelayanan', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Laporan Pelayanan', ['laporan'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'pjax'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'NO_PELAYANAN',
            'NAMA_PEMOHON',
            //'ALAMAT_PEMOHON',
            'TANGGAL_PELAYANAN',
            // 'KD_PROPINSI',
            // 'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            'NO_URUT',
            // 'KD_JNS_OP',
            
            [
                'attribute' => 'KD_JNS_PELAYANAN',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(RefJnsPelayanan::find()->asArray()->all(), 'KD_JNS_PELAYANAN', 'NM_JENIS_PELAYANAN'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Semua Jenis'],
                'value' => function($model) {
                    $kd = ArrayHelper::map(RefJnsPelayanan::find()->asArray()->all(), 'KD_JNS_PELAYANAN', 'NM_JENIS_PELAYANAN');
                    return $kd[$model->KD_JNS_PELAYANAN];
                }
            ],
            // 'TANGGAL_PERKIRAAN_SELESAI',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'STATUS_PELAYANAN',
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>$status,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Semua Status'],
                'value' => function($model) {
                    $status = ArrayHelper::map(StatusPelayanan::find()->orderBy('urutan')->asArray()->all(),'id','nama');
                    if(!isset($model->STATUS_PELAYANAN))
                        return $status[1];
                    return $status[$model->STATUS_PELAYANAN];
                },
                'editableOptions' => [
                    'inputType' => '\kartik\select2\Select2',
                    'options'=>
                    [
                        'data' => $status,
                    ],
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'KETERANGAN_BERKAS',
                
            ],


            // 'NIP_PETUGAS_PENERIMA',
            // 'NAMA_PETUGAS_PENERIMA',
            // 'NIP_AR',
            // 'NAMA_AR',
            // 'CATATAN:ntext',
            // 'KETERANGAN:ntext',
            // 'TGL_MASUK_PENILAI',
            // 'NIP_MASUK_PENILAI',
            // 'TGL_SELESAI',
            // 'NIP_SELESAI',
            // 'TGL_TERKONFIRMASI_WP',
            // 'NIP_TERKONFIRMASI_WP',
            // 'TTD_JABATAN_KIRI',
            // 'TTD_NAMA_KIRI',
            // 'TTD_NIP_KIRI',
            // 'TTD_JABATAN_KANAN',
            // 'TTD_NAMA_KANAN',
            // 'TTD_NIP_KANAN',
            // 'TGL_PENETAPAN',
            // 'NIP_PENETAPAN',
            // 'TGL_BERKAS_DITUNDA',
            // 'NIP_BERKAS_DITUNDA',
            // 'LETAK_OP',
            // 'KECAMATAN',
            // 'KELURAHAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
