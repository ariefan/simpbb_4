<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatOpBangunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'LSPOP';
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a('Create LSPOP', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NOP',
            // 'KD_PROPINSI',
            // 'KD_DATI2',
            // 'KD_KECAMATAN',
            // 'KD_KELURAHAN',
            // 'KD_BLOK',
            //'NO_URUT',
            //'KD_JNS_OP',
            'NO_BNG',
            //'KD_JPB',
            //'NO_FORMULIR_LSPOP',
            //'THN_DIBANGUN_BNG',
            //'THN_RENOVASI_BNG',
            'LUAS_BNG',
            'JML_LANTAI_BNG',
            //'KONDISI_BNG',
            //'JNS_KONSTRUKSI_BNG',
            //'JNS_ATAP_BNG',
            //'KD_DINDING',
            //'KD_LANTAI',
            //'KD_LANGIT_LANGIT',
            //'NILAI_SISTEM_BNG',
            //'JNS_TRANSAKSI_BNG',
            //'TGL_PENDATAAN_BNG',
            //'NIP_PENDATA_BNG',
            //'TGL_PEMERIKSAAN_BNG',
            //'NIP_PEMERIKSA_BNG',
            //'TGL_PEREKAMAN_BNG',
            //'NIP_PEREKAM_BNG',
            //'TGL_KUNJUNGAN_KEMBALI',
            //'NILAI_INDIVIDU',
            //'AKTIF',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
