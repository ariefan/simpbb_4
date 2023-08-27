<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatJpb3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dat Jpb3s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb3-index">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
    <p>
        <?= Html::a('Create Dat Jpb3', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KD_PROPINSI',
            'KD_DATI2',
            'KD_KECAMATAN',
            'KD_KELURAHAN',
            'KD_BLOK',
            //'NO_URUT',
            //'KD_JNS_OP',
            //'NO_BNG',
            //'TYPE_KONSTRUKSI',
            //'TING_KOLOM_JPB3',
            //'LBR_BENT_JPB3',
            //'LUAS_MEZZANINE_JPB3',
            //'KELILING_DINDING_JPB3',
            //'DAYA_DUKUNG_LANTAI_JPB3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
