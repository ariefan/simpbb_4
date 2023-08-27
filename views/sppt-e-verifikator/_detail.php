<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SpptEVerifikator */

?>
<div class="sppt-everifikator-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->verifikator_1) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'verifikator1.username',
            'label' => 'Verifikator 1',
        ],
        [
            'attribute' => 'verifikator2.username',
            'label' => 'Verifikator 2',
        ],
        [
            'attribute' => 'verifikator3.username',
            'label' => 'Verifikator 3',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>