<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PencatatanEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pencatatan Email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pencatatan-email-index">

    

    <p>
        <?= Html::a('Catat Baru', ['create'], ['class' => 'btn btn-success']) ?>
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
            'NM_WP_SPPT',
            'EMAIL:email',
            'NIK',
            'NO_TELP',
            'NAMA_PENERIMA',
            'KEPEMILIKAN',
            'KEPEMILIKAN_LAINNYA',
            //'PENDATA',
            'WAKTU_PENDATA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
