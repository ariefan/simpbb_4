<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefKecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Kecamatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kecamatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ref Kecamatan', ['create'], ['class' => 'btn btn-success']) ?>
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
            'NM_KECAMATAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
