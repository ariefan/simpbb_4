<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatSubjekPajak */

$this->title = 'Create Dat Subjek Pajak';
$this->params['breadcrumbs'][] = ['label' => 'Dat Subjek Pajaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card dat-subjek-pajak-create">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
