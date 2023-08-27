<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spops';
$this->params['breadcrumbs'][] = $this->title;
?>
    <p>
        <?= Html::a('Create Spop', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
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
            // 'NO_URUT',
            // 'KD_JNS_OP',
            'SUBJEK_PAJAK_ID',
            //'NO_FORMULIR_SPOP',
            //'JNS_TRANSAKSI_OP',
            //'KD_PROPINSI_BERSAMA',
            //'KD_DATI2_BERSAMA',
            //'KD_KECAMATAN_BERSAMA',
            //'KD_KELURAHAN_BERSAMA',
            //'KD_BLOK_BERSAMA',
            //'NO_URUT_BERSAMA',
            //'KD_JNS_OP_BERSAMA',
            //'KD_PROPINSI_ASAL',
            //'KD_DATI2_ASAL',
            //'KD_KECAMATAN_ASAL',
            //'KD_KELURAHAN_ASAL',
            //'KD_BLOK_ASAL',
            //'NO_URUT_ASAL',
            //'KD_JNS_OP_ASAL',
            //'NO_SPPT_LAMA',
            'JALAN_OP',
            //'BLOK_KAV_NO_OP',
            //'KELURAHAN_OP',
            //'RW_OP',
            //'RT_OP',
            //'KD_STATUS_WP',
            'LUAS_BUMI',
            //'KD_ZNT',
            //'JNS_BUMI',
            //'NILAI_SISTEM_BUMI',
            //'TGL_PENDATAAN_OP',
            //'NM_PENDATAAN_OP',
            //'NIP_PENDATA',
            //'TGL_PEMERIKSAAN_OP',
            //'NM_PEMERIKSAAN_OP',
            //'NIP_PEMERIKSA_OP',
            //'NO_PERSIL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

