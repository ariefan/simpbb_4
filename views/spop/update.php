<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spop */

$this->title = 'Update Spop: ' . $model->KD_PROPINSI.'.'.$model->KD_DATI2.'.'.$model->KD_KECAMATAN.'.'.$model->KD_KELURAHAN.'.'.$model->KD_BLOK.'.'.$model->NO_URUT.'.'.$model->KD_JNS_OP;
$this->params['breadcrumbs'][] = ['label' => 'Spops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KD_PROPINSI, 'url' => ['view', 'KD_PROPINSI' => $model->KD_PROPINSI, 'KD_DATI2' => $model->KD_DATI2, 'KD_KECAMATAN' => $model->KD_KECAMATAN, 'KD_KELURAHAN' => $model->KD_KELURAHAN, 'KD_BLOK' => $model->KD_BLOK, 'NO_URUT' => $model->NO_URUT, 'KD_JNS_OP' => $model->KD_JNS_OP]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <?= $this->render('_form', [
        'model' => $model,
        'model_wp' => $model_wp,
        'propinsis' => $propinsis,
        'action' => 'edit',
        'kelas' => $kelas,
    ]) ?>
