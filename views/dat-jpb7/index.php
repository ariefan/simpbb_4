<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatJpb7Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dat Jpb7s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb7-index">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
    <p>
        <?= Html::a('Create Dat Jpb7', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
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
            //'JNS_JPB7',
            //'BINTANG_JPB7',
            //'JML_KMR_JPB7',
            //'LUAS_KMR_JPB7_DGN_AC_SENT',
            //'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
