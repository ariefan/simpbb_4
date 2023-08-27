<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefKelurahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Kelurahans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kelurahan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ref Kelurahan', ['create'], ['class' => 'btn btn-success']) ?>
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
            'KD_SEKTOR',
            'NM_KELURAHAN',
            'NO_KELURAHAN',
            'KD_POS_KELURAHAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
