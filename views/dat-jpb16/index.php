<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatJpb16Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dat Jpb16s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-jpb16-index">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
    <p>
        <?= Html::a('Create Dat Jpb16', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
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
            //'KLS_JPB16',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
