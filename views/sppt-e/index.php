<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpptESearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SPPT Elektronik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sppt-e-index">

    <p>
        <?= Html::a('Proses e-SPPT', ['proses'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Setting Verifikator', ['sppt-e-verifikator/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sinkronisasi Email', ['sppt-e/sync-email'], ['class' => 'btn btn-warning']) ?>
        
        <?= Html::a('Sinkronisasi Tgl Pembayaran', ['sppt-e/sync-tgl-bayar'], ['class' => 'btn btn-warning']) ?>
    </p>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'EMAIL:email',
            'NM_WP_SPPT',
            //'TGL_PEMBAYARAN_TERAKHIR',
            'TGL_DIBUAT',
            //'TGL_EMAIL:email',
            //'TGL_RECORD',
            'TGL_VERIFIKASI_1',
            'TGL_VERIFIKASI_2',
            'TGL_VERIFIKASI_3',
            // 'TGL_KIRIM_TTD',
            'TGL_TERIMA_TTD',
            // 'FILE_SPPT:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

