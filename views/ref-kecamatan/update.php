<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefKecamatan */

$this->title = 'Update Ref Kecamatan: ' . $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Ref Kecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-kecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
