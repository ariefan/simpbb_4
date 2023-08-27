<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpptESearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SPPT Elektronik yang Belum Di Verifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sppt-e-index">

    <p>
        <?= Html::a('Download 500 data pertama', ['unduh-verifikasi', 'verifikator' => $verifikator], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Verifikasi 500 data pertama', ['verifikasi-semua', 'verifikator' => $verifikator], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin akan melakukan Validasi semua e-SPPT ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            'NO_URUT',
            'KD_JNS_OP',
            'THN_PAJAK_SPPT',
            // 'EMAIL:email',
            'NM_WP_SPPT',
            //'TGL_PEMBAYARAN_TERAKHIR',
            'TGL_DIBUAT',
            //'TGL_EMAIL:email',
            //'TGL_RECORD',
            //'TGL_VERIFIKASI_1',
            //'TGL_VERIFIKASI_2',
            //'TGL_VERIFIKASI_3',
            // 'TGL_KIRIM_TTD',
            // 'TGL_TERIMA_TTD',
            // 'FILE_SPPT:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {view}',
            ],
        ],
    ]); ?>


</div>

