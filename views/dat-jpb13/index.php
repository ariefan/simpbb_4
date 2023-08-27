<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatJpb13Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dat Jpb13s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb13-index">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
    <p>
        <?= Html::a('Create Dat Jpb13', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
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
            //'KLS_JPB13',
            //'JML_JPB13',
            //'LUAS_JPB13_DGN_AC_SENT',
            //'LUAS_JPB13_LAIN_DGN_AC_SENT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
