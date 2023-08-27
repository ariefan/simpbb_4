<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatSubjekPajakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dat Subjek Pajaks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-subjek-pajak-index">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
    <p>
        <?= Html::a('Create Dat Subjek Pajak', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SUBJEK_PAJAK_ID',
            'NM_WP',
            'JALAN_WP',
            'BLOK_KAV_NO_WP',
            'RW_WP',
            //'RT_WP',
            //'KELURAHAN_WP',
            //'KOTA_WP',
            //'KD_POS_WP',
            //'TELP_WP',
            //'NPWP',
            //'STATUS_PEKERJAAN_WP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
