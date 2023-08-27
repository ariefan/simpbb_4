<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatSubjekPajak */

$this->title = 'Update Dat Subjek Pajak: ' . $model->SUBJEK_PAJAK_ID;
$this->params['breadcrumbs'][] = ['label' => 'Dat Subjek Pajaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SUBJEK_PAJAK_ID, 'url' => ['view', 'id' => $model->SUBJEK_PAJAK_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card dat-subjek-pajak-update">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
