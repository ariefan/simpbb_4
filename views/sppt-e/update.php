<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpptE */

$this->title = 'Update NOP: ' . $model->KD_PROPINSI;
$this->params['breadcrumbs'][] = ['label' => 'Sppt Es', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP, 'THN_PAJAK_SPPT' => $model->THN_PAJAK_SPPT, 'EMAIL' => $model->EMAIL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sppt-e-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
