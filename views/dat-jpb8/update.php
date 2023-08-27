<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DatJpb8 */

$this->title = 'Update Dat Jpb8: ' . $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Dat Jpb8s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'NO_BNG' => $model->NO_BNG]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card dat-jpb8-update">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>